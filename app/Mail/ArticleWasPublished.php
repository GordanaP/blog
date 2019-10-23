<?php

namespace App\Mail;

use App\User;
use App\Article;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ArticleWasPublished extends Mailable
{
    use Queueable, SerializesModels;

    public $article;
    public $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Article $article, User $user)
    {
        $this->article = $article;
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $subject = 'New Article Was Published!';

        return $this->subject($subject)->markdown('emails.article_published');
    }
}
