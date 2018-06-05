<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$form = ActiveForm::begin(['id' => 'registr', 'action' => ['/user/fdkfj'], 'method' => 'post']);
?>

<?= $form -> field($model, 'email');?>
<?= $form -> field($model, 'password');?>
<div class="form-group">
  <?= Html::submitButton('Sent', ['class' => 'btn btn-primary']); ?>
</div>
<?php ActiveForm::end(); ?>
