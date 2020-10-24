<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\ShoesType */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Shoes Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<section class="oc-content">
  <div class="container-fluid oc-margin">
    <div class="row row-offcanvas row-offcanvas-right">
      <div class="col-xs-12">

	<div class="row">
	  <div class="col-xs-12">
	    <div class="oc-ware-div">
	      <h1><?= Html::encode($this->title) ?></h1>

	      <p>
		<?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
		<?=
		Html::a('Delete', ['delete', 'id' => $model->id], [
		    'class' => 'btn btn-danger',
		    'data' => [
			'confirm' => 'Are you sure you want to delete this item?',
			'method' => 'post',
		    ],
		])
		?>
	      </p>

	      <?=
	      DetailView::widget([
		  'model' => $model,
		  'attributes' => [
		      'id',
		      'name',
		      'position',
		  ],
	      ])
	      ?>
	    </div>
	  </div>
	</div>

      </div>
    </div>
  </div>
</section>