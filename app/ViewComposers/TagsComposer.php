<?php

namespace App\ViewComposers;

use App\Tag;
use Illuminate\View\View;

class TagsComposer
{
    public function compose(View $view)
    {
        $view->with([
            'tags' => Tag::orderBy('name', 'asc')->get(),
        ]);
    }
}