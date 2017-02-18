<?php
/* @var $this yii\web\View */

use app\models\Ware;

$wares = Ware::find()->where(['status' => 1, 'sex' => 1])->orderBy(['position' => SORT_ASC])->all();

$this->title = 'obuv.co | Мужская обувь | Интернет-магазин обуви. Доставка по Украине.';
?>

<?php
if (!empty($wares)) {
    foreach ($wares as $ware) {
        ?>
        <div class="oc-ware">
            <a href="shoes.htm" title="<?php echo $ware->_type->name . ' ' . $ware->_brand->name . ' ' . $ware->code?>">
                <?php if ($ware->category === 1) { ?>
                    <div class="oc-tag oc-new">
                        <span class="text-center">новинка</span>
                    </div>
                <?php } ?>
                <?php if ($ware->category === 2) { ?>
                    <div class="oc-tag oc-sale">
                        <span class="text-center">распродажа</span>
                    </div>
                <?php } ?>
                <?php if ($ware->category === 3) { ?>
                    <div class="oc-tag oc-hit">
                        <span class="text-center">хит продаж</span>
                    </div>
                <?php } ?>
                <div class="oc-ware-photo">
                    <img src="" alt="<?php echo $ware->_type->name . ' ' . $ware->_brand->name . ' ' . $ware->code . ' ' . $ware->getSaison()[$ware->saison] . ' ' . $ware->getSex()[$ware->sex] ?>"/>
                </div>
                <div class="oc-separator"></div>
                <div class="oc-brand-logo"><img src="<?php echo $ware->_brand->logo ?>" alt="<?php echo $ware->_brand->name ?>"/></div>
                <div class="oc-price">
                    <span><?php echo ($ware->category === 2) ? $ware->new_price : $ware->init_price; ?></span>
                    <span>грн.</span>
                </div>
            </a>
        </div>
        <?php
    }
} else {
    ?>
    <h3>К сожалению, вся мужская обувь продана.</h3>
<?php } ?>
