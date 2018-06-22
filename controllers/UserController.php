<?php

namespace app\controllers;

use app\models\LoginForm;
use app\models\RegistrationForm;
use app\models\User;
use yii\web\Controller;
use yii\filters\AccessControl;
use Yii;

class UserController extends Controller {

  // public function behaviors(){
  //     return [
  //         'access' => [
  //             'class' => AccessControl::className(),
  //             'only' => ['logout','new','enter','create','signin'],
  //             'rules' => [
  //                 [
  //                     'allow' => true,
  //                     'actions' => ['new','enter','create','signin'],
  //                     'roles' => ['?'],
  //                 ],
  //                 [
  //                   'allow' => true,
  //                   'actions' => ['logout'],
  //                   'roles' => ['@'],
  //                 ],
  //             ],
  //         ],
  //       ];
  // }

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
      Yii::$app -> session -> setFlash('success', 'you are successfuly registrated');
      return $this -> goHome();
    }
  }

  public function actionLogout(){
    Yii::$app -> user -> logout();
    return $this -> goHome();
  }

  public function actionSignin(){
    $model = new LoginForm();
    $model -> load(Yii::$app -> request -> post());

    if ($model -> login()) {
      return $this -> redirect(['todolist/index']);
    }else {
      Yii::$app -> session -> setFlash('error', 'your email or password is wrong');
      return $this -> goHome();
    }
  }

  }
