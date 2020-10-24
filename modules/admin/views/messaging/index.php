<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Messaging;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\MessagingSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Рассылки';
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
	      <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

	      <p>
		<?= Html::a('<span class="glyphicon glyphicon-plus"></span> Добавить рассылку', ['create'], ['class' => 'btn btn-success']) ?>
	      </p>
	      <?=
	      GridView::widget([
		  'dataProvider' => $dataProvider,
		  'filterModel' => $searchModel,
		  'columns' => [
		      ['class' => 'yii\grid\SerialColumn'],
		      'id',
		      'subject',
		      'created' => [
			  'attribute' => 'created',
			  'format' => ['date', 'php:d.m.Y'],
			  'filter' => false,
		      ],
		      'sent' => [
			  'attribute' => 'sent',
			  'format' => 'html',
			  'value' => function ($model) {
			    if ($model->status === 1) {
			      return '&mdash;';
			    } else {
			      return date('d.m.Y', $model->sent);
			    }
			  },
			  'filter' => false,
		      ],
		      'status' => [
			  'attribute' => 'status',
			  'format' => 'html',
			  'value' => function ($model) {
			    return $model->getStatuses()[$model->status];
			  },
			  'filter' => Messaging::getStatuses(),
		      ],
		      // 'subject',
		      // 'content:ntext',
		      [
			  'class' => 'yii\grid\ActionColumn',
			  'template' => '{send} {view} {delete}',
			  'buttons' => [
			      'send' => function ($url) {
				return Html::a(
						'<span class="glyphicon glyphicon-send"></span>', $url, [
					    'title' => 'Send',
					    'data-pjax' => '0',
						]
				);
			      },
				  ],
			      ],
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
