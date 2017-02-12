<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Wideness */

$this->title = 'Добавить полноту';
$this->params['breadcrumbs'][] = ['label' => 'Widenesses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="wideness-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
