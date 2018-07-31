<?php
  namespace app\controllers;

  use yii\web\Controller;
  use yii\filters\AccessControl;
  use app\models\Todolists;
  use app\models\Tasks;
  use Yii;

  class TaskController extends Controller {
    public function behaviors() {
      return [
        'access' => [
            'class' => AccessControl::className(),
            'only' => ['create','check','uncheck','deadline','moveup','movedown'],
            'rules' => [
                [
                  'allow' => true,
                  'actions' => ['create','check','uncheck','deadline','moveup','movedown'],
                  'roles' => ['@'],
                ],
            ],
        ],
      ];
    }

    public function actionCreate() {
      $request = Yii::$app -> request;
      if ($request->isPost) {
        $model = new Tasks;
        $model -> todolist_id = Yii::$app -> request -> post('Todolists')['id'];
        $model -> title = Yii::$app -> request -> post('Tasks')['title'];
        $model -> deadline = Yii::$app->formatter->asDate('now + 1 day + 3 hour', 'yyyy-MM-dd H:i:s');
        $max_position = Tasks::find() -> where(['todolist_id' => Yii::$app -> request -> post('Todolists')['id']]) -> max('position');
        !$max_position ? $model -> position = 1 : $model -> position = $max_position + 1;
        if ($model -> save()) {
          Yii::$app -> session -> setFlash('success', 'your task created');
        }else {
          Yii::$app -> session -> setFlash('error', 'your task must not be empty and contain less 40 letters');
        }
      }else {
        Yii::$app -> session -> setFlash('error', 'your task must not be empty and contain less 40 letters');
      }
      return $this -> redirect(['/todolist/index']);
    }

    public function actionCheck($id) {
      $task = Tasks::findOne($id);
      if ($task -> todolist -> user -> id == Yii::$app -> user -> id) {
        $task -> is_completed == 0 ? $task -> is_completed = 1 : $task -> is_completed = 0;
        $task -> save();
      }else{
        Yii::$app -> setFlash('error', 'Task not found');
      }
      return $this -> redirect(['/todolist/index']);
    }

    public function actionDelete($id) {
      $task = Tasks::findOne($id);
      if ($task -> todolist -> user -> id == Yii::$app -> user -> id) {
        $task -> delete();
      }else{
        Yii::$app -> setFlash('error', 'Task not found');
      }
      return $this -> redirect(['/todolist/index']);
    }

    public function actionUpdate($id) {
      $task = Tasks::findOne($id);
      if ($task -> todolist -> user -> id == Yii::$app -> user -> id) {
        $task -> title = Yii::$app -> request -> post('Tasks')['title'];
        if ($task -> save()) {
          Yii::$app -> session -> setFlash('success', 'your task updated');
        }else {
          Yii::$app -> session -> setFlash('error', 'your task must not be empty and contain less 40 letters');
        }
      }else{
        Yii::$app -> setFlash('error', 'Task not found');
      }
      return $this -> redirect(['/todolist/index']);
    }

    public function actionMovedown($id) {
      $current_task = Tasks::findOne($id);
      if ($current_task -> todolist -> user -> id == Yii::$app -> user -> id) {
        $neighbor_task = Tasks::find() -> where(['>', 'position', $current_task -> position])
        -> andWhere(['todolist_id' => $current_task['todolist_id']]) -> orderBy(['position' => SORT_ASC])-> one();
        $current_position = $current_task -> position;
        $neighbor_position = $neighbor_task -> position;
        $current_task -> position = $neighbor_position;
        $neighbor_task -> position = $current_position;
        $current_task -> save();
        $neighbor_task -> save();
      }else{
        Yii::$app -> setFlash('error', 'Task not found');
      }
      return $this -> redirect(['/todolist/index']);
    }

    public function actionMoveup($id) {
      $current_task = Tasks::findOne($id);
      if ($current_task -> todolist -> user -> id == Yii::$app -> user -> id) {
        $neighbor_task = Tasks::find() -> where(['<', 'position', $current_task -> position])
        -> andWhere(['todolist_id' => $current_task['todolist_id']]) -> orderBy(['position' => SORT_DESC])-> one();
        $current_position = $current_task -> position;
        $neighbor_position = $neighbor_task -> position;
        $current_task -> position = $neighbor_position;
        $neighbor_task -> position = $current_position;
        $current_task -> save();
        $neighbor_task -> save();
      }else{
        Yii::$app -> setFlash('error', 'Task not found');
      }
      return $this -> redirect(['/todolist/index']);
    }

    public function actionDeadline($id) {
      $task_id = Tasks::findOne($id);
      if ($task_id -> todolist -> user -> id == Yii::$app -> user -> id) {
        $user_new_date = Yii::$app -> request -> post('Tasks')["$id"]['deadline'];
        if (!empty($user_new_date)) {
          $task_id -> deadline = $user_new_date;
          $task_id -> save();
        }else {
          Yii::$app -> session -> setFlash('error', 'your deadline must not be empty');
        }
      }else{
        Yii::$app -> setFlash('error', 'Task not found');
      }
      return $this -> redirect(['/todolist/index']);
    }

  }

 ?>
