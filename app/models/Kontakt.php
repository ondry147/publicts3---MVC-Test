<?php

namespace app\models;
use \app\core\MainModel as MainModel;

class Kontakt extends MainModel
{

    public function news()
    {
        return array('New design', 'Welcome to jungle', 'Implementing router');
    }

}