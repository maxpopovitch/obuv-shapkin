<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Omega Shoes | Обратная связь | Интернет-магазин обуви.';
?>

<section class="oc-content">
  <div class="container-fluid oc-margin">
    <div class="row row-offcanvas row-offcanvas-right">
      <div class="col-xs-12 <?php if (Yii::$app->user->isGuest || strpos(Url::current(), 'admin') === false) echo 'col-sm-8' ?>">

	<?php if (Yii::$app->user->isGuest || strpos(Url::current(), 'admin') === false) { ?>
  	<div class="row">
  	  <div class="pull-right visible-xs">
  	    <div class="oc-hint">
  	      <div>Подбор обуви по параметрам</div>
  	    </div>
  	    <button type="button" class="btn btn-success oc-details" data-toggle="offcanvas">
  	      <i class="glyphicon glyphicon-cog"></i>
  	    </button>
  	  </div>
  	</div>
	<?php } ?>

	<div class="row">
	  <div class="col-xs-12">
	    <div class="oc-ware-div">
	      <h3>Форма обратной связи</h3>

	      <?php if (Yii::$app->session->hasFlash('contactFormSubmitted')): ?>

  	      <div class="alert alert-success">
  		<strong>Спасибо за ваше сообщение.</strong><br />
		Мы свяжемся с вами в ближайшее время.
  	      </div>

	      <?php else: ?>


		<?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

		<?=
			$form->field($feedbackModel, 'name', ['inputOptions' => ['placeholder' => 'Представьтесь, пожалуйста']])
			->label('Отправитель<span class="oc-required">*</span>')
			->textInput(['autofocus' => true])
		?>

		<?=
			$form->field($feedbackModel, 'email', ['inputOptions' => ['placeholder' => 'Укажите ваш email']])
			->label('Email<span class="oc-required">*</span>')
		?>

		<?=
			$form->field($feedbackModel, 'body', ['inputOptions' => ['placeholder' => 'Будьте лаконичны']])
			->label('Сообщение<span class="oc-required">*</span>')
			->textarea(['rows' => 6])
		?>

		<?=
			$form->field($feedbackModel, 'verifyCode')->label('Проверочный код<span class="oc-required">*</span>')
			->widget(Captcha::className(), [
			    'template' => '<div class="row"><div class="col-md-2">{image}</div><div class="col-md-4">{input}</div></div>',
			])
		?>

  	      <div class="form-group">
		  <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary btn-lg']) ?>
  	      </div>

		<?php ActiveForm::end(); ?>


	      <?php endif; ?>
	    </div>
	  </div>
	</div>

      </div>
      <?php if (Yii::$app->user->isGuest || strpos(Url::current(), 'admin') === false) { ?>
	<?=
	$this->render('_filterForm', [
	    'model' => $model,
	    'prices' => $prices,
	])
	?>
      <?php } ?>
    </div>
  </div>
</section>
