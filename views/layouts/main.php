<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\helpers\Url;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body>
        <?php $this->beginBody() ?>

        <header id="top">
            <nav class="navbar navbar-default oc-navbar" role="navigation">
                <div class="container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed oc-collapsed-button" data-toggle="collapse" data-target="#oc-main-nav">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand oc-a" href="/">
                            <img class="oc-logo" alt="Обувко :)" title="Обувко :)" src="imgs/obuv_co.png"/>
                        </a>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="oc-main-nav">
                        <ul class="nav navbar-nav">
                            <li><a href="womenshoes.htm">Женская<br/> обувь</a></li>
                            <li><a href="menshoes.htm">Мужская<br/> обувь</a></li>
                            <li><a href="<?= Url::to(['site/brands']) ?>">Торговые<br/> марки</a></li>
                            <li><a href="<?= Url::to(['site/tips']) ?>">Советы<br/> покупателю</a></li>
                            <li><a href="payment-and-delivery.htm">Оплата<br/> и доставка</a></li>
                            <li><a href="feedback.htm">Обратная<br/> связь</a></li>
                            <li>
                                <div class="oc-lang">
                                    <span>Язык:&nbsp;</span><br/>
                                    <select disabled onchange="location = this.options[this.selectedIndex].value;">
                                        <option value="http://www.obuv.co/">Русский</option>
                                        <!--<option value="http://www.obuv.co/ua">Українська</option>-->
                                        <!--<option value="http://www.obuv.co/en">English</option>-->
                                        <!--<option value="http://www.obuv.co/de">Deutsch</option>-->
                                    </select>​
                                </div>
                            </li>
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
            </nav>
            <div class="oc-contact container-fluid">
                <div class="oc-phone">
                    <div class="oc-div-i">
                        <i class="glyphicon glyphicon-earphone"></i>
                    </div>
                    <div class="oc-info">
                        <a href="tel:+380623456884">+380 62 3456884</a>
                        <br/>
                        <a href="tel:+380991051865">+380 99 1051865</a>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="oc-location">
                    <div class="oc-div-i">
                        <i class="glyphicon glyphicon-map-marker"></i>
                    </div>
                    <div class="oc-info">
                        <a href="<?= Url::to(['site/contacts']) ?>">г. Донецк, ул. Университетская, 63, салон обуви <q>Бумеранг</q> (наш партнер)</a>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="oc-cart">
                    <div class="oc-div-i">
                        <i class="glyphicon glyphicon-shopping-cart"></i>
                    </div>
                    <div class="oc-info">
                        <a href="<?= Url::to(['site/cart']) ?>">100 товаров на сумму 99999 грн.</a>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
            <section class="oc-breadcrumbs">
                <h1>
                    <?php
                    if (isset($this->params['header'])) {
                        echo $this->params['header'];
                    } else {
                        echo '<a href="/">obuv.co</a>';
                    }
                    ?>
                </h1>
            </section>
        </header>

        <section class="oc-content">
            <div class="container-fluid oc-margin">
                <div class="row row-offcanvas row-offcanvas-right">
                    <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                        <div class="row">
                            <div class="pull-right visible-xs">
                                <div class="oc-hint">
                                    <div>Подбор обуви по параметрам</div>
                                    <div></div>
                                </div>
                                <button type="button" class="btn btn-success oc-details" data-toggle="offcanvas">
                                    <i class="glyphicon glyphicon-cog"></i>
                                </button>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-12">
                                <div class="oc-ware-div">
                                    <?= $content ?>
                                </div>
                            </div>
                        </div>

                    </div>
                    <form name="oc-details-form" action="index.php" method="post">
                        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 sidebar-offcanvas" id="sidebar">
                            <div class="row">
                                <h2 class="oc-details">Подбор обуви по параметрам:</h2>
                            </div>
                            <div class="row">
                                <div class="oc-details-grid">
                                    <div class="oc-cat-div">
                                        <div class="oc-title">Цена</div>

                                        <input type="range" name="oc-max-price" id="oc-max-price" min="390" max="5000" step="10" value="5000"/>
                                        <span>от&nbsp;</span><b><span>390</span></b>&nbsp;до&nbsp;<b><span id="oc-max-price-val">5000</span><span>&nbsp;грн.</span></b>
                                    </div>

                                    <div class="oc-cat-div">
                                        <div class="oc-title">Пол</div>

                                        <div>
                                            <input type="checkbox" name="oc-sex-male" id="oc-sex-male" value="oc-sex-male"/>
                                            <label for="oc-sex-male"></label>
                                            <label for="oc-sex-male" class="oc-details-label">мужской</label>
                                        </div>
                                        <div>
                                            <input type="checkbox" name="oc-sex-female" id="oc-sex-female" value="oc-sex-female"/>
                                            <label for="oc-sex-female"></label>
                                            <label for="oc-sex-female" class="oc-details-label">женский</label>
                                        </div>
                                    </div>

                                    <div class="oc-cat-div">
                                        <div class="oc-title">Цвет</div>

                                        <div class="oc-color">
                                            <input type="checkbox" name="oc-color-beige" id="oc-color-beige" value="oc-color-beige"/>
                                            <label for="oc-color-beige" style="background-color: #EBDEC2;" title="бежевый"></label>
                                        </div>
                                        <div class="oc-color">
                                            <input type="checkbox" name="oc-color-white" id="oc-color-white" value="oc-color-white"/>
                                            <label for="oc-color-white" style="background-color: #EEE;" title="белый"></label>
                                        </div>
                                        <div class="oc-color">
                                            <input type="checkbox" name="oc-color-bordeaux" id="oc-color-bordeaux" value="oc-color-bordeaux"/>
                                            <label for="oc-color-bordeaux" style="background-color: #900;" title="бордовый"></label>
                                        </div>
                                        <div class="oc-color">
                                            <input type="checkbox" name="oc-color-gold" id="oc-color-gold" value="oc-color-gold"/>
                                            <label for="oc-color-gold" style="background-color: #F1D75D;" title="золотистый"></label>
                                        </div>
                                        <div class="oc-color">
                                            <input type="checkbox" name="oc-color-brown" id="oc-color-brown" value="oc-color-brown"/>
                                            <label for="oc-color-brown" style="background-color: #630;" title="коричневый"></label>
                                        </div>
                                        <div class="oc-color">
                                            <input type="checkbox" name="oc-color-red" id="oc-color-red" value="oc-color-red"/>
                                            <label for="oc-color-red" style="background-color: #F00;" title="красный"></label>
                                        </div>
                                        <div class="oc-color">
                                            <input type="checkbox" name="oc-color-olive" id="oc-color-olive" value="oc-color-olive"/>
                                            <label for="oc-color-olive" style="background-color: #7E7504;" title="оливковый"></label>
                                        </div>
                                        <div class="oc-color">
                                            <input type="checkbox" name="oc-color-gray" id="oc-color-gray" value="oc-color-gray"/>
                                            <label for="oc-color-gray" style="background-color: #ABABAB;" title="серый"></label>
                                        </div>
                                        <div class="oc-color">
                                            <input type="checkbox" name="oc-color-blue" id="oc-color-blue" value="oc-color-blue"/>
                                            <label for="oc-color-blue" style="background-color: #039;" title="синий"></label>
                                        </div>
                                        <div class="oc-color">
                                            <input type="checkbox" name="oc-color-black" id="oc-color-black" value="oc-color-black"/>
                                            <label for="oc-color-black" style="background-color: #000;" title="черный"></label>
                                        </div>
                                    </div>

                                    <div class="oc-cat-div">
                                        <div class="oc-title">Размер (<a href="<?= Url::to(['site/sizes']) ?>">таблица</a>)</div>

                                        <div class="oc-size">
                                            <input type="checkbox" name="oc-size-4" id="oc-size-4" value="4"/>
                                            <label for="oc-size-4">4 (36)</label>
                                        </div>
                                        <div class="oc-size">
                                            <input type="checkbox" name="oc-size-4-5" id="oc-size-4-5" value="4.5"/>
                                            <label for="oc-size-4-5">4&frac12; (37)</label>
                                        </div>
                                        <div class="oc-size">
                                            <input type="checkbox" name="oc-size-5" id="oc-size-5" value="5"/>
                                            <label for="oc-size-5">5 (37&frac12;)</label>
                                        </div>
                                        <div class="oc-size">
                                            <input type="checkbox" name="oc-size-5-5" id="oc-size-5-5" value="5.5"/>
                                            <label for="oc-size-5-5">5&frac12; (38)</label>
                                        </div>
                                        <div class="oc-size">
                                            <input type="checkbox" name="oc-size-6" id="oc-size-6" value="6"/>
                                            <label for="oc-size-6">6 (39)</label>
                                        </div>
                                        <div class="oc-size">
                                            <input type="checkbox" name="oc-size-6-5" id="oc-size-6-5" value="6.5"/>
                                            <label for="oc-size-6-5">6&frac12; (40)</label>
                                        </div>
                                        <div class="oc-size">
                                            <input type="checkbox" name="oc-size-7" id="oc-size-7" value="7"/>
                                            <label for="oc-size-7">7 (40&frac12;)</label>
                                        </div>
                                        <div class="oc-size">
                                            <input type="checkbox" name="oc-size-7-5" id="oc-size-7-5" value="7.5"/>
                                            <label for="oc-size-7-5">7&frac12; (41)</label>
                                        </div>
                                        <div class="oc-size">
                                            <input type="checkbox" name="oc-size-8" id="oc-size-8" value="8"/>
                                            <label for="oc-size-8">8 (42)</label>
                                        </div>
                                        <div class="oc-size">
                                            <input type="checkbox" name="oc-size-8-5" id="oc-size-8-5" value="8.5"/>
                                            <label for="oc-size-8-5">8&frac12; (42&frac12;)</label>
                                        </div>
                                        <div class="oc-size">
                                            <input type="checkbox" name="oc-size-9" id="oc-size-9" value="9"/>
                                            <label for="oc-size-9">9 (43)</label>
                                        </div>
                                        <div class="oc-size">
                                            <input type="checkbox" name="oc-size-9-5" id="oc-size-9-5" value="9.5"/>
                                            <label for="oc-size-9-5">9&frac12; (44)</label>
                                        </div>
                                        <div class="oc-size">
                                            <input type="checkbox" name="oc-size-10" id="oc-size-10" value="10"/>
                                            <label for="oc-size-10">10 (44&frac12;)</label>
                                        </div>
                                        <div class="oc-size">
                                            <input type="checkbox" name="oc-size-10-5" id="oc-size-10-5" value="10.5"/>
                                            <label for="oc-size-10-5">10&frac12; (45)</label>
                                        </div>
                                        <div class="oc-size">
                                            <input type="checkbox" name="oc-size-11" id="oc-size-11" value="11"/>
                                            <label for="oc-size-11">11 (46)</label>
                                        </div>
                                        <div class="oc-size">
                                            <input type="checkbox" name="oc-size-11-5" id="oc-size-11-5" value="11.5"/>
                                            <label for="oc-size-11-5">11&frac12; (46&frac12;)</label>
                                        </div>
                                        <div class="oc-size">
                                            <input type="checkbox" name="oc-size-12" id="oc-size-12" value="12"/>
                                            <label for="oc-size-12">12 (47)</label>
                                        </div>
                                        <div class="oc-size">
                                            <input type="checkbox" name="oc-size-12-5" id="oc-size-12-5" value="12.5"/>
                                            <label for="oc-size-12-5">12&frac12; (47&frac12;)</label>
                                        </div>
                                        <div class="oc-size">
                                            <input type="checkbox" name="oc-size-13" id="oc-size-13" value="13"/>
                                            <label for="oc-size-13">13 (48)</label>
                                        </div>
                                        <div class="oc-size">
                                            <input type="checkbox" name="oc-size-13-5" id="oc-size-13-5" value="13.5"/>
                                            <label for="oc-size-13-5">13&frac12; (48&frac12;)</label>
                                        </div>
                                        <div class="oc-size">
                                            <input type="checkbox" name="oc-size-14" id="oc-size-14" value="14"/>
                                            <label for="oc-size-14">14 (49)</label>
                                        </div>
                                        <div class="oc-size">
                                            <input type="checkbox" name="oc-size-15" id="oc-size-15" value="15"/>
                                            <label for="oc-size-15">15 (50)</label>
                                        </div>
                                    </div>

                                    <div class="oc-cat-div">
                                        <div class="oc-title">Полнота</div>

                                        <div>
                                            <input type="checkbox" name="oc-width-f" id="oc-width-f" value="f"/>
                                            <label for="oc-width-f"></label>
                                            <label for="oc-width-f" class="oc-details-label">F</label>
                                        </div>
                                        <div>
                                            <input type="checkbox" name="oc-width-f-5" id="oc-width-f-5" value="f.5"/>
                                            <label for="oc-width-f-5"></label>
                                            <label for="oc-width-f-5" class="oc-details-label">F&frac12;</label>
                                        </div>
                                        <div>
                                            <input type="checkbox" name="oc-width-g" id="oc-width-g" value="g"/>
                                            <label for="oc-width-g"></label>
                                            <label for="oc-width-g" class="oc-details-label">G</label>
                                        </div>
                                        <div>
                                            <input type="checkbox" name="oc-width-h" id="oc-width-h" value="h"/>
                                            <label for="oc-width-h"></label>
                                            <label for="oc-width-h" class="oc-details-label">H</label>
                                        </div>
                                        <div>
                                            <input type="checkbox" name="oc-width-k" id="oc-width-k" value="k"/>
                                            <label for="oc-width-k"></label>
                                            <label for="oc-width-k" class="oc-details-label">K</label>
                                        </div>
                                        <div>
                                            <input type="checkbox" name="oc-width-m" id="oc-width-m" value="m"/>
                                            <label for="oc-width-m"></label>
                                            <label for="oc-width-m" class="oc-details-label">M</label>
                                        </div>
                                    </div>

                                    <div class="oc-cat-div">
                                        <div class="oc-title">Тип</div>

                                        <div>
                                            <input type="checkbox" name="oc-type-sandals" id="oc-type-sandals" value="sandals"/>
                                            <label for="oc-type-sandals"></label>
                                            <label for="oc-type-sandals" class="oc-details-label">босоножки</label>
                                        </div>
                                        <div>
                                            <input type="checkbox" name="oc-type-ankleboots" id="oc-type-ankleboots" value="ankleboots"/>
                                            <label for="oc-type-ankleboots"></label>
                                            <label for="oc-type-ankleboots" class="oc-details-label">ботильоны</label>
                                        </div>
                                        <div>
                                            <input type="checkbox" name="oc-type-boots" id="oc-type-boots" value="boots"/>
                                            <label for="oc-type-boots"></label>
                                            <label for="oc-type-boots" class="oc-details-label">ботинки</label>
                                        </div>
                                        <div>
                                            <input type="checkbox" name="oc-type-halsboots" id="oc-type-halfboots" value="halfboots"/>
                                            <label for="oc-type-halfboots"></label>
                                            <label for="oc-type-halfboots" class="oc-details-label">полусапоги</label>
                                        </div>
                                        <div>
                                            <input type="checkbox" name="oc-type-highboots" id="oc-type-highboots" value="highboots"/>
                                            <label for="oc-type-highboots"></label>
                                            <label for="oc-type-highboots" class="oc-details-label">сапоги</label>
                                        </div>
                                        <div>
                                            <input type="checkbox" name="oc-type-shoes" id="oc-type-shoes" value="shoes"/>
                                            <label for="oc-type-shoes"></label>
                                            <label for="oc-type-shoes" class="oc-details-label">туфли</label>
                                        </div>
                                        <div>
                                            <input type="checkbox" name="oc-type-flipflops" id="oc-type-flipflops" value="flipflops"/>
                                            <label for="oc-type-flipflops"></label>
                                            <label for="oc-type-flipflops" class="oc-details-label">шлепанцы</label>
                                        </div>
                                    </div>

                                    <div class="oc-cat-div">
                                        <div class="oc-title">Сезон</div>

                                        <div>
                                            <input type="checkbox" name="oc-season-springautumn" id="oc-season-springautumn" value="springautumn"/>
                                            <label for="oc-season-springautumn"></label>
                                            <label for="oc-season-springautumn" class="oc-details-label">весна-осень</label>
                                        </div>
                                        <div>
                                            <input type="checkbox" name="oc-season-summer" id="oc-season-summer" value="summer"/>
                                            <label for="oc-season-summer"></label>
                                            <label for="oc-season-summer" class="oc-details-label">лето</label>
                                        </div>
                                        <div>
                                            <input type="checkbox" name="oc-season-winter" id="oc-season-winter" value="winter"/>
                                            <label for="oc-season-winter"></label>
                                            <label for="oc-season-winter" class="oc-details-label">зима</label>
                                        </div>
                                    </div>

                                    <div class="oc-cat-div">
                                        <div class="oc-title">Категория</div>

                                        <div>
                                            <input type="checkbox" name="oc-category-new" id="oc-category-new" value="new"/>
                                            <label for="oc-category-new"></label>
                                            <label for="oc-category-new" class="oc-details-label">новинка</label>
                                        </div>
                                        <div>
                                            <input type="checkbox" name="oc-category-sale" id="oc-category-sale" value="sale"/>
                                            <label for="oc-category-sale"></label>
                                            <label for="oc-category-sale" class="oc-details-label">распродажа</label>
                                        </div>
                                        <div>
                                            <input type="checkbox" name="oc-category-hit" id="oc-category-hit" value="hit"/>
                                            <label for="oc-category-hit"></label>
                                            <label for="oc-category-hit" class="oc-details-label">хит продаж</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="oc-details-grid">
                                    <div class="oc-cat-div">
                                        <div class="oc-title">Материал верха</div>

                                        <div>
                                            <input type="checkbox" name="oc-uppers-leather" id="oc-uppers-leather" value="leather"/>
                                            <label for="oc-uppers-leather"></label>
                                            <label for="oc-uppers-leather" class="oc-details-label">гладкая кожа</label>
                                        </div>
                                        <div>
                                            <input type="checkbox" name="oc-uppers-suede" id="oc-uppers-suede" value="suede"/>
                                            <label for="oc-uppers-suede"></label>
                                            <label for="oc-uppers-suede" class="oc-details-label">замша</label>
                                        </div>
                                        <div>
                                            <input type="checkbox" name="oc-uppers-laser" id="oc-uppers-laser" value="laser"/>
                                            <label for="oc-uppers-laser"></label>
                                            <label for="oc-uppers-laser" class="oc-details-label">кожа (лазер)</label>
                                        </div>
                                        <div>
                                            <input type="checkbox" name="oc-uppers-laсл" id="oc-uppers-lack" value="lack"/>
                                            <label for="oc-uppers-lack"></label>
                                            <label for="oc-uppers-lack" class="oc-details-label">лаковая кожа</label>
                                        </div>
                                        <div>
                                            <input type="checkbox" name="oc-uppers-nubuck" id="oc-uppers-nubuck" value="nubuck"/>
                                            <label for="oc-uppers-nubuck"></label>
                                            <label for="oc-uppers-nubuck" class="oc-details-label">нубук</label>
                                        </div>
                                        <div>
                                            <input type="checkbox" name="oc-uppers-rippled" id="oc-uppers-rippled" value="rippled"/>
                                            <label for="oc-uppers-rippled"></label>
                                            <label for="oc-uppers-rippled" class="oc-details-label">рифленая кожа</label>
                                        </div>
                                        <div>
                                            <input type="checkbox" name="oc-uppers-mix" id="oc-uppers-mix" value="mix"/>
                                            <label for="oc-uppers-mix"></label>
                                            <label for="oc-uppers-mix" class="oc-details-label">сочетание</label>
                                        </div>
                                    </div>
                                    <div class="oc-cat-div">
                                        <div class="oc-title">Материал подкладки</div>

                                        <div>
                                            <input type="checkbox" name="oc-lining-leather" id="oc-lining-leather" value="leather"/>
                                            <label for="oc-lining-leather"></label>
                                            <label for="oc-lining-leather" class="oc-details-label">натуральная кожа</label>
                                        </div>
                                        <div>
                                            <input type="checkbox" name="oc-lining-wool" id="oc-lining-wool" value="wool"/>
                                            <label for="oc-lining-wool"></label>
                                            <label for="oc-lining-wool" class="oc-details-label">натуральная шерсть</label>
                                        </div>
                                        <div>
                                            <input type="checkbox" name="oc-lining-fur" id="oc-lining-fur" value="fur"/>
                                            <label for="oc-lining-fur"></label>
                                            <label for="oc-lining-fur" class="oc-details-label">натуральный мех</label>
                                        </div>
                                        <div>
                                            <input type="checkbox" name="oc-lining-mix" id="oc-lining-mix" value="mix" disabled/>
                                            <label for="oc-lining-mix"></label>
                                            <label for="oc-lining-mix" class="oc-details-label">сочетание</label>
                                        </div>
                                        <div>
                                            <input type="checkbox" name="oc-lining-textile" id="oc-lining-textile" value="textile" checked disabled/>
                                            <label for="oc-lining-textile"></label>
                                            <label for="oc-lining-textile" class="oc-details-label">текстиль</label>
                                        </div>
                                    </div>
                                    <div class="oc-cat-div">
                                        <div class="oc-title">Материал подошвы</div>

                                        <div>
                                            <input type="checkbox" name="oc-sole-cauotchouc" id="oc-sole-cauotchouc" value="cauotchouc"/>
                                            <label for="oc-sole-cauotchouc"></label>
                                            <label for="oc-sole-cauotchouc" class="oc-details-label">каучук</label>
                                        </div>
                                        <div>
                                            <input type="checkbox" name="oc-sole-latex" id="oc-sole-latex" value="latex"/>
                                            <label for="oc-sole-latex"></label>
                                            <label for="oc-sole-latex" class="oc-details-label">латекс</label>
                                        </div>
                                        <div>
                                            <input type="checkbox" name="oc-sole-leather" id="oc-sole-leather" value="leather"/>
                                            <label for="oc-sole-leather"></label>
                                            <label for="oc-sole-leather" class="oc-details-label">натуральная кожа</label>
                                        </div>
                                        <div>
                                            <input type="checkbox" name="oc-sole-synthetics" id="oc-sole-synthetics" value="synthetics"/>
                                            <label for="oc-sole-synthetics"></label>
                                            <label for="oc-sole-synthetics" class="oc-details-label">синтетика</label>
                                        </div>
                                    </div>
                                    <div class="oc-cat-div">
                                        <div class="oc-title">Высота каблука или танкетки</div>

                                        <div>
                                            <input type="checkbox" name="oc-height-high" id="oc-height-high" value="high"/>
                                            <label for="oc-height-high"></label>
                                            <label for="oc-height-high" class="oc-details-label">высокие</label>
                                        </div>
                                        <div>
                                            <input type="checkbox" name="oc-height-middle" id="oc-height-middle" value="middle"/>
                                            <label for="oc-height-middle"></label>
                                            <label for="oc-height-middle" class="oc-details-label">средние</label>
                                        </div>
                                        <div>
                                            <input type="checkbox" name="oc-height-low" id="oc-height-low" value="low"/>
                                            <label for="oc-height-low"></label>
                                            <label for="oc-height-low" class="oc-details-label">низкие</label>
                                        </div>
                                    </div>
                                    <div class="oc-cat-div">
                                        <div class="oc-title">Защита от промокания</div>

                                        <div>
                                            <input type="checkbox" name="oc-waterproof" id="oc-waterproof" value="waterproof"/>
                                            <label for="oc-waterproof"></label>
                                            <label for="oc-waterproof" class="oc-details-label">водонепроницаемые</label>
                                        </div>
                                    </div>
                                    <div class="oc-cat-div">
                                        <div class="oc-title">Производители</div>

                                        <div>
                                            <input type="checkbox" name="oc-manufacturer-ara" id="oc-manufacturer-ara" value="ara"/>
                                            <label for="oc-manufacturer-ara"></label>
                                            <label for="oc-manufacturer-ara" class="oc-details-label oc-flag oc-de" title="Ara (Германия)">Ara</label>
                                        </div>
                                        <div>
                                            <input type="checkbox" name="oc-manufacturer-barker" id="oc-manufacturer-barker" value="barker"/>
                                            <label for="oc-manufacturer-barker"></label>
                                            <label for="oc-manufacturer-barker" class="oc-details-label oc-flag oc-uk" title="Barker (Великобритания)">Barker</label>
                                        </div>
                                        <div>
                                            <input type="checkbox" name="oc-manufacturer-beautifeel" id="oc-manufacturer-beautifeel" value="beautiFeel"/>
                                            <label for="oc-manufacturer-beautifeel"></label>
                                            <label for="oc-manufacturer-beautifeel" class="oc-details-label oc-flag oc-il" title="BeautiFeel (Израиль)">BeautiFeel</label>
                                        </div>
                                        <div>
                                            <input type="checkbox" name="oc-manufacturer-comfortabel" id="oc-manufacturer-comfortabel" value="comfortabel"/>
                                            <label for="oc-manufacturer-comfortabel"></label>
                                            <label for="oc-manufacturer-comfortabel" class="oc-details-label oc-flag oc-de" title="Comfortabel (Германия)">Comfortabel</label>
                                        </div>
                                        <div>
                                            <input type="checkbox" name="oc-manufacturer-drbrinkmann" id="oc-manufacturer-drbrinkmann" value="drbrinkmann"/>
                                            <label for="oc-manufacturer-drbrinkmann"></label>
                                            <label for="oc-manufacturer-drbrinkmann" class="oc-details-label oc-flag oc-de" title="Dr. Brinkmann (Германия)">Dr. Brinkmann</label>
                                        </div>
                                        <div>
                                            <input type="checkbox" name="oc-manufacturer-gabor" id="oc-manufacturer-gabor" value="gabor"/>
                                            <label for="oc-manufacturer-gabor"></label>
                                            <label for="oc-manufacturer-gabor" class="oc-details-label oc-flag oc-de" title="Gabor (Германия)">Gabor</label>
                                        </div>
                                        <div>
                                            <input type="checkbox" name="oc-manufacturer-hogl" id="oc-manufacturer-hogl" value="hogl"/>
                                            <label for="oc-manufacturer-hogl"></label>
                                            <label for="oc-manufacturer-hogl" class="oc-details-label oc-flag oc-at" title="H&ouml;gl (Австрия)">H&ouml;gl</label>
                                        </div>
                                        <div>
                                            <input type="checkbox" name="oc-manufacturer-janita" id="oc-manufacturer-janita" value="janita"/>
                                            <label for="oc-manufacturer-janita"></label>
                                            <label for="oc-manufacturer-janita" class="oc-details-label oc-flag oc-fi" title="Janita (Финляндия)">Janita</label>
                                        </div>
                                        <div>
                                            <input type="checkbox" name="oc-manufacturer-jomos" id="oc-manufacturer-jomos" value="jomos"/>
                                            <label for="oc-manufacturer-jomos"></label>
                                            <label for="oc-manufacturer-jomos" class="oc-details-label oc-flag oc-de" title="Jomos (Германия)">Jomos</label>
                                        </div>
                                        <div>
                                            <input type="checkbox" name="oc-manufacturer-josefseibel" id="oc-manufacturer-josefseibel" value="josefseibel"/>
                                            <label for="oc-manufacturer-josefseibel"></label>
                                            <label for="oc-manufacturer-josefseibel" class="oc-details-label oc-flag oc-de" title="Josef Seibel (Германия)">Josef Seibel</label>
                                        </div>
                                        <div>
                                            <input type="checkbox" name="oc-manufacturer-meisi" id="oc-manufacturer-meisi" value="meisi"/>
                                            <label for="oc-manufacturer-meisi"></label>
                                            <label for="oc-manufacturer-meisi" class="oc-details-label oc-flag oc-de" title="Meisi (Германия)">Meisi</label>
                                        </div>
                                        <div>
                                            <input type="checkbox" name="oc-manufacturer-mephisto" id="oc-manufacturer-mephisto" value="mephisto"/>
                                            <label for="oc-manufacturer-mephisto"></label>
                                            <label for="oc-manufacturer-mephisto" class="oc-details-label oc-flag oc-fr" title="Mephisto (Франция)">Mephisto</label>
                                        </div>
                                        <div>
                                            <input type="checkbox" name="oc-manufacturer-peterkaiser" id="oc-manufacturer-peterkaiser" value="peterkaiser"/>
                                            <label for="oc-manufacturer-peterkaiser"></label>
                                            <label for="oc-manufacturer-peterkaiser" class="oc-details-label oc-flag oc-de" title="Peter Kaiser (Германия)">Peter Kaiser</label>
                                        </div>
                                        <div>
                                            <input type="checkbox" name="oc-manufacturer-pomar" id="oc-manufacturer-pomar" value="pomar"/>
                                            <label for="oc-manufacturer-pomar"></label>
                                            <label for="oc-manufacturer-pomar" class="oc-details-label oc-flag oc-fi" title="Pomar (Финляндия)">Pomar</label>
                                        </div>
                                        <div>
                                            <input type="checkbox" name="oc-manufacturer-rieker" id="oc-manufacturer-rieker" value="rieker"/>
                                            <label for="oc-manufacturer-rieker"></label>
                                            <label for="oc-manufacturer-rieker" class="oc-details-label oc-flag oc-ch" title="Rieker (Швейцария)">Rieker</label>
                                        </div>
                                        <div>
                                            <input type="checkbox" name="oc-manufacturer-sioux" id="oc-manufacturer-sioux" value="sioux"/>
                                            <label for="oc-manufacturer-sioux"></label>
                                            <label for="oc-manufacturer-sioux" class="oc-details-label oc-flag oc-de" title="Sioux (Германия)">Sioux</label>
                                        </div>
                                        <div>
                                            <input type="checkbox" name="oc-manufacturer-waldlaufer" id="oc-manufacturer-waldlaufer" value="waldlaufer"/>
                                            <label for="oc-manufacturer-waldlaufer"></label>
                                            <label for="oc-manufacturer-waldlaufer" class="oc-details-label oc-flag oc-de" title="Waldl&auml;ufer (Германия)">Waldl&auml;ufer</label>
                                        </div>
                                        <div>
                                            <input type="checkbox" name="oc-manufacturer-wortmann" id="oc-manufacturer-wortmann" value="wortmann"/>
                                            <label for="oc-manufacturer-wortmann"></label>
                                            <label for="oc-manufacturer-wortmann" class="oc-details-label oc-flag oc-de" title="Wortmann (Германия)">Wortmann</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="oc-details-grid"><div class="oc-cat-div text-center"><button type="submit" class="btn btn-success btn-lg">Показать</button></div></div>
                                <div class="oc-details-grid"><div class="oc-cat-div text-center"><button type="reset" class="btn btn-danger btn-lg">Сбросить</button></div></div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </section>


        <a id="oc-ontop" href="#top">
            <span class="oc-square text-center">вверх</span>
            <span class="oc-triangle"></span>
        </a>
        <footer>
            <div class="oc-footer-one">
                <div class="container-fluid">
                    <div class="col-sm-4">
                        <a href="<?= Url::to(['site/how-to-order']) ?>">Как сделать заказ</a>
                        <br/>
                        <a href="<?= Url::to(['site/sizes']) ?>">Таблица размеров</a>
                        <br/>
                        <a href="<?= Url::to(['site/contacts']) ?>">Контакты</a>
                    </div>
                    <div class="col-sm-5">
                        <a href="payment-and-delivery.htm">Оплата и доставка</a>
                        <br/>
                        <a href="exchange-and-moneyback.htm">Условия обмена и возврата</a>
                        <br/>
                        <a href="guarantee.htm">Гарантийные обязательства</a>
                    </div>
                    <div class="col-sm-3">
                        <form name="subscribe-form" action="index.php" method="post">
                            <div class="form-group">
                                <label for="subscribemail">Подписка на новости:</label>
                                <input type="email" class="form-control" id="subscribemail" required placeholder="Ваш e-mail" oninvalid="this.setCustomValidity('Проверьте адрес e-mail')"/>
                            </div>
                            <button type="submit" class="btn btn-primary">OK</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="oc-footer-two">
                <div class="container-fluid">
                    <div class="col-xs-12">
                        <span class="oc-copyright">Copyright &copy; obuv.co, 2013 &mdash; <?= date('Y') ?></span>
                    </div>
                    <div class="col-xs-12">
                        <div class="oc-counter">
                            <a href="#"><img src="imgs/ymetrika.png" width="88" height="31" alt="Яндекс.Метрика"/></a>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <section class="oc-robo">
                            <h1>Вы хотите <strong>купить обувь в Украине</strong>, но не знаете, какой интернет-магазин выбрать?</h1>
                            <p>
                                В <strong>интернет-магазине обуви obuv.co</strong> вы сможете <strong>купить качественную обувь</strong>
                                ведущих торговых марок: Ara (Ара), Barker (Баркер), BeautiFeel (Бьютифил), Comfortabel (Комфортабель),
                                Dr. Brinkmann (Доктор Бринкманн), FinnComfort (ФиннКомфорт), Gabor (Габор), Högl (Хёгль),
                                Janita (Янита), Jomos (Йомос), Josef Seibel (Йозеф Зайбель), Meisi (Майзи), Mephisto (Мефисто),
                                Peter Kaiser (Петер Кайзер), Pomar (Помар), Rieker (Рикер), Sioux (Сиукс), Waldläufer (Вальдлёйфер),
                                Wortmann (Wortmann). Как видите, наш <strong>каталог обуви</strong> предлагает только комфортную
                                <strong>мужскую и женскую обувь</strong>, которую можно купить с бесплатной доставкой по Украине и
                                гарантией, как в обычном магазине. Имеется австрийская обувь, английская обувь, немецкая обувь,
                                израильская обувь, финская обувь, французская обувь, которую можно легко и просто
                                <strong>купить онлайн</strong> в нашем интернет-магазине. Иногда у нас бывает
                                <strong>распродажа обуви</strong> (в таком случае обувь помечена значком <strong>распродажа</strong>),
                                и можно <strong>купить европейскую обувь</strong> по выгодной цене. Естественно, обувь в нашем магазине
                                никогда не бывает откровенно дешевой, но ведь <strong>качественные</strong> вещи нельзя купить дешево,
                                не так ли? Кроме того, можно купить <strong>новинки обуви</strong>, которые отмечены значком <strong>новинка</strong>.
                                Имеется также обувь со значком <strong>хит продаж</strong>. Это значит, что такая обувь пользуется популярностью
                                у покупателей. Если вы ищете <strong>обувь больших размеров</strong> и не знаете, в каком магазине можно ее купить,
                                то у нас вы найдете не только мужскую и женскую <strong>обувь больших размеров</strong>,
                                но и <strong>обувь большой полноты</strong>! В интернет-магазине обуви <strong>obuv.co</strong> есть отличный
                                <strong>онлайн-каталог обуви</strong> с хорошим выбором <strong>женской обуви</strong> от 36 до 45 размера,
                                а также <strong>мужской обуви</strong> от 41 по 50 размер. Есть также удобная <strong>обувь для широких ног</strong>
                                (так называемая <strong>широкая обувь</strong>, или <strong>полнотная обувь</strong>).
                                Как видите, <strong>обувь с большой полнотой</strong> у нас тоже можно <strong>купить</strong>. В отличие от
                                многих онлайн-каталогов, обувь из нашего интернет-магазина не нужно ждать неделями, потому что весь ассортимент
                                уже есть <strong>в наличии</strong>, и мы доставим обувь <strong>бесплатно</strong>.
                            </p>
                        </section>
                    </div>
                </div>
            </div>
        </footer>

        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
