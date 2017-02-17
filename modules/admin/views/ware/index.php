<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\WareSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Товары';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ware-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('<span class="glyphicon glyphicon-plus"></span> Добавить товар', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'code',
            'brand',
            'sex',
            'saison',
            // 'type',
            // 'wideness',
            // 'upper',
            // 'lining',
            // 'sole',
            // 'heel_height',
            // 'color',
            // 'category',
            // 'init_price',
            // 'new_price',
            // 'waterproofness',
            // 'status',
            // 'position',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
