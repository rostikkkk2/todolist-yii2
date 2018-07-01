<?php
  $this -> registerCssFile('@web/css/catalog.css', ['depends' => 'app\assets\AppAsset']);
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
                      <span class="update_todo_title"><?= $todolist -> title ?></span>
                      <div class="hidden update_todo_input mt-2">
                        <?php $update_todo = ActiveForm::begin(['action' => ['/todolist/edit/' . $todolist -> id], 'method' => 'post']); ?>
                        <?= $update_todo -> field($todolist, 'title') -> textInput(['class'=> 'todolist-title-input', 'value' => $todolist -> title])->label(false); ?>
                        <?= Html::submitButton('', ['class' => 'glyphicon glyphicon-ok btn-submin-update']); ?>
                         <button class="glyphicon glyphicon-remove btn-remove-update" type="button"></button>
                        <?php ActiveForm::end(); ?>
                      </div>
                    </div>
                    <div class="col-xs-1"></div>
                    <div class="col-xs-2 mt-2 icons-drop-edit">
                      <div class="icon-edit hidden">
                        <a><img class="mb-6 update_todo" src="/web/images/icon-edit.png"></a>
                      </div>
                      <div class="border_dr_ed hidden">
                        <div class="border-r"></div>
                      </div>
                      <div class="icon-drop  hidden">
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
                        <?= $form_task -> field($model, 'title') -> textInput(['class'=> 'form-control bs', 'placeholder' => "Start typing here to create a task..."])->label(false); ?>
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
            <div class="row">
              <div class="col-xs-12">
                <div class="all-tasks">
                  <div class="row">
                    <div class="col-xs-1 checkbox-done">
                       <!-- $checkbox_task_form = ActiveForm::begin(['action' => ['/todolist/checkTaskCompleted/' . $task -> id], 'method' => 'post']); ?> -->
                       <!-- $checkbox_task_form -> field($task, 'myAttribute') -> checkbox(); ?> -->
                       <!-- ActiveForm::end(); ?> -->

                    </div>
                    <div class="col-xs-9 vert-borders-l pr-21">
                      <div class="vert-borders-l ml-11"></div>
                      <div class="text-task">
                        <span>Do home task</span>
                      </div>
                      <div class="vert-border-r"></div>
                    </div>
                    <div class="col-xs-2">
                      <div class="btns-move-update-delete">

                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    <?php endforeach; ?>
    <div class="row">
      <div class="col-xs-12">
        <div class="w-180 m-a">
          <a href="/todolist/create" class="">
            <button class="btn-add-todo">
              <img src="/web/images/blue-plus.png">
              <span>Add TODO List</span>
            </button>
          </a>
        </div>
      </div>
    </div>
  </div>
