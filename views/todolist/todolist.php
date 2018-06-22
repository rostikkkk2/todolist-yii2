<?php
  use yii\helpers\Html;
  $this -> registerCssFile('@web/css/catalog.css', ['depends' => 'app\assets\AppAsset']);
  use app\models\Todolist;
 ?>
 <!-- $todolist -> title -->
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
                    <span><?= $todolist -> title ?></span>
                  </div>
                  <div class="col-xs-1"></div>
                  <div class="col-xs-1 icon-edit">
                    <a href="/todolist/edit"><img class="mb-6" src="/web/images/icon-edit.png"></a>
                  </div>
                  <div class="col-xs-1 icon-drop border-l">
                    <a href="/todolist/delete/<?= $todolist -> id ?>"><img class="mb-6" src="/web/images/icon-drop.png"></a>
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
