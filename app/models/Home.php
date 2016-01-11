<?php

namespace app\models;
use \app\core\MainModel as MainModel;

class Home extends MainModel
{

    public function news()
    {
        return array('New design', 'Welcome to jungle', 'Implementing router');
    }

}