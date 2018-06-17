<?php
  namespace app\controllers;
  use yii\web\Controller;
  use app\models\Todolist;
  use app\models\User;
  use Yii;


 class TodolistController extends Controller {
   public function actionIndex(){
     $alltodolists = Yii::$app -> user -> identity -> todolists;
     return $this -> render('todolist', compact('alltodolists'));
   }


   public function actionCreate(){
     Todolist::saveTodolist();
     return $this -> redirect(['todolist/index']);
   }

 }
 ?>
