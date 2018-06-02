<?php

namespace app\controllers;
use app\models\LoginForm;
use yii\web\Controller;
use yii\filters\AccessControl;
use Yii;

class UserController extends Controller {
  public function actionEnter(){
    $model = new LoginForm();
    return $this -> render('enter', compact('model'));
  }
}
