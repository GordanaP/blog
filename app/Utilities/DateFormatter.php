<?php

namespace App\Utilities;

class DateFormatter
{
    public function readable($date)
    {
        return optional($date)->diffForHumans();
    }

    public function display($date, $format = 'Y-m-d')
    {
        return optional($date)->format($format);
    }
}