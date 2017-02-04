<?php

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

$form = ActiveForm::begin([
            'id' => 'subscribe-form',
            'action' => 'index.php?r=about',
        ]);
echo $form->field($model, 'email', ['inputOptions' => ['placeholder' => 'Ваш email']])
        ->label('Подписка на новости:');
echo Html::submitButton('OK', ['class' => 'btn btn-primary']);
ActiveForm::end();
?>