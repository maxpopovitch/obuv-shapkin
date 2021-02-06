<?php
/* @var $this yii\web\View */

use yii\helpers\Url;

$this->title = 'Omega Shoes | Таблица размеров обуви | Интернет-магазин обуви. Доставка по Украине.';
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
	      <h3>Таблица размеров обуви</h3>

	      <p class="default-p">В выборе нужного размера вам поможет вот такая таблица (нажмите, чтобы <a href="imgs/sizetable.png" target="_blank">увеличить в новом окне</a>):</p>
	      <a href="imgs/sizetable.png" target="_blank"><img src="imgs/sizetable.png" class="img-responsive" alt="Таблица размеров обуви"/></a>
	      <p class="default-p">Мы работаем с обувью европейского производства, которая маркируется либо по европейской системе (в таблице она обозначена как EUR), либо по английской (в таблице — UK).</p>
	      <p class="default-p"><strong class="text-danger">Внимание!</strong> Таблица размеров является ориентировочной. Размеры, колодки и полноты отличаются у различных брендов. Если вы не уверены в правильности выбора размера или других параметров, то проконсультируйтесь с нашими менеджерами.</p>
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
