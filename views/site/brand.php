<?php
/* @var $this yii\web\View */

use app\models\Brand;

$this->title = 'obuv.co | Торговые марки | ' . $brand->name . ' | Интернет-магазин обуви. Доставка по Украине.';
?>

<div class="clearfix">
    <img class="oc-brand-view-logo" src="<?php echo $brand->logo ?>" alt="<?php echo $brand->name . ' (' . $brand->country_name . ')' ?>" />
    <h3 class="oc-brand-view-title"><?php echo $brand->name . ' (' . $brand->country_name . ')' ?></h3>
</div>
<div class="oc-brand-view-description">
    <?php echo $brand->description ?>
</div>