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
            'only' => ['create','check','uncheck','movetask','deadline'],
            'rules' => [
                [
                  'allow' => true,
                  'actions' => ['create','check','uncheck','movetask','deadline'],
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
      $model -> deadline = Yii::$app->formatter->asDate('now + 1 day + 3 hour', 'yyyy-MM-dd H:i:s');
      $max_position = Tasks::find() -> where(['todolist_id' => $_POST['Todolists']['id']]) -> max('position');
      !$max_position ? $model -> position = 1 : $model -> position = $max_position + 1;
      if ($model -> save()) {
        Yii::$app -> session -> setFlash('success', 'your task created');
      }else {
        Yii::$app -> session -> setFlash('error', 'your task must not be empty and contain less 40 letters');
      }
      return $this -> redirect(['/todolist/index']);
    }

    public function actionCheck($id){
      $task = Tasks::findOne($id);
      $task -> is_completed = Yii::$app -> getRequest() -> getQueryParam('value');
      $task -> save();
      return $this -> redirect(['/todolist/index']);
    }

    public function actionDelete($id){
      $task = Tasks::findOne($id) -> delete();
      return $this -> redirect(['/todolist/index']);
    }

    public function actionUpdate($id){
      $task = Tasks::findOne($id);
      $task -> title = $_POST['Tasks']['title'];
      if ($task -> save()) {
        Yii::$app -> session -> setFlash('success', 'your task updated');
      }else {
        Yii::$app -> session -> setFlash('error', 'your task must not be empty and contain less 40 letters');
      }
      return $this -> redirect(['/todolist/index']);
    }

    public function actionMovedown($id){
      $current_task = Tasks::findOne($id);
      $neighbor_task = Tasks::find() -> where(['>', 'position', $current_task -> position])
      -> andWhere(['todolist_id' => $current_task['todolist_id']]) -> orderBy(['position' => SORT_ASC])-> one();
      $current_position = $current_task -> position;
      $neighbor_position = $neighbor_task -> position;
      $current_task -> position = $neighbor_position;
      $neighbor_task -> position = $current_position;
      $current_task -> save();
      $neighbor_task -> save();
      return $this -> redirect(['/todolist/index']);
    }

    public function actionMoveup($id){
      $current_task = Tasks::findOne($id);
      $neighbor_task = Tasks::find() -> where(['<', 'position', $current_task -> position])
      -> andWhere(['todolist_id' => $current_task['todolist_id']]) -> orderBy(['position' => SORT_DESC])-> one();
      $current_position = $current_task -> position;
      $neighbor_position = $neighbor_task -> position;
      $current_task -> position = $neighbor_position;
      $neighbor_task -> position = $current_position;
      $current_task -> save();
      $neighbor_task -> save();
      return $this -> redirect(['/todolist/index']);
    }

    public function actionDeadline($id){
      $task_id = Tasks::findOne($id);
      $user_new_date = $_POST['Tasks']['deadline'];
      if (!empty($user_new_date)) {
        $task_id -> deadline = $user_new_date;
        $task_id -> save();
      }else {
        Yii::$app -> session -> setFlash('error', 'your deadline must not be empty');
      }
      return $this -> redirect(['/todolist/index']);

    }

  }

 ?>
