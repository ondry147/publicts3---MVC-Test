<?php

define('ROOT', dirname(dirname(__FILE__)));
define('DS', DIRECTORY_SEPARATOR);
define('pub', 'public');
//Set to 'dev' for debugging
define('ENVIRONMENT', 'dev');

require_once ROOT.DS.'app'.DS.'init.php';

define('URL', \app\core\Config::get('url'));

//\app\core\App::redirect('error');
//echo \app\core\Config::get("url");


new \app\core\App($_SERVER['REQUEST_URI']);