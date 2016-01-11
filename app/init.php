<?php

mb_internal_encoding('UTF-8');
date_default_timezone_set('Europe/Prague');

spl_autoload_register(function($class) {
    //new \app\core\App
    $class = str_replace("\\", DS, $class);
    $class = ROOT.DS.$class.'.php';
    if(file_exists($class))
    {
        require_once $class;
    } elseif(file_exists(strtolower($class)))
    {
        require_once strtolower($class);
    } else
    {
        throw new Exception('Class not found: '.$class);
    }
});

if(ENVIRONMENT == 'dev' || ENVIRONMENT == 'development')
{
    error_reporting(E_ALL);
    ini_set('display_errors', 'On');
} else {
    error_reporting(E_ALL);
    ini_set('display_errors', 'Off');
    ini_set('log_errors', 1);
    ini_set('error_log', ROOT.DS.'app'.DS.'log'.DS.'php.log');
}

function __($name)
{
    return \app\core\Lang::get($name);
}

require_once ROOT.DS.'app'.DS.'config.php';