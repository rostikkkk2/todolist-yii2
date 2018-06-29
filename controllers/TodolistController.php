<?php
  namespace app\controllers;
  use yii\web\Controller;
  use app\models\Todolist;
  use app\models\User;
  use yii\filters\AccessControl;
  use Yii;


 class TodolistController extends Controller {

   public function behaviors(){
       return [
           'access' => [
               'class' => AccessControl::className(),
               'only' => ['index','create','delete','edit'],
               'rules' => [
                   [
                     'allow' => true,
                     'actions' => ['index','create','delete','edit'],
                     'roles' => ['@'],
                   ],
               ],
           ],
         ];
   }

   public function actionIndex(){
     $alltodolists = Yii::$app -> user -> identity -> todolists;
     return $this -> render('todolist', compact('alltodolists'));
   }

   public function actionCreate(){
     Todolist::saveTodolist();
     return $this -> redirect(['todolist/index']);
   }

   public function actionDelete($id){
     $todolist = Todolist::find() -> where(['id' => $id]) -> one();
     $todolist -> delete();
     return $this -> redirect(['todolist/index']);
   }

   public function actionEdit($id){
    $todolist = Todolist::find() -> where(['id' => $id]) -> one();
    $todolist -> title = $_POST['Todolist']['title'];
    $todolist -> save();
    return $this -> redirect(['todolist/index']);
   }

 }
 ?>
