<?php
/* @var $this yii\web\View */
use yii\helpers\Url;

$this->title = 'obuv.co | Контакты | Интернет-магазин обуви. Доставка по Украине.';
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
	      <h3>Контактная информация</h3>

	      <p class="default-p">Телефоны: <a href="tel:+380623456884"><strong>+380 62 3456884</strong></a>, <a href="tel:+380991051865"><strong>+380 99 1051865</strong></a></p>
	      <p class="default-p">E-mail: <a href="mailto:info@obuv.co"><strong>info@obuv.co</strong></a></p>
	      <p class="default-p">Адрес нашего партнера: Украина, г. Донецк, ул. Университетская, 63, салон обуви <q>Бумеранг</q></p>

	      <div id="oc-map-canvas">
		<iframe src="https://mapsengine.google.com/map/embed?mid=zCT5Ys2PUK1Y.kRSlGlrE3t7c&z=17"></iframe>
	      </div>

	      <p class="default-p"><strong>Уважаемые посетители!</strong></p>
	      <p class="default-p">Рады представить вашему вниманию уникальную обувь. В нашем маленьком, но уютном интернет-магазине собрана только качественная и удобная обувь лучших мировых производителей. Обувь из Германии, Франции, Финляндии, Израиля и других стран тщательно отобрана и представлена вашему искушенному вниманию.</p>
	      <p class="default-p">Подход к отбору товара жесткий. Мы носим обувь, которую продаем, поэтому в нашем онлайн-каталоге — <q>сливки</q> мировой обувной промышленности. Причем, это не так дорого, как вы можете подумать.</p>
	      <p class="default-p">Купить обувь с доставкой &mdash; совершенно не проблема: нужно лишь выбрать обувь на сайте <strong>obuv.co</strong>. Если вы сомневаетесь в выборе обуви, то просто позвоните нашим менеджерам или пришлите e-mail.</p>
	      <p class="default-p">Успешных покупок!</p>
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