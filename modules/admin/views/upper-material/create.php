<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\UpperMaterial */

$this->title = 'Добавить материал верха';
$this->params['breadcrumbs'][] = ['label' => 'Upper Materials', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="upper-material-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
