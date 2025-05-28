<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/register.css">
    <title>Регистрация</title>
</head>
<body>
<div class="page">
    <div class="authoristion">
        <div class="auth_left">
            <h1>Регистрация</h1>
            <h3>Создать новую учетную запись</h3>
        </div>
        <div class="reg_right">
            <h1>Регистрация</h1>
            <?php
            use yii\helpers\Html;
            use yii\helpers\Url;
            use yii\widgets\ActiveForm;
            use yii\widgets\MaskedInput;

            $form = ActiveForm::begin([]); ?>
            <?= $form->field($model, 'username')->textInput()->label('Логин'); ?>
            <?= $form->field($model, 'first_name')->textInput()->label('Имя'); ?>
            <?= $form->field($model, 'last_name')->textInput()->label('Фамилия'); ?>
            <?= $form->field($model, 'email')->textInput()->label('Электронная почта'); ?>
            <?= $form->field($model, 'number')->widget(MaskedInput::className(), [
                'mask' => '+7 (999) 999 99 99'])->label('Номер телефона');
            ?>            <?= $form->field($model, 'password')->passwordInput()->label('Пароль'); ?>
            <?= Html::submitButton('Зарегистрироваться'); ?>
            <div class="registration_link"><p>Уже есть профиль? <a href="<?=Url::to('site/login') ?>">Авторизация</a> </p></div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
</body>
</html>