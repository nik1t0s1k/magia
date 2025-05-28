<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Product */
/* @var $categories app\models\Categories[] */

$this->title = 'Добавить товар';
?>
<h1 class="form-title"><?= Html::encode($this->title) ?></h1>

<div class="product-form-wrapper">
    <?php $form = ActiveForm::begin([
        'options' => ['enctype' => 'multipart/form-data', 'class' => 'product-form']
    ]); ?>

    <div class="form-group">
        <?= $form->field($model, 'name')->textInput(['class' => 'form-control']) ?>
    </div>

    <div class="form-group">
        <?= $form->field($model, 'description')->textarea(['rows' => 6, 'class' => 'form-control']) ?>
    </div>

    <div class="form-group">
        <?= $form->field($model, 'price')->textInput(['class' => 'form-control']) ?>
    </div>

    <div class="form-group">
        <?= $form->field($model, 'category_id')->dropDownList(
            \yii\helpers\ArrayHelper::map($categories, 'id', 'name'),
            ['prompt'=>'Выберите категорию', 'class' => 'form-control']
        ) ?>
    </div>

    <div class="form-group">
        <?= $form->field($model, 'image')->fileInput(['class' => 'form-control']) ?>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
