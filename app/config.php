<?php

use \app\core\Config as Config;

//If your website is in root, just leave it empty ''
Config::set('sub_folder', 'publicts3/');
Config::set('url', 'http://'.$_SERVER["HTTP_HOST"].'/'.Config::get('sub_folder'));
Config::set('languages', ['cz', 'en']);
Config::set('site_name', 'PublicTS3');

Config::set('default_controller', 'home');
//This default action(method) is used for other controllers too. So if it doesn't exists - error appears.
Config::set('default_action', 'index');
Config::set('default_lang', 'cz');