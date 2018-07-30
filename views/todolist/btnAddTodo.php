<?php $this -> registerCssFile('@web/css/style.css', ['depends' => 'app\assets\AppAsset']);
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use app\models\Todolists;
?>
<div class="row">
  <div class="col-xs-12">
    <div class="w-180 m-a">
      <?php $btn_add_todo = ActiveForm::begin([
        'action' => '/todolist/create',
        'method' => 'post'
      ]); ?>
        <button type="submit" class="btn-add-todo">
          <img src="/web/images/blue-plus.png">
          <span>Add TODO List</span>
        </button>
      <?php $btn_add_todo = ActiveForm::end();?>
    </div>
  </div>
</div>
