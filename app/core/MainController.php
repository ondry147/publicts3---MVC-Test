<?php

namespace app\core;

class MainController
{
    protected $model;
    protected $view;

    public function render($path, $data = [])
    {
        $data['controller'] = !isset($data['controller']) ? str_replace('app\\controllers\\', '', get_called_class()) : null;
        extract($data);
        if($path == 'header')
        {
            require_once ROOT.DS.'app'.DS.'views'.DS.'_include'.DS.'header.php';
        } elseif($path == 'footer') {
            require_once ROOT.DS.'app'.DS.'views'.DS.'_include'.DS.'footer.php';
        } else {
            $path = str_replace('/', DS, $path);
            require_once ROOT.DS.'app'.DS.'views'.DS.$path.'.php';
        }
    }

}