<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'obuv.co | Обратная связь | Интернет-магазин обуви. Доставка по Украине.';
?>

<h3>Форма обратной связи</h3>

<?php if (Yii::$app->session->hasFlash('contactFormSubmitted')): ?>

    <div class="alert alert-success">
        Спасибо за ваше сообщение. Мы свяжемся с вами в ближайшее время.
    </div>

    <p>
        Note that if you turn on the Yii debugger, you should be able
        to view the mail message on the mail panel of the debugger.
        <?php if (Yii::$app->mailer->useFileTransport): ?>
            Because the application is in development mode, the email is not sent but saved as
            a file under <code><?= Yii::getAlias(Yii::$app->mailer->fileTransportPath) ?></code>.
            Please configure the <code>useFileTransport</code> property of the <code>mail</code>
            application component to be false to enable email sending.
        <?php endif; ?>
    </p>

<?php else: ?>


    <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

    <?=
            $form->field($model, 'name', ['inputOptions' => ['placeholder' => 'Представьтесь, пожалуйста']])
            ->label('Отправитель<span class="oc-required">*</span>')
            ->textInput(['autofocus' => true])
    ?>

    <?=
            $form->field($model, 'email', ['inputOptions' => ['placeholder' => 'Укажите ваш email']])
            ->label('Email<span class="oc-required">*</span>')
    ?>

    <?=
            $form->field($model, 'body', ['inputOptions' => ['placeholder' => 'Будьте лаконичны']])
            ->label('Сообщение<span class="oc-required">*</span>')
            ->textarea(['rows' => 6])
    ?>

    <?=
            $form->field($model, 'verifyCode')->label('Проверочный код<span class="oc-required">*</span>')
            ->widget(Captcha::className(), [
                'template' => '<div class="row"><div class="col-md-2">{image}</div><div class="col-md-4">{input}</div></div>',
            ])
    ?>

    <div class="form-group">
        <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary btn-lg']) ?>
    </div>

    <?php ActiveForm::end(); ?>


<?php endif; ?>
