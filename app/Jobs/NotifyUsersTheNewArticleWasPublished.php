<?php

namespace App\Jobs;

use App\User;
use App\Article;
use Illuminate\Bus\Queueable;
use App\Mail\ArticleWasPublished;
use Illuminate\Support\Facades\Mail;
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
        $now = now();

        User::allExceptTheArticleAuthor($this->article)
            ->map(function($recipient) use($now) {
                Mail::to($recipient)
                    ->later(
                        $now->addSeconds(6),
                        new ArticleWasPublished($this->article, $recipient)
                    );
            });
    }
}
