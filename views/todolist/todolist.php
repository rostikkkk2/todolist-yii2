<?php
  $this -> registerCssFile('@web/css/style.css', ['depends' => 'app\assets\AppAsset']);
  use yii\widgets\ActiveForm;
  use yii\helpers\Html;
  use app\models\Todolists;
  use app\models\User;
  use app\models\Tasks;
 ?>
 <div class="container">
   <div class="row">
     <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 logo-todolist">
       <h1>SIMPLE TODO LISTS<br></h1>
       <span>FROM RUBY GARAGE</span>
     </div>
   </div>
    <?php foreach ($alltodolists as $todolist): ?>
      <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 col-md-offset-2 col-lg-offset-2">
          <div class="row">
            <div class="col-lg-10 col-md-12 col-sm-12 col-xs-12 col-lg-offset-1">
              <div class="all-todolist">
                <div class="row">
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="title">
                      <div class="row">
                        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"><img class="img-nodelist" src='/web/images/nodelist.png'></div>
                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-9 bloc-title-todo mt-10">
                          <span class="update-todo-title"><?= $todolist -> title ?></span>
                          <div class="hidden update-todo-input mt--2">
                            <?php $update_todo = ActiveForm::begin([
                              'action' => ['/todolist/update/' . $todolist -> id],
                              'enableClientValidation' => false,
                              'method' => 'put'
                            ]); ?>
                            <?= $update_todo -> field($todolist, 'title') -> textInput(['class' => 'todolist-title-input', 'value' => $todolist -> title]) -> label(false); ?>
                            <?= Html::submitButton('', ['class' => 'glyphicon glyphicon-ok btn-submin-update']); ?>
                             <button class="glyphicon glyphicon-remove btn-remove-update" type="button"></button>
                            <?php ActiveForm::end(); ?>
                          </div>
                        </div>
                        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-hidden "></div>
                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 mt-2 icons-drop-update">
                          <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-hidden col-xs-hidden"></div>
                            <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 block-btns-todo">
                              <div class="icon-update hidden">
                                <img class="update-todo" src="/web/images/icon-edit.png">
                              </div>
                              <div class="border-dr-ed hidden">
                                <div class="border-r"></div>
                              </div>
                              <div class="icon-drop hidden">
                                <?php $delete_todo = ActiveForm::begin([
                                  'action' => ['/todolist/delete/' . $todolist -> id],
                                  'enableClientValidation' => false,
                                  'method' => 'delete'
                                ]); ?>
                                <?= Html::submitButton(Html::img('/web/images/icon-drop.png'), ['class' => ' btn-delete-todolist']); ?>
                                <?php $delete_todo = ActiveForm::end(); ?>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="input-task">
                      <div class="row">
                        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 left-xs-med-img">
                          <img src="/web/images/green-plus.png">
                        </div>
                        <div class="col-lg-11 col-md-11 col-sm-11 col-xs-11">
                          <?php $form_task = ActiveForm::begin([
                            'action' => ['/task/create'],
                            'enableClientValidation' => false,
                            'method' => 'post'
                          ]); ?>
                            <?= $form_task -> field($model, 'title') -> textInput(['class'=> 'form-control bs', 'autocomplete' => "off", 'placeholder' => "Start typing here to create a task..."]) -> label(false); ?>
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
        </div>
      </div>
    <?php endforeach; ?>
    <?php require(__DIR__ . '/btnAddTodo.php') ?>
  </div>
