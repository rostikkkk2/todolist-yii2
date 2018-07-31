<?php
use app\assets\AppAsset;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
AppAsset::register($this);
?>
<?php $this -> beginPage(); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <?php $this -> head(); ?>
  </head>
  <body>
    <?php $this -> beginBody(); ?>
    <header>
      <div class="container-fluid">
        <div class="row text-right">
          <div class="col-xs-12 header">
            <?php if (Yii::$app -> user -> isGuest): ?>
              <a href="/user/enter">Enter</a>
              <a href="/user/new">Registration</a>
            <?php else: ?>
              <a href="/user/logout">Logout</a>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </header>
    <main>
      <div class="content">
        <?php if (Yii::$app -> session -> hasFlash('success')) :?>
          <div class="alert alert-success alert-dismissible mt-20" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <?= Yii::$app -> session -> getFlash('success'); ?>
          </div>
        <?php endif; ?>
        <?php if (Yii::$app -> session -> hasFlash('error')) :?>
        <div class="alert alert-danger alert-dismissible mt-20" role="alert">
          <?= Yii::$app -> session -> getFlash('error'); ?>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <?php endif; ?>
        <?= $content ?>
      </div>
    </main>
    <footer>
      <div class="container-fluid">
        <div class="row ">
          <div class="col-xs-12 text-center">
            <a href="https://rubygarage.org/" target="_blank">@Ruby Garage</a>
          </div>
        </div>
      </div>
    </footer>
    <?php $this -> endBody(); ?>
  </body>
  <?php $this -> endPage(); ?>
</html>
