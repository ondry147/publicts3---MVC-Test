<?php

namespace app\controllers;
use \app\core\MainController as MainController;

class Home extends MainController
{

    public function index()
    {
        $this->model = new \app\models\Home();
        $this->view = 'home/index';

        $data['site_title'] = 'Veřejný teamspeak3 server';
        $data['site_description'] = '';
        $data['site_keywords'] = 'teamspeak, teamspeak3, ts3, publicts3, verejny ts';

        $data['download'] = 'Here you can download';
        $data['ahoj'] = 'Say hi';
        $data['novinky'] = $this->model->news();

        $this->render($this->view, $data);
    }

}