<?php

namespace App\Jobs;

use App\User;
use App\Article;
use App\Jobs\ThrottleMail;
use Illuminate\Bus\Queueable;
use App\Mail\ArticleWasPublished;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redis;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class NotifyUsersTheNewArticleWasPublished implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $article;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Article $article)
    {
        $this->article = $article;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        User::allExceptTheArticleAuthor($this->article)
            ->map(function(User $recipient) {
                Redis::throttle('mailtrap')->allow(2)->every(12)
                    ->then(function() use($recipient) {
                        Mail::to($recipient)
                            ->send(new ArticleWasPublished($this->article, $recipient));
                }, function () {
                    return $this->release(5);
                });
            });
    }
}
