<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Subscriber;

/* @var $this yii\web\View */
/* @var $model app\models\Messaging */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="messaging-form">

    <?php $form = ActiveForm::begin(['id' => 'messaging-form']); ?>

    <?= $form->field($model, 'emails')->checkboxList(ArrayHelper::map(Subscriber::find()->all(), 'email', 'email')) ?>

    <?= $form->field($model, 'subject')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>