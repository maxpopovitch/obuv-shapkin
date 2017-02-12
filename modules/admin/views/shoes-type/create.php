<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ShoesType */

$this->title = 'Добавить тип обуви';
$this->params['breadcrumbs'][] = ['label' => 'Shoes Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="shoes-type-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
