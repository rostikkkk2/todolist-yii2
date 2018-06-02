<?php

namespace app\controllers;
use yii\web\Controller;
use Yii;

class PageController extends Controller {
  public function actionEnter(){
    $model = new LoginForm();
    return $this -> render('enter', compact());
  }
}
