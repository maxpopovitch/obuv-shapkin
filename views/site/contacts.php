<?php
/* @var $this yii\web\View */
use yii\helpers\Url;

$this->title = 'Omega Shoes | Контакты | Интернет-магазин обуви. Доставка по Украине.';
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

	      <p class="default-p">Телефоны: <a href="tel:+74955875007"><strong>+7 495 587 50 07</strong></a>, <a href="tel:+79104459817"><strong>+7 910 445 98 17</strong></a></p>
	      <p class="default-p">E-mail: <a href="mailto:omega_s@mail.ru"><strong>omega_s@mail.ru</strong></a></p>
	      <p class="default-p">Адрес: 141851, Московская область, Мытищинский район, деревня Шолохово, Дмитровское шоссе, дом 2Б, строение 1</p>

	      <div id="oc-map-canvas">
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d4677.1924589685705!2d37.52949436454671!3d56.05614681010321!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46b5232302675c6b%3A0x2e811acc85a61394!2z0JTQvNC40YLRgNC-0LLRgdC60L7QtSDRiC4sIDLQkSDRgdGC0YDQvtC10L3QuNC1IDEsIFNob2xva2hvdm8sIE1vc2NvdyBPYmxhc3QsIFJ1c3NpYSwgMTQxMDUy!5e0!3m2!1sen!2sua!4v1612006323037!5m2!1sen!2sua"></iframe>
	      </div>

	      <p class="default-p"><strong>Уважаемые посетители!</strong></p>
	      <p class="default-p">Рады представить вашему вниманию уникальную обувь. В нашем маленьком, но уютном интернет-магазине собрана только качественная и удобная обувь лучших мировых производителей. Обувь из Германии, Франции, Финляндии, Израиля и других стран тщательно отобрана и представлена вашему искушенному вниманию.</p>
	      <p class="default-p">Подход к отбору товара жесткий. Мы носим обувь, которую продаем, поэтому в нашем онлайн-каталоге — <q>сливки</q> мировой обувной промышленности. Причем, это не так дорого, как вы можете подумать.</p>
	      <p class="default-p">Купить обувь с доставкой &mdash; совершенно не проблема: нужно лишь выбрать обувь на нашем сайте. Если вы сомневаетесь в выборе обуви, то просто позвоните нашим менеджерам или пришлите e-mail.</p>
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
