<?php

namespace App\Utilities;

class RadioButton
{
    /**
     * A list of radio buttons.
     *
     * @var array
     */
    public static $radios = [];

    /**
     * Get all radio buttons.
     *
     * @return array
     */
    public static function all()
    {
        return static::$radios;
    }

    /**
     * Get the radio buttons' values.
     *
     * @return array
     */
    public static function values()
    {
        return array_values(static::all());
    }

    /**
     * Get a radio button key.
     *
     * @param  string $value
     * @return string
     */
    public static function getKey($value)
    {
        return array_search($value, static::all());
    }
}