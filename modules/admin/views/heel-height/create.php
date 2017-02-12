<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\HeelHeight */

$this->title = 'Добавить высоту каблука';
$this->params['breadcrumbs'][] = ['label' => 'Heel Heights', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="heel-height-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
