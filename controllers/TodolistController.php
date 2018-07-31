<?php
  namespace app\controllers;

  use yii\web\Controller;
  use app\models\Todolists;
  use app\models\User;
  use yii\filters\AccessControl;
  use app\models\Tasks;
  use Yii;

 class TodolistController extends Controller {
  public function behaviors() {
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

   public function actionIndex() {
     $model = new Tasks();
     $alltodolists = Yii::$app -> user -> identity -> todolists;
     return $this -> render('todolist', compact('alltodolists', 'model'));
   }

   public function actionCreate() {
     $request = Yii::$app -> request;
     if ($request->isPost) {
       Todolists::saveTodolist();
       Yii::$app -> session -> setFlash('success', 'your todolist successfuly created');
     }else {
       Yii::$app -> session -> setFlash('error', 'your todolist is not created');
     }
     return $this -> redirect(['todolist/index']);
   }

   public function actionDelete($id) {
     $todolist = Todolists::findOne($id);
     if ($todolist -> user_id == Yii::$app -> user -> id) {
       $todolist -> delete();
     }else {
       Yii::$app -> session -> setFlash('error', 'todolist not found');
     }
     return $this -> redirect(['todolist/index']);
   }

   public function actionUpdate($id) {
    $todolist = Todolists::findOne($id);
    if ($todolist -> user_id == Yii::$app -> user -> id) {
      $todolist_title = Yii::$app -> request -> post('Todolists')['title'];
      $todolist -> title = $todolist_title;
      if ($todolist -> save()) {
        Yii::$app -> session -> setFlash('success', 'your todolist successfuly updated');
      }else{
        Yii::$app -> session -> setFlash('error', 'your todolist must not be empty and contain less 40 letters');
      }
    }else {
      Yii::$app -> session -> setFlash('error', 'todolist not found');
    }
    return $this -> redirect(['todolist/index']);
  }

}
?>
