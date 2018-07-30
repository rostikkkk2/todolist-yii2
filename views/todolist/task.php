<?php $this -> registerCssFile('@web/css/style.css', ['depends' => 'app\assets\AppAsset']);
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use app\models\User;
use app\models\Tasks;
use kartik\datetime\DateTimePicker;
?>
<div class="tasks-bord-rad">
  <?php foreach ($todolist -> tasks as $task): ?>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <?php $deadline = $task -> deadline <= Yii::$app -> formatter -> asDate('now', 'yyyy-MM-dd H:i:s') && $task -> is_completed == 0 ? "deadline-over" : ""?>
        <div class="all-task <?= $deadline ?>">
          <div class="row">
            <div class="col-md-1 col-sm-1 col-xs-1 checkbox-done">
              <?php $checkbox_task_form = ActiveForm::begin([
                'action' => '/task/check/' . $task -> id,
                'method' => 'patch',
                'options' => ['class' => 'checkbox_task']
              ]); ?>
              <?php if ($task -> is_completed == 0): ?>
                <?= $checkbox_task_form -> field($task, 'is_completed') -> checkBox(['label' => null, 'checked' => false]); ?>
              <?php else: ?>
                <?= $checkbox_task_form -> field($task, 'is_completed') -> checkBox(['label' => null, 'checked' => true]); ?>
              <?php endif; ?>
              <?php $checkbox_task_form = ActiveForm::end(); ?>
            </div>
            <div class="col-md-9 col-sm-9 col-xs-9 middle-row-text vert-borders-l vert-border-r">
              <div class="text-task">
                <?php if ($task -> is_completed == false): ?>
                  <span class="title-task"><?= $task -> title ?></span>
                <?php else: ?>
                  <span class="title-task task-done-cross"><?= $task -> title ?></span>
                <?php endif; ?>
                <div class="hidden update-form-task">
                  <?php $update_task = ActiveForm::begin([
                    'action' => '/task/update/' . $task -> id,
                    'enableClientValidation' => false,
                    'method' => 'put'
                  ]); ?>
                  <?= $update_task -> field($model, 'title') -> textInput(['class' => 'input-task-update', 'value' => $task -> title]) -> label(false); ?>
                  <?= Html::submitButton('', ['class' => 'glyphicon glyphicon-ok btn-update-task']);?>
                  <button class="glyphicon glyphicon-remove btn-remove-update-task" type="button"></button>
                  <?php ActiveForm::end(); ?>
                </div>
                <div class="update-datetime-deadline hidden">
                  <?php $update_deadline = ActiveForm::begin([
                    'action' => '/task/deadline/' . $task -> id,
                    'method' => 'put',
                    'id' => $task -> id . " update_deadline",
                    'options' => ['class' => 'form-update-deadline']
                  ]);?>
                  <?= $update_deadline -> field($model, "[$task->id]deadline") -> widget(DateTimePicker::classname(), ['readonly'=> true])->label(false); ?>
                  <?= Html::submitButton('', ['class' => 'glyphicon glyphicon-ok btn-update-deadline']);?>
                  <button class="glyphicon glyphicon-remove btn-cancel-update-deadline" type="button"></button>
                  <?php $update_deadline = ActiveForm::end(); ?>
                </div>
              </div>
              <span class="deadline-text"><?= $task -> deadline ?></span>
            </div>
            <div class="col-md-2 col-sm-2 col-xs-2 btns-task">
              <div class="btns-move-update-delete hidden">
                <div class="mt-7">
                  <?php $move_task_up = ActiveForm::begin([
                    'action' => '/task/moveup/' . $task -> id,
                    'enableClientValidation' => false,
                    'method' => 'patch'
                   ]); ?>
                  <?= Html::submitButton('', ['class' => 'glyphicon glyphicon-triangle-top move-task-up']); ?>
                  <?php $move_task_up = ActiveForm::end(); ?>
                  <?php $move_task_down = ActiveForm::begin([
                    'action' => '/task/movedown/' . $task -> id,
                    'enableClientValidation' => false,
                    'method' => 'patch'
                  ]); ?>
                  <?= Html::submitButton('', ['class' => 'glyphicon glyphicon-triangle-bottom move-task-down']); ?>
                  <?php $move_task_down = ActiveForm::end(); ?>
                </div>
                <div class="task-border-r"></div>
                <div>
                  <img class="update-task" src="/web/images/task-update2.png">
                </div>
                <div class="task-border-l"></div>
                <div>
                  <?php $delete_task = ActiveForm::begin([
                    'action' => '/task/delete/' . $task -> id,
                    'enableClientValidation' => false,
                    'method' => 'delete'
                   ]); ?>
                  <?= Html::submitButton(Html::img('/web/images/task-delete2.png'), ['class' => 'delete-task']); ?>
                  <?php $delete_task = ActiveForm::end(); ?>
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
