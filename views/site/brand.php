<?php
/* @var $this yii\web\View */

use app\models\Brand;
use yii\helpers\Url;
use app\widgets\WaresWidget;

$this->title = 'Omega Shoes | Торговые марки | ' . $brand->name . ' | Интернет-магазин обуви.';
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
	      <div class="clearfix">
		<img class="oc-brand-view-logo" src="<?php echo $brand->logo ?>" alt="<?php echo $brand->name . ' (' . $brand->country_name . ')' ?>" />
		<h3 class="oc-brand-view-title"><?php echo $brand->name . ' (' . $brand->country_name . ')' ?></h3>
	      </div>
	      <?php if ($brand->description !== '<p></p>') { ?>
  	      <div class="collapse oc-brand-view-description-wrapper" id="description-collapse" aria-expanded="false">
  		<div class="oc-brand-view-description">
		    <?php echo $brand->description ?>
  		</div>
  		<div class="oc-description-gradient"></div>
  	      </div>
  	      <a role="button" data-toggle="collapse" href="#description-collapse" aria-expanded="false" aria-controls="description-collapse">
  		Описание
		<?php } ?>
	      </a>
	      <div class="clearfix">
		<?= WaresWidget::widget(['filter' => ['brand' => $brand->id]]) ?>
	      </div>
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
