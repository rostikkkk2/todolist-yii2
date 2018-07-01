<?php
  namespace app\controllers;
  use yii\web\Controller;
  use yii\filters\AccessControl;
  use app\models\Todolists;
  use app\models\Tasks;
  use Yii;

  class TaskController extends Controller{
    public function actionCreate(){
      $model = new Tasks;
      $model -> todolist_id = $_POST['Todolists']['id'];
      $model -> title = $_POST['Tasks']['title'];
      $model -> save();
      return $this -> redirect(['/todolist/index']);
    }
  }

 ?>
