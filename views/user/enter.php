<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$form = ActiveForm::begin(['action' => ['/user/signin'], 'method' => 'post']);
?>

<?= $form -> field($model, 'email');?>
<?= $form -> field($model, 'password') -> passwordInput();?>
<?= $form -> field($model, 'rememberMe') -> checkbox(); ?>
<div class="form-group">
  <?= Html::submitButton('Sent', ['class' => 'btn btn-primary']); ?>
</div>
<?php ActiveForm::end(); ?>
