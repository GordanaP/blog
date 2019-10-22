<?php

namespace App\Mail;

use App\Article;
use App\Comment;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class CommentWasPosted extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $comment;
    public $article;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Comment $comment, Article $article)
    {
        $this->comment = $comment;
        $this->article = $article;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $subject = 'A new comment was posted!';

        return $this->subject($subject)->markdown('emails.comment_posted');
    }
}
