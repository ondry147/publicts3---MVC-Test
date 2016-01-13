<?php

namespace app\controllers;
use \app\core\MainController as MainController;

class Error extends MainController
{

    public function index()
    {
        $this->view = 'error/404';

        $data['site_title'] = 'Stránka nenalezena - 404';
        $data['site_description'] = 'Stránka nenalezena';
        $data['site_keywords'] = 'teamspeak, teamspeak3, ts3, publicts3, verejny ts';

        $this->render($this->view, $data);
    }

    public function stranka_nenalezena_404()
    {
        $this->view = 'error/404';

        $data['site_title'] = 'Stránka nenalezena - 404';
        $data['site_description'] = 'Stránka nenalezena';
        $data['site_keywords'] = 'teamspeak, teamspeak3, ts3, publicts3, verejny ts';

        $this->render($this->view, $data);
    }

}