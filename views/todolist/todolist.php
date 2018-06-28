<?php
  $this -> registerCssFile('@web/css/catalog.css', ['depends' => 'app\assets\AppAsset']);
  use yii\helpers\Html;
  use yii\widgets\ActiveForm;
  use app\models\Todolist;
  use app\models\User;
 ?>
<?php foreach ($alltodolists as $todolist): ?>
  <div class="container-fluid">
    <div class="row">
      <div class="col-xs-12 ">
        <div class="all-todolist">
          <div class="row">
            <div class="col-xs-12">
              <div class="title">
                <div class="row">
                  <div class="col-xs-1"><img class="img-nodelist" src='/web/images/nodelist.png'></div>
                  <div class="col-xs-8 mt-9">
                    <span class="update_todo_title"><?= $todolist -> title ?></span>
                    <div class="hidden update_todo_input">
                      <?php $update_todo = ActiveForm::begin(['action' => ['/todolist/edit/' . $todolist -> id], 'method' => 'post']); ?>
                      <?= $update_todo -> field($todolist, 'title') -> textInput(['class'=> ' todolist-title-input', 'value' => $todolist -> title])->label(false); ?>
                      <?= Html::submitButton('Sent', ['class' => 'btn btn-primary']); ?>
                      <?php ActiveForm::end(); ?>
                    </div>
                  </div>
                  <div class="col-xs-1"></div>
                  <div class="col-xs-2 icons-drop-edit">
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
          <div class="row ">
            <div class="col-xs-12">
              <div class="input-task input-group">
                <div class="row">
                  <div class="col-xs-1">
                    <img src="/web/images/green-plus.png">
                  </div>
                  <div class="col-xs-11">
                    <input type="text" class="form-control bs" placeholder="Start typing here to create a task...">
                    <span class="input-group-btn">
                      <input class="btn-add-task" type="submit" value="Add Task">
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- <div class="row">
            <div class="col-xs-12">
              <div class="all-tasks">
                <div class="row">

                </div>
              </div>
            </div>
          </div> -->
        </div>
      </div>
    </div>
  </div>

<?php endforeach; ?>
<div>
  <button class="btn-add-todo">
    <i class="glyphicon glyphicon-plus icon-btn-addtodo" aria-hidden="true"></i>
    <a href="/todolist/create" class="fs-15">Add TODO List</a>
  </button>
</div>
