<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$form = ActiveForm::begin(['action' => ['/user/signin'], 'method' => 'post']);//whi need id => registr
?>

<?= $form -> field($model, 'email');?>
<?= $form -> field($model, 'password');?>
<?= $form -> field($model, 'rememberMe') -> checkbox(); ?>
<div class="form-group">
  <?= Html::submitButton('Sent', ['class' => 'btn btn-primary']); ?>
</div>
<?php ActiveForm::end(); ?>
