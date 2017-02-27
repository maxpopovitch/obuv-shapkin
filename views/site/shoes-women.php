<?php
/* @var $this yii\web\View */

use yii\helpers\Url;
use app\models\Ware;
use app\widgets\WaresWidget;

$this->title = 'obuv.co | Женская обувь | Интернет-магазин обуви. Доставка по Украине.';
?>

<?= WaresWidget::widget(['filter' => ['sex' => Ware::SEX_FEMALE]]) ?>