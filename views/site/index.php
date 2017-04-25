<?php
/* @var $this yii\web\View */

use yii\helpers\Url;
use app\models\Ware;
use app\widgets\WaresWidget;

$this->title = 'obuv.co | Новые поступления | Интернет-магазин обуви. Доставка по Украине.';
?>

<section class="oc-content">
  <div class="container-fluid oc-margin">
    <div class="row row-offcanvas row-offcanvas-right">
      <div class="col-xs-12 col-sm-8">
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
	<div class="row">
	  <div class="col-xs-12">
	    <div class="oc-ware-div">
	      <?php if ($filteredWares === '') { ?>
	      <div class="alert alert-info" role="alert">
		<strong>Ой!</strong><br />
		Ничего не найдено. Попробуйте сократить параметры поиска.
	      </div>
	      <?php } else {
		echo $filteredWares;
	      }
	      ?>
	    </div>
	  </div>
	</div>
      </div>
      <?=
      $this->render('_filterForm', [
	  'model' => $model,
	  'prices' => $prices,
	  'submittedForm' => $submittedForm,
      ])
      ?>
    </div>
  </div>
</section>