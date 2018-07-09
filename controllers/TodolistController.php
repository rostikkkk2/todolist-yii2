<?php
  namespace app\controllers;
  use yii\web\Controller;
  use app\models\Todolists;
  use app\models\User;
  use yii\filters\AccessControl;
  use app\models\Tasks;
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
     $model = new Tasks();
     $alltodolists = Yii::$app -> user -> identity -> todolists;
     return $this -> render('todolist', compact('alltodolists', 'model'));
   }

   public function actionCreate(){
     Todolists::saveTodolist();
     return $this -> redirect(['todolist/index']);
   }

   public function actionDelete($id){
     $todolist = Todolists::find() -> where(['id' => $id]) -> one();
     $todolist -> delete();
     return $this -> redirect(['todolist/index']);
   }

   public function actionUpdate($id){
    $todolist = Todolists::find() -> where(['id' => $id]) -> one();
    $todolist_title = $_POST['Todolists']['title'];
    $todolist -> title = $todolist_title;
    if ($todolist_title != '') {
      $todolist -> save();
    }else{
      Yii::$app -> session -> setFlash('error', 'your todolist must not be empty');
    }
    return $this -> redirect(['todolist/index']);
   }

 }
 ?>
