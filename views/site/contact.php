<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Контакты</title>
    <link rel="stylesheet" href="css/contact.css">
</head>

<body>
    <div class="query">
        <h1>Наши <h1 class="yellow">контакты</h1>
        </h1>
    </div>
    <div class="contact">
        <div class="contact-info">
            <div class="contact-left">
                <div class="address">
                    <h3>Адрес</h3>
                    <p>г.Курган</p>
                    <p>ул.Карельцева 32</p>
                </div>
                <div class="time">
                    <h3>Время работы</h3>
                    <p>9:00 - 22:00</p>
                </div>
                <div class="phone">
                    <h3>Номер телефона</h3>
                    <p>+7 (909) 345-22-33</p>
                </div>
            </div>
            <?php
            use yii\helpers\Html;
            use yii\widgets\ActiveForm;

            $form = ActiveForm::begin([
                'id' => 'contactForm',
                'options' => ['class' => 'form-horizontal'],
            ]) ?>
            <div class="contact-form">
                <h3>Обратная связь</h3>
                <div class="contact-top">
                    <div class="input-top-left">
                        <?= $form->field($model, 'first_name') ?>

                    </div>
                    <div class="input-top-right">
                        <?= $form->field($model, 'last_name') ?>

                    </div>
                </div>
                <div class="">
                    <?= $form->field($model, 'description') ?>
                </div>
                <div class="accept">
                    <input required type="checkbox" placeholder="Соглашаюсь на орбработку персональных данных"> Соглашаюсь на
                    обработку персональных данных
                </div>
                <div class="form-group">
                    <div class="col-lg-offset-1 col-lg-11">
                        <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary']) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <?php ActiveForm::end() ?>
</body>

</html>