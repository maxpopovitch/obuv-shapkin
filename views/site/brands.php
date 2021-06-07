<?php
/* @var $this yii\web\View */

use app\models\Brand;
use yii\helpers\Url;

$brands = Brand::find()->orderBy(['position' => SORT_ASC])->all();

$this->title = 'Omega Shoes | Торговые марки | Интернет-магазин обуви.';
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
	      <?php
	      if (!empty($brands)) {
		foreach ($brands as $brand) {
		  ?>
    	      <div class="oc-ware">
    		<a class="oc-brand" href="<?= Url::to(['site/brand', 'id' => $brand->id]) ?>" title="<?php echo $brand->name . ' (' . $brand->country_name . ')' ?>">
    		  <div class="oc-ware-photo">
    		    <img src="<?php echo $brand->logo ?>"  alt="<?php echo $brand->name . ' (' . $brand->country_name . ')' ?>"/>
    		  </div>
    		</a>
    	      </div>
		  <?php
		}
	      }
	      ?>
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
