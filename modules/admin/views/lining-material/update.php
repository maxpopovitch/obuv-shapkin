<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\LiningMaterial */

$this->title = 'Изменить материал подкладки: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Lining Materials', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="lining-material-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
