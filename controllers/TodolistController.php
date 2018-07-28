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
         'only' => ['index','create','delete','update'],
         'rules' => [
             [
               'allow' => true,
               'actions' => ['index','create','delete','update'],
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
     Todolists::findOne($id) -> delete();
     return $this -> redirect(['todolist/index']);
   }

   public function actionUpdate($id){
    $todolist = Todolists::findOne($id);
    $todolist_title = $_POST['Todolists']['title'];
    $todolist -> title = $todolist_title;
    if ($todolist -> save()) {
      Yii::$app -> session -> setFlash('success', 'your todolist successfuly updated');
    }else{
      Yii::$app -> session -> setFlash('error', 'your todolist must not be empty and contain less 40 letters');
    }
    return $this -> redirect(['todolist/index']);
   }

 }
 ?>
