<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$form = ActiveForm::begin(['id' => 'registration', 'action' => ['/user/create'], 'method' => 'post']);
?>

<h1 class="text-center">Registration</h1>
<?= $form -> field($model, 'email');?>
<?= $form -> field($model, 'password') -> passwordInput();?>
<?= $form -> field($model, 'confirm_password') -> passwordInput();?>
<div class="form-group">
  <?= Html::submitButton('Create', ['class' => 'btn btn-primary']); ?>
</div>
<?php ActiveForm::end(); ?>
