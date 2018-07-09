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
                      <span class="update-todo-title"><?= $todolist -> title ?></span>
                      <div class="hidden update-todo-input mt--2">
                        <?php $update_todo = ActiveForm::begin(['action' => ['/todolist/update/' . $todolist -> id], 'method' => 'post']); ?>
                        <?= $update_todo -> field($todolist, 'title') -> textInput(['class'=> 'todolist-title-input', 'value' => $todolist -> title])->label(false); ?>
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
                          <span class="title-task"><?= $task -> title ?></span>
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
