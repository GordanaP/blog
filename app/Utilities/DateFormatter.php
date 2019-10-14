<?php

namespace App\Utilities;

class DateFormatter
{
    public function readable($date)
    {
        return $date->diffForHumans();
    }

    public function displayAs($format = 'Y-m-d', $date = null)
    {
        return $date ? $date->format($format) : null;
    }
}