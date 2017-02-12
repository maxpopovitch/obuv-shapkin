<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\SoleMaterial */

$this->title = 'Добавить материал подошвы';
$this->params['breadcrumbs'][] = ['label' => 'Sole Materials', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sole-material-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
