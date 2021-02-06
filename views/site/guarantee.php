<?php
/* @var $this yii\web\View */

use yii\helpers\Url;

$this->title = 'Omega Shoes | Гарантийные обязательства | Интернет-магазин обуви. Доставка по Украине.';
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
	      <h3>Гарантийные обязательства</h3>
	      <p class="default-p">В отношении нашей продукции действуют в полном объеме гарантийные обязательства, определенные Законом Украины <q>О защите прав потребителей</q>, а также действуют специальные нормы, определенные Постановлением Кабинета министров Украины №172 от 19.03.1994.</p>
	      <p class="default-p">Исчисление гарантийных сроков начинается с начала соответствующего сезона. В отношении обуви:</p>
	      <ul style="padding-left: 35px;">
		<li>зимнего ассортимента — с 15 ноября по 15 марта,</li>
		<li>весенне-осеннего ассортимента — с 15 марта по 15 мая,</li>
		<li>летнего ассортимента — с 15 мая по 15 сентября.</li>
	      </ul>
	      <p class="default-p">Дополнительным (расширенным) гарантийным обязательством нашего магазина на протяжении указанного срока является услуга ремонта обуви: выбранную вами пару с незначительным производственным дефектом мы можем просто отремонтировать, при этом оплата накладных расходов, пересылка и комиссия банка оплачивается нами. По прошествии 14 календарных дней с момента покупки, при наличии производственного дефекта, мы все равно готовы его устранить. Если же дефект существенный и устранить его нельзя, то мы проводим замену товара на аналогичный или проводим возмещение стоимости этого товара, при этом комиссия банка и расходы по обратной доставке также оплачиваются нами.</p>
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
