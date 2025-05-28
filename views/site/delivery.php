<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Доставка</title>
    <link rel="stylesheet" href="css/dostavka.css">
</head>
<body>

</body>
</html>
<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Заказы и доставка';
?>

<h1><?= Html::encode($this->title) ?></h1>

<p>Заполните форму ниже, чтобы сделать заказ:</p>

<?php if (Yii::$app->session->hasFlash('success')): ?>
    <div class="alert alert-success">
        <?= Yii::$app->session->getFlash('success') ?>
    </div>
<?php endif; ?>

<?php $form = ActiveForm::begin(); ?>

<?= $form->field($model, 'total')->textInput(['placeholder' => 'Ваше имя']) ?>
<?= $form->field($model, 'address')->textarea(['placeholder' => 'Адрес доставки']) ?>

<div class="form-group">
    <?= Html::submitButton('Оформить заказ', ['class' => 'btn btn-primary']) ?>
</div>

<?php ActiveForm::end(); ?>
