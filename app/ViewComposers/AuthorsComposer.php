<?php

namespace App\ViewComposers;

use App\User;
use Illuminate\View\View;

class AuthorsComposer
{
    public function compose(View $view)
    {
        $view->with([
            'authors' => User::authors()->get()
        ]);
    }
}