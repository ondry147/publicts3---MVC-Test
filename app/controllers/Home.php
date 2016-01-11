<?php

namespace app\controllers;
use \app\core\MainController as MainController;

class Home extends MainController
{

    public function index()
    {
        $this->model = new \app\models\Home();
        $this->view = 'home/index';

        $this->render('header', array('title' => 'Novinky',));

        $data['download'] = 'Here you can download';
        $data['ahoj'] = 'Say hi';
        $data['novinky'] = $this->model->news();
        $this->render($this->view, $data);

        $this->render('footer');
    }

}