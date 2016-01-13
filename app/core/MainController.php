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
        $path = str_replace('/', DS, $path);
        ob_start();
        require_once ROOT.DS.'app'.DS.'views'.DS.$path.'.php';
        $layout_content = ob_get_clean();
        require_once ROOT.DS.'app'.DS.'views'.DS.'_include'.DS.'layout.php';
    }

}