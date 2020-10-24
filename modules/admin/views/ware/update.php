<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Ware */

$this->title = 'Изменить товар: ' . $model->_brand->name . ' ' . $model->code;
$this->params['breadcrumbs'][] = ['label' => 'Wares', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>

<section class="oc-content" id="admin-ware-form">
  <div class="container-fluid oc-margin">
    <div class="row row-offcanvas row-offcanvas-right">
      <div class="col-xs-12">

	<div class="row">
	  <div class="col-xs-12">
	    <div class="oc-ware-div">
	      <h1><?= Html::encode($this->title) ?></h1>

	      <?=
	      $this->render('_form', [
		  'model' => $model,
	      ])
	      ?>
	    </div>
	  </div>
	</div>

      </div>
    </div>
  </div>
</section>