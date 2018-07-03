<?php
  namespace app\controllers;
  use yii\web\Controller;
  use yii\filters\AccessControl;
  use app\models\Todolists;
  use app\models\Tasks;
  use Yii;

  class TaskController extends Controller{

    public function behaviors(){
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['create','check','uncheck'],
                'rules' => [
                    [
                      'allow' => true,
                      'actions' => ['create','check','uncheck'],
                      'roles' => ['@'],
                    ],
                ],
            ],
          ];
    }

    public function actionCreate(){
      $model = new Tasks;
      $model -> todolist_id = $_POST['Todolists']['id'];
      $model -> title = $_POST['Tasks']['title'];
      if ($model -> save()) {
        return $this -> redirect(['/todolist/index']);
      }else {
        Yii::$app -> session -> setFlash('error', 'your task should contain letters');
        return $this -> redirect(['/todolist/index']);
      }
    }

    public function actionCheck($id){
      $task = Tasks::find() -> where(['id' => $id]) -> one();
      $task -> is_completed = 1;
      $task -> save();
      return $this -> redirect(['/todolist/index']);
    }

    public function actionUncheck($id){
      $task = Tasks::find() -> where(['id' => $id]) -> one();
      $task -> is_completed = 0;
      $task -> save();
      return $this -> redirect(['/todolist/index']);
    }

  }

 ?>
