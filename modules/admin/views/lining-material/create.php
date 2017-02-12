<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\LiningMaterial */

$this->title = 'Добавить материал подкладки';
$this->params['breadcrumbs'][] = ['label' => 'Lining Materials', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lining-material-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
