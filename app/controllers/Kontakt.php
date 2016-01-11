<?php

namespace app\controllers;
use \app\core\MainController as MainController;

class Kontakt extends MainController
{
    public function index()
    {
        $this->model = new \app\models\Kontakt();
        $this->view = 'kontakt/index';

        $this->render('header', array('title' => 'Kontakt'));

        $data['download'] = 'Here you can download';
        $data['ahoj'] = 'Say hi';
        $data['novinky'] = $this->model->news();
        $this->render($this->view, $data);

        $this->render('footer');
    }

    public function show_form()
    {
        echo 'OK - Contact/show_form()';
    }

}