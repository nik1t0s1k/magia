<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */

/** @var app\models\LoginForm $model */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

$this->title = 'Авторизация';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login login-container">
    <h1 class="login-title"><?= Html::encode($this->title) ?></h1>

    <p class="login-subtitle">Пожалуйста, введите данные для входа:</p>

    <div class="login-form-wrapper">
        <?php $form = ActiveForm::begin([
            'id' => 'login-form',
            'fieldConfig' => [
                'template' => "{label}\n{input}\n{error}",
                'labelOptions' => ['class' => 'form-label'],
                'inputOptions' => ['class' => 'form-control'],
                'errorOptions' => ['class' => 'invalid-feedback'],
            ],
        ]); ?>

        <?= $form->field($model, 'username')->textInput(['autofocus' => true])->label('Имя пользователя') ?>

        <?= $form->field($model, 'password')->passwordInput()->label('Пароль') ?>

        <?= $form->field($model, 'rememberMe')->checkbox([
            'template' => "<div class=\"form-check\">{input} {label}</div>\n{error}",
            'labelOptions' => ['class' => 'form-check-label'],
            'inputOptions' => ['class' => 'form-check-input'],
        ])->label('Запомнить меня') ?>

        <div class="form-group mt-3">
            <?= Html::submitButton('Войти', ['class' => 'btn login-btn', 'name' => 'login-button']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>
