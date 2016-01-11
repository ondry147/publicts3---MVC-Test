<?php

namespace app\core;

class Config
{
    public static $settings = [];

    public static function set($name, $value)
    {
        self::$settings[$name] = $value;
    }

    public static function get($name)
    {
        return (isset(self::$settings[$name])) ? self::$settings[$name] : null;
    }
}