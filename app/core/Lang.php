<?php

namespace app\core;

class Lang
{

    protected static $data;

    public function __construct($lang)
    {
        $lang_file = ROOT.DS.'app'.DS.'lang'.DS.$lang.'.php';
        if(file_exists($lang_file))
        {
            self::$data = include_once $lang_file;
        } else {
            throw new Exception('Language file not found: '.$lang_file);
        }
    }

    public static function get($name)
    {
        return (isset(self::$data[$name])) ? self::$data[$name] : null;
    }

}