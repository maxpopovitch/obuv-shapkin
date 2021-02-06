<?php
/* @var $this yii\web\View */

use yii\helpers\Url;

$this->title = 'Omega Shoes | Советы покупателю | Интернет-магазин обуви. Доставка по Украине.';
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
	      <h3>Советы покупателю обуви</h3>

	      <!--Accordion start-->
	      <div class="panel-group" id="tips-accordion" data-style="accordion" role="tablist" aria-multiselectable="true">
		<div class="panel panel-success">
		  <div class="panel-heading" role="tab" id="tip-01-heading">
		    <h4 class="panel-title">
		      <a data-toggle="collapse" data-parent="#tips-accordion" href="#tip-01" aria-expanded="true" aria-controls="tip-01">
			Уход за обувью из гладкой кожи
		      </a>
		    </h4>
		  </div>
		  <div id="tip-01" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="tip-01-heading">
		    <div class="panel-body">
		      <p class="default-p">Кожаная обувь так же нуждается в уходе, как и человеческая кожа. Для того, чтобы обувь из гладкой кожи как можно дольше сохраняла свою привлекательность и функциональность, регулярно применяйте специальные средства по уходу за такой обувью.</p>
		      <p class="default-p">Очистите обувь с помощью мягкой влажной губки. На чистую и сухую поверхность обуви нанесите небольшое количество специального обувного крема для изделий из гладкой кожи. Также можно использовать спрей. После того, как средство впитается, отполируйте обувь мягкой сухой салфеткой. В дождливую погоду за несколько часов перед выходом на улицу желательно покрыть обувь универсальным водоотталкивающим средством: это позволит обуви оставаться сухой и сохранять ваши ноги в комфорте.</p>

		    </div>
		  </div>
		</div>
		<div class="panel panel-success">
		  <div class="panel-heading" role="tab" id="tip-02-heading">
		    <h4 class="panel-title">
		      <a class="collapsed" data-toggle="collapse" data-parent="#tips-accordion" href="#tip-02" aria-expanded="false" aria-controls="tip-02">
			Уход за обувью из замши и нубука
		      </a>
		    </h4>
		  </div>
		  <div id="tip-02" class="panel-collapse collapse" role="tabpanel" aria-labelledby="tip-02-heading">
		    <div class="panel-body">
		      <p class="default-p">Обувь из замши или нубука требует особенного отношения, но несколько простых советов позволят оставаться ей в строю как можно дольше.</p>
		      <p class="default-p">Для обуви из замши и нубука существуют специальные средства по ухода за такими изделиями, самым распространенным из которых является спрей (аэрозольный баллончик).</p>
		      <p class="default-p">Обувь очистите специальной щеточкой для замши или нубука, протрите влажной губкой. На чистую и сухую поверхность нанесите средство по уходу за замшей, дайте обуви просохнуть. Для восстановления бархатистой структуры замшевой поверхности отворсуйте обувь щеткой для замши. В дождливую погоду за несколько часов перед выходом на улицу желательно покрыть обувь универсальным водоотталкивающим средством: это позволит обуви оставаться сухой и сохранять ваши ноги в комфорте.</p>
		    </div>
		  </div>
		</div>
	      </div>
	      <!--Accordion end-->
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
