<?php
/* @var $this yii\web\View */

use yii\helpers\Url;

$this->title = 'Omega Shoes | Оплата и доставка | Интернет-магазин обуви.';
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
	      <h4>Оплата</h4>
	      <p class="default-p">Оплата осуществляется наличными средствами или банковской картой курьеру. Также можно оплатить онлайн на сайте магазина.</p>
	      <h4>Доставка</h4>
	      <p class="default-p">Доставка осуществляется в течении двух рабочих дней с момента оформления заказа. Время и место доставки будет согласовано курьером в день доставки. По Москве и области доставка осуществляется бесплатно. В другие регионы возможна доставка Почтой России (наложенным платежом).</p>
	      <h4>Самовывоз</h4>
	      <p class="default-p">Всех желающих ознакомиться с нашей обувью воочию ждем в салоне обуви <q>Promenade</q>. Адрес и схему расположения магазина смотрите <a href="<?= Url::to(['site/contacts']) ?>">здесь</a>.</p>
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
