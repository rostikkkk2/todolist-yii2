<?php
use app\assets\AppAsset;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
AppAsset::register($this);

?>
<?php $this->beginPage(); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <?php $this->head(); ?>
  </head>
  <body class="">
    <?php $this->beginBody(); ?>
    <header>
      <div class="container-fluid">
        <div class="row">
          <div class="col-xs-12 header">
            <?php if (Yii::$app->user->isGuest): ?>
              <a class="" href="/user/enter">Вход</a>
              <a class="" href="/user/new">Регистрация</a>
            <?php else: ?>
              <a href="/user/logout">Выход</a>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </header>
    <main>
      <div class="content">
        <?= $content ?>
      </div>
    </main>
    <footer>
      <div class="container-fluid">
        <div class="row">
          <div class="col-xs-12 footer">

          </div>
        </div>
      </div>
    </footer>
    <?php $this->endBody() ?>
  </body>
  <?php $this->endPage(); ?>
</html>
