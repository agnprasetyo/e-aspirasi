<?php

namespace backend\controllers;

class DetailController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }
    public function actionAcceptUserRegistration() {

    $value = $_GET['id'];

    if($value == "accept"){
    //will do something here
    }

    if($value == "reject"){
    //will do something here.
    }

    }


}
