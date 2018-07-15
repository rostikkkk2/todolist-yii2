<?php
  $this -> registerCssFile('@web/css/style.css', ['depends' => 'app\assets\AppAsset']);
  use yii\widgets\ActiveForm;
  use yii\helpers\Html;
  use app\models\Todolists;
  use app\models\User;
  use app\models\Tasks;
 ?>
 <div class="container-fluid">
   <div class="row">
     <div class="col-xs-12 logo-todolist">
       <h1 class="">SIMPLE TODO LISTS<br></h1>
       <span>FROM RUBY GARAGE</span>
     </div>
   </div>
    <?php foreach ($alltodolists as $todolist): ?>
      <div class="row">
        <div class="col-xs-12 ">
          <div class="all-todolist">
            <div class="row">
              <div class="col-xs-12">
                <div class="title">
                  <div class="row">
                    <div class="col-xs-1"><img class="img-nodelist" src='/web/images/nodelist.png'></div>
                    <div class="col-xs-8 mt-10">
                      <span class="update-todo-title"><?= $todolist -> title ?></span>
                      <div class="hidden update-todo-input mt--2">
                        <?php $update_todo = ActiveForm::begin(['action' => ['/todolist/update/' . $todolist -> id], 'enableClientValidation' => false, 'method' => 'post']); ?>
                        <?= $update_todo -> field($todolist, 'title') -> textInput(['class' => 'todolist-title-input', 'value' => $todolist -> title]) -> label(false); ?>
                        <?= Html::submitButton('', ['class' => 'glyphicon glyphicon-ok btn-submin-update']); ?>
                         <button class="glyphicon glyphicon-remove btn-remove-update" type="button"></button>
                        <?php ActiveForm::end(); ?>
                      </div>
                    </div>
                    <div class="col-xs-1"></div>
                    <div class="col-xs-2 mt-2 icons-drop-update">
                      <div class="icon-update hidden">
                        <img class="mb-6 update-todo" src="/web/images/icon-edit.png">
                      </div>
                      <div class="border-dr-ed hidden">
                        <div class="border-r"></div>
                      </div>
                      <div class="icon-drop hidden">
                        <a href="/todolist/delete/<?= $todolist -> id ?>"><img class="mb-6" src="/web/images/icon-drop.png"></a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-12">
                <div class="input-task input-group">
                  <div class="row">
                    <div class="col-xs-1">
                      <img src="/web/images/green-plus.png">
                    </div>
                    <div class="col-xs-11">
                      <?php $form_task = ActiveForm::begin(['action' => ['/task/create'], 'enableClientValidation' => false, 'method' => 'post']); ?>
                        <?= $form_task -> field($model, 'title') -> textInput(['class'=> 'form-control bs', 'placeholder' => "Start typing here to create a task..."]) -> label(false); ?>
                        <?= $form_task -> field($todolist, 'id') -> hiddenInput() -> label(false); ?>
                        <span class="input-group-btn">
                          <?= Html::submitButton('Add Task', ['class' => 'btn-add-task']); ?>
                        </span>
                      <?php ActiveForm::end(); ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <?php require(__DIR__ . '/task.php'); ?>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
    <?php require(__DIR__ . '/btnAddTodo.php') ?>
  </div>
