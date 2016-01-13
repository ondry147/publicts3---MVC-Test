<?php

define('ROOT', dirname(dirname(__FILE__)));
define('DS', DIRECTORY_SEPARATOR);

//Set to 'dev' for debugging
define('ENVIRONMENT', 'pub');

require_once ROOT.DS.'app'.DS.'init.php';

define('URL', \app\core\Config::get('url'));
//Public folder if you can't set apache's default root
define('PUB', URL.'public/');

//\app\core\App::redirect('error');
//echo \app\core\Config::get("url");


new \app\core\App($_SERVER['REQUEST_URI']);