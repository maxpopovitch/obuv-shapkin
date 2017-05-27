<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Messaging */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Messagings', 'url' => ['index']];
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
		      'emails:ntext',
		      'created',
		      'sent',
		      'status',
		      'subject',
		      'content:ntext',
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