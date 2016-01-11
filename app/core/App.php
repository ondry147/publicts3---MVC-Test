<?php

namespace app\core;

class App
{
    protected $controller;
    protected $action;
    protected $param;
    protected $lang;

    public function __construct($path)
    {
        $this->controller = '\\app\\controllers\\'.Config::get('default_controller');
        $this->action = Config::get('default_action');
        $this->param = [];
        $this->lang = Config::get('default_lang');

        $this->parse_url(filter_var($path, FILTER_SANITIZE_URL));
        new Lang($this->lang);

        //Call controller
        call_user_func_array([new $this->controller, $this->action], $this->param);
        if(ENVIRONMENT == 'dev' || ENVIRONMENT == 'development')
        {
            echo '<hr />';
            echo 'Controller: '.$this->controller.'<br />';
            echo 'Action: '.$this->action.'<br />';
            //echo 'Param: '.$this->controller.'<br />';
            echo 'Language: '.$this->lang.'<br />';
            echo 'Config URL: '.Config::get('url').'<br />';
            echo '<hr />';
        }
    }

    public function parse_url($path)
    {
        if(mb_strlen(Config::get('sub_folder')) > 0)
        {
            $path = str_replace(Config::get('sub_folder'), '', $path);
        }
        $path = strtolower(trim($path, '/'));
        $path = (mb_strlen($path) > 0) ? explode('/', $path) : null;

        if($path != null)
        {
            //Get language
            if(current($path) AND in_array(current($path), Config::get('languages')))
            {
                $this->lang = current($path);
                array_shift($path);
            }

            //Get controller
            if(current($path))
            {
                $controller = $this->camel_case(current($path));
                if(file_exists(ROOT.DS.'app'.DS.'controllers'.DS.$controller.'.php'))
                {
                    //Než nastavím controller, chci zčeknout zda vůbec existuje defaultní metoda
                    $temp_controller = '\\app\\controllers\\'.$controller;
                    if(!next($path) AND !method_exists(new $temp_controller, 'index'))
                    {
                        self::redirect('error/404');
                    } else {
                        $this->controller = 'app\\controllers\\'.$controller;
                    }
                }
                array_shift($path);
            }

            //Get method(action)
            if(current($path))
            {
                if(method_exists(new $this->controller, $this->underline_case(current($path))))
                {
                    $this->action = $this->underline_case(current($path));
                } elseif(!method_exists(new $this->controller, 'index'))
                {
                    self::redirect('error/404');
                } else {
                    $this->action = 'index';
                }
                array_shift($path);
            }

            //Get params
            $this->param = array_values($path);

        }


    }

    public static function redirect($path = '')
    {
        header('Location: '.Config::get("url").$path);
        die();
    }

    public function underline_case($string)
    {
        $string = strtolower(str_replace('-', '_', $string));
        return $string;
    }

    public function camel_case($string)
    {
        $string = str_replace('-', ' ', $string);
        $string = ucwords($string);
        $string = str_replace(' ', '', $string);

        return $string;
    }

}