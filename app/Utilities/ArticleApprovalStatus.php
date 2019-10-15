<?php

namespace App\Utilities;

use App\Utilities\RadioButton;

class ArticleApprovalStatus extends RadioButton
{
    /**
     * { @inheritDocs }
     */
    public static $radios = [
        'yes' => 1,
        'no' => 0,
    ];
}