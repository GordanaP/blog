<?php

namespace App\Listeners;

use App\Events\ArticlePublished;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Jobs\NotifyUsersTheNewArticleWasPublished;

class SendPublicationNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  ArticlePublished  $event
     * @return void
     */
    public function handle(ArticlePublished $event)
    {
        NotifyUsersTheNewArticleWasPublished::dispatch($event->article);
    }
}
