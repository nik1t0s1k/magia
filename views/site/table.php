<?php

use kartik\datetime\DateTimePicker;
use yii\bootstrap5\ActiveForm;
use yii\helpers\Html;
use yii\widgets\MaskedInput;

$items = \app\models\Tables::find()
    ->select(['number'])
    ->indexBy('id')
    ->column();
?>

<div class="reservation-form-wrapper">
    <?php $form = ActiveForm::begin([
        'options' => ['enctype' => 'multipart/form-data', 'class' => 'reservation-form']
    ]); ?>

    <div class="form-group">
        <?= $form->field($model, 'table_id')
            ->dropDownList($items, ['prompt' => 'Выберите столик', 'class' => 'form-control'])  ?>
    </div>


    <div class="form-group">
        <?= $form->field($model, 'date')->input('datetime-local') ?>


    </div>

    <div class="form-group">
        <?= Html::submitButton('Отправить', ['class' => 'btn btn-reserve']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
