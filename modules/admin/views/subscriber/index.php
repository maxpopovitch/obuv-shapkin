<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\SubscriberSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Подписчики';
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
		<?= Html::a('<span class="glyphicon glyphicon-plus"></span> Добавить подписчика', ['create'], ['class' => 'btn btn-success']) ?>
	      </p>
	      <?=
	      GridView::widget([
		  'dataProvider' => $dataProvider,
		  'filterModel' => $searchModel,
		  'tableOptions' => [
		      'class' => 'table table-striped table-condensed table-hover'
		  ],
		  'columns' => [
		      [
			  'class' => 'yii\grid\CheckboxColumn',
			  'multiple' => true
		      ],
		      'id',
		      'email:email',
		      ['class' => 'yii\grid\ActionColumn'],
		  ],
	      ]);
	      ?>
	    </div>
	  </div>
	</div>

      </div>
    </div>
  </div>
</section>