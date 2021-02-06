<?php
/* @var $this yii\web\View */

use yii\helpers\Url;

$this->title = 'Omega Shoes | Как сделать заказ | Интернет-магазин обуви. Доставка по Украине.';
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
	      <h3>Как сделать заказ</h3>

	      <p class="default-p">Для покупки обуви в нашем интернет-магазине выполните несколько простых шагов:</p>

	      <ol>
		<li>Выберите понравившуюся модель. Определите нужный размер, пользуясь таблицей размеров на нашем сайте или воспользуйтесь консультацией менеджера по телефону или e-mail.</li>
		<li>Выберите желаемый размер и нажмите кнопку <q>Купить</q>.</li>
		<li>Заполните форму для оформления заказа и нажмите <q>Отправить заказ</q>.</li>
		<li>С вами свяжутся наши менеджеры и уточнят условия оплаты и доставки.</li>
	      </ol>

	      <p class="default-p">Приятных покупок!</p>
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
