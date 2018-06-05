<?php

namespace app\controllers;

use app\models\LoginForm;
use app\models\RegistrationForm;
use app\models\User;
use yii\web\Controller;
use yii\filters\AccessControl;
use Yii;

class UserController extends Controller {
  public function actionEnter(){
    $model = new LoginForm();
    return $this -> render('enter', compact('model'));
  }

  public function actionNew(){
    $model = new RegistrationForm();
    return $this -> render('new', compact('model'));
  }

  public function actionCreate(){
    $model = new RegistrationForm();
    $model -> load(Yii::$app -> request -> post());
    if ($model -> registrate()) {
      Yii::$app -> session -> setFlash('success', 'вы успешно зареганы');
      return $this -> goHome();
    }


  }

  }
