<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

  $form = ActiveForm::begin([
    'action' => ['/user/signin'],
    'method' => 'post'
  ]);
?>

<div class="container">
  <h1 class="text-center">Login</h1>
  <?= $form -> field($model, 'email');?>
  <?= $form -> field($model, 'password') -> passwordInput();?>
  <?= $form -> field($model, 'rememberMe') -> checkbox(); ?>
  <div class="form-group">
    <?= Html::submitButton('Enter', ['class' => 'btn btn-primary']); ?>
  </div>
  <?php ActiveForm::end(); ?>
</div>
