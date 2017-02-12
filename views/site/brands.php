<?php
/* @var $this yii\web\View */

use app\models\Brand;
use yii\helpers\Url;

$brands = Brand::find()->orderBy(['position' => SORT_ASC])->all();

$this->title = 'obuv.co | Торговые марки | Интернет-магазин обуви. Доставка по Украине.';
?>

<?php
if (!empty($brands)) {
    foreach ($brands as $brand) {
        ?>
        <div class="oc-ware">
            <a class="oc-brand" href="<?= Url::to(['site/brand', 'id' => $brand->id]) ?>" title="<?php echo $brand->name . ' (' . $brand->country_name . ')' ?>">
                <div class="oc-ware-photo">
                    <img src="<?php echo $brand->logo ?>"  alt="<?php echo $brand->name . ' (' . $brand->country_name . ')' ?>"/>
                </div>
            </a>
        </div>
        <?php
    }
}
?>