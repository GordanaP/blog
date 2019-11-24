<?php

namespace App\ViewComposers;

use App\User;
use Illuminate\View\View;

class ProfilesComposer
{
    public function compose(View $view)
    {
        $view->with([
            'user_authors' => ! ($profile = request()->route('profile'))
                ? User::authorsWithoutProfile()
                : User::authorsWithoutProfile()->prepend($profile->user),
        ]);
    }
}