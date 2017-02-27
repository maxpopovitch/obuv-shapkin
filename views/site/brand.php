<?php
/* @var $this yii\web\View */

use app\models\Brand;
use app\widgets\WaresWidget;

$this->title = 'obuv.co | Торговые марки | ' . $brand->name . ' | Интернет-магазин обуви. Доставка по Украине.';
?>

<div class="clearfix">
    <img class="oc-brand-view-logo" src="<?php echo $brand->logo ?>" alt="<?php echo $brand->name . ' (' . $brand->country_name . ')' ?>" />
    <h3 class="oc-brand-view-title"><?php echo $brand->name . ' (' . $brand->country_name . ')' ?></h3>
</div>
<?php if ($brand->description !== '<p></p>') { ?>
    <div class="collapse oc-brand-view-description-wrapper" id="description-collapse" aria-expanded="false">
        <div class="oc-brand-view-description">
            <?php echo $brand->description ?>
        </div>
        <div class="oc-description-gradient"></div>
    </div>
    <a role="button" data-toggle="collapse" href="#description-collapse" aria-expanded="false" aria-controls="description-collapse">
        Описание
    <?php } ?>
</a>
<div class="clearfix">
<?= WaresWidget::widget(['filter' => ['brand' => $brand->id]]) ?>
</div>