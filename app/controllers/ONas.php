<?php

namespace app\controllers;
use \app\core\MainController as MainController;

class ONas extends MainController
{
    public function index()
    {
        $this->model = new \app\models\Kontakt();
        $this->view = 'o-nas/index';

        $this->render('header', array('title' => 'O nás'));

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