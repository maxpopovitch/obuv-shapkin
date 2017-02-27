<?php
/* @var $this yii\web\View */

use yii\helpers\Url;
use app\models\Ware;
use app\widgets\WaresWidget;

$this->title = 'obuv.co | Новые поступления | Интернет-магазин обуви. Доставка по Украине.';
?>

<?= WaresWidget::widget(['filter' => ['status' => Ware::STATUS_ACTIVE]]) ?>
