<?php
/* @var $this yii\web\View */

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use app\models\Ware;
use app\models\HeelHeight;
use app\models\Color;
use app\models\Wideness;
use app\models\Size;

$this->title = 'obuv.co | ';
if (Yii::$app->language === 'ru' || Yii::$app->language === 'ua') {
    $this->title = ($ware->sex === 1) ? $this->title . 'Мужские' . ' ' : $this->title . 'Женские' . ' ';
    if ($ware->saison === 1) {
        $this->title = $this->title . 'демисезонные' . ' ';
    } else if ($ware->saison === 2) {
        $this->title = $this->title . 'летние' . ' ';
    } else if ($ware->saison === 3) {
        $this->title = $this->title . 'зимние' . ' ';
    }
    $this->title = $this->title . $ware->_type->name . ' ';
    $this->title = $this->title . $ware->_brand->name . ' ';
    $this->title = $this->title . $ware->code;
}
$this->title = $this->title . ' | Интернет-магазин обуви. Доставка по Украине.';
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-6 col-lg-7">
            <div class="oc-ware-product">
                <a href="<?php echo Url::to(($ware->fileExists() ? $ware->getFileUrl('origin') : '')) ?>" target="_blank" title="<?php
                if (Yii::$app->language === 'ru' || Yii::$app->language === 'ua') {
                    echo ($ware->sex === 1) ? 'Мужские' . ' ' : 'Женские' . ' ';
                    if ($ware->saison === 1) {
                        echo 'демисезонные' . ' ';
                    } else if ($ware->saison === 2) {
                        echo 'летние' . ' ';
                    } else if ($ware->saison === 3) {
                        echo 'зимние' . ' ';
                    }
                    echo $ware->_type->name . ' ';
                    echo $ware->_brand->name . ' ';
                    echo $ware->code;
                }
                ?>">
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
                        <img src="<?php echo ($ware->fileExists() ? $ware->getFileUrl('main') : '') ?>" alt="<?php
                        if (Yii::$app->language === 'ru' || Yii::$app->language === 'ua') {
                            echo ($ware->sex === 1) ? 'Мужские' . ' ' : 'Женские' . ' ';
                            if ($ware->saison === 1) {
                                echo 'демисезонные' . ' ';
                            } else if ($ware->saison === 2) {
                                echo 'летние' . ' ';
                            } else if ($ware->saison === 3) {
                                echo 'зимние' . ' ';
                            }
                            echo $ware->_type->name . ' ';
                            echo $ware->_brand->name . ' ';
                            echo $ware->code;
                        }
                        ?>"/>
                    </div>
                </a>
                <!--                <ul>
                                    <li>
                                        <img class="img-responsive" src="imgs/photos/rieker/small/rieker-40085-14-1758.jpg" alt="Женские летние туфли Rieker 40085-14"/>
                                    </li>
                                    <li>
                                        <img class="img-responsive" src="imgs/photos/rieker/small/rieker-z7363-00-1044.jpg" alt="Женские летние туфли Rieker 40085-14"/>
                                    </li>
                                    <li>
                                        <img class="img-responsive" src="imgs/photos/rieker/small/rieker-40085-14-1758.jpg" alt="Женские летние туфли Rieker 40085-14"/>
                                    </li>
                                    <li>
                                        <img class="img-responsive" src="imgs/photos/rieker/small/rieker-z7363-00-1044.jpg" alt="Женские летние туфли Rieker 40085-14"/>
                                    </li>
                                    <li>
                                        <img class="img-responsive" src="imgs/photos/rieker/small/rieker-40085-14-1758.jpg" alt="Женские летние туфли Rieker 40085-14"/>
                                    </li>
                                </ul>-->
            </div>
        </div>
        <div class="col-sm-6 col-lg-5 oc-description">
            <img class="img-responsive" src="<?php echo $ware->_brand->logo ?>" alt="<?php echo $ware->_brand->name ?>">
            <h4><?php
                if (Yii::$app->language === 'ru' || Yii::$app->language === 'ua') {
                    echo ($ware->sex === 1) ? 'Мужские' . ' ' : 'Женские' . ' ';
                    if ($ware->saison === 1) {
                        echo 'демисезонные' . ' ';
                    } else if ($ware->saison === 2) {
                        echo 'летние' . ' ';
                    } else if ($ware->saison === 3) {
                        echo 'зимние' . ' ';
                    }
                    echo $ware->_type->name . ' ';
                    echo $ware->_brand->name . ' ';
                    echo $ware->code;
                }
                ?></h4>
            <div class="container-fluid">
                <div class="oc-price">
                    <h3>
                        <strong>
                            <?php if ($ware->category === 2) { ?>
                                <span class="oc-old"><?php echo $ware->init_price ?></span>
                            <?php } ?>
                            <span><?php echo ($ware->category === 2) ? $ware->new_price : $ware->init_price; ?></span>
                        </strong>
                        грн.
                    </h3>
                </div>
                <?php
                $wareSizes = json_decode($ware->sizes);
                $sizesArray = [];
                if (!empty($wareSizes)) {
                    foreach ($wareSizes as $size) {
                        array_push($sizesArray, Size::findOne(['id' => $size])->name);
                    }
                    $sizes = implode('; ', $sizesArray);
                } else {
                    $sizes = 'нет в наличии';
                }
                ?>
                <div class="row">
                    <?php if (!empty($wareSizes)) { ?>
                        <?php $form = ActiveForm::begin([
                            'id' => 'oc-buy-form'
                            ]); ?>
                        <span><strong>Размер:</strong></span>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-xs-7">
                                    <select>
                                        <?php
                                        foreach ($wareSizes as $size) {
                                            echo '<option value="' . Size::findOne(['id' => $size])->name . '">' . Size::findOne(['id' => $size])->name . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-xs-5 text-right">
                                    <?= Html::submitButton('Купить', ['class' => 'btn']) ?>
                                </div>
                            </div>
                        </div>
                        <span><strong>Бесплатная доставка по Украине!</strong></span>
                        <?php ActiveForm::end(); ?>
                    <?php } else { ?>
                        <div class="col-xs-12">
                            <div class="alert alert-info" role="alert"> <strong>Нет в наличии</strong></div>
                        </div>
                    <?php } ?>
                </div>
                <div class="row">
                    <p>Артикул: <strong><?php echo $ware->code ?></strong></p>
                    <p>Тип: <strong><?php echo $ware->_type->name ?></strong></strong></p>
                    <p>Сезон: <strong><?php echo Ware::getSaison()[$ware->saison] ?></strong></strong></p>
                    <p>Материал верха: <strong><?php echo $ware->_upper->name ?></strong></p>
                    <p>Материал подкладки: <strong><?php echo $ware->_lining->name ?></strong></p>
                    <p>Материал подошвы: <strong><?php echo $ware->_sole->name ?></strong></p>
                    <p>Высота каблука или танкетки: <strong><?php echo HeelHeight::findOne(['id' => $ware->heel_height])->name ?></strong></p>
                    <p>Цвет: <strong><?php echo Color::findOne(['id' => $ware->color])->name ?></strong></p>
                    <p>Полнота: <strong><?php echo Wideness::findOne(['id' => $ware->wideness])->name ?></strong></p>
                    <p>Размеры в наличии: <strong><?php echo $sizes ?></strong></p>
                    <a href="<?= Url::to(['site/sizes']) ?>">Таблица размеров</a>
                </div>
            </div>
        </div>
    </div>
</div>