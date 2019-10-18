<?php

namespace App\Observers;

use Illuminate\Support\Str;

class ArticleObserver
{
    public function creating($model)
    {
        $model->slug = Str::slug($model->title);
    }
}
