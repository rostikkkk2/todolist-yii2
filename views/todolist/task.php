<?php $this -> registerCssFile('@web/css/style.css', ['depends' => 'app\assets\AppAsset']);
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use app\models\User;
use app\models\Tasks;
?>
<div class="tasks-bord-rad">
  <?php foreach ($todolist -> tasks as $task): ?>
    <div class="row">
      <div class="col-xs-12">
        <div class="all-task">
          <div class="row">
            <div class="col-xs-1 checkbox-done">
              <?php $checkbox_task_form = ActiveForm::begin(); ?>
              <?= $checkbox_task_form -> field($task, 'is_completed') -> checkBox(['label' => null, 'class' => 'checkbox_task']); ?>
              <?= $checkbox_task_form -> field($task, 'id') -> hiddenInput(['class' => 'hidden-input-task-id']) -> label(false); ?>
              <?php ActiveForm::end(); ?>
            </div>
            <div class="col-xs-9 vert-borders-l pr-21">
              <div class="vert-borders-l ml-11"></div>
              <div class="text-task">
                <?php if ($task -> is_completed == false): ?>
                  <span class="title-task"><?= $task -> title ?></span>
                <?php else: ?>
                  <span class="title-task task-done-cross"><?= $task -> title ?></span>
                <?php endif; ?>
                <div class="hidden update-form-task">
                  <?php $update_task = ActiveForm::begin(['action' => '/task/update/' . $task -> id, 'enableClientValidation' => false, 'method' => 'post']); ?>
                  <?= $update_task -> field($model, 'title') -> textInput(['class' => 'input-task-update', 'value' => $task -> title]) -> label(false); ?>
                  <?= Html::submitButton('', ['class' => 'glyphicon glyphicon-ok btn-update-task']);?>
                  <button class="glyphicon glyphicon-remove btn-remove-update-task" type="button"></button>
                  <?php ActiveForm::end(); ?>
                </div>
              </div>
              <div class="vert-border-r"></div>
            </div>
            <div class="col-xs-2">
              <div class="btns-move-update-delete hidden">
                <div class="">
                  <i class="move-task glyphicon glyphicon-resize-vertical"></i>
                </div>
                <div class="task-border-r"></div>
                <div class="">
                  <img class="update-task" src="/web/images/task-update2.png">
                </div>
                <div class="task-border-l"></div>
                <div class="">
                  <a href="/task/delete/<?= $task -> id ?>"><img class="delete-task" src="/web/images/task-delete2.png"></a>
                </div>
              </div>
            </div>
          </div>
          <div class="border-b-task"></div>
        </div>
      </div>
    </div>
  <?php endforeach; ?>
</div>
