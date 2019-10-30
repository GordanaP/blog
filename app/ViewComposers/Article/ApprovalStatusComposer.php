<?php

namespace App\ViewComposers\Article;

use Illuminate\View\View;
use App\Utilities\ArticleApprovalStatus;

class ApprovalStatusComposer
{
    public function compose(View $view)
    {
        $view->with([
            'approval_statuses' => ArticleApprovalStatus::all(),
        ]);
    }
}