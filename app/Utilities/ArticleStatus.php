<?php

namespace App\Utilities;

use App\Utilities\RadioButton;

class ArticleStatus extends RadioButton
{
    /**
     * { @inheritDocs }
     */
    public static $radios = [
        'yes' => 1,
        'no' => 0,
    ];
}