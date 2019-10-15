<?php

namespace App\ViewComposers;

use Illuminate\View\View;
use App\Utilities\ArticleApprovalStatus;

class ArticleApprovalStatusComposer
{
    public function compose(View $view)
    {
        $view->with([
            'approval_statuses' => ArticleApprovalStatus::all(),
        ]);
    }
}