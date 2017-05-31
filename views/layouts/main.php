<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\bootstrap\ActiveForm;
use yii\widgets\Breadcrumbs;
use app\widgets\SubscribeWidget;
use app\assets\AppAsset;
use yii\helpers\Url;
use app\models\Ware;
use app\models\Color;

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
	      <li class="<?= (Url::current() === '/index.php?r=site%2Fshoes-women') ? 'active' : '' ?>"><a href="<?= Url::to(['site/shoes-women']) ?>">Женская<br/> обувь</a></li>
	      <li class="<?= (Url::current() === '/index.php?r=site%2Fshoes-men') ? 'active' : '' ?>"><a href="<?= Url::to(['site/shoes-men']) ?>">Мужская<br/> обувь</a></li>
	      <li class="<?= (Url::current() === '/index.php?r=site%2Fbrands') ? 'active' : '' ?>"><a href="<?= Url::to(['site/brands']) ?>">Торговые<br/> марки</a></li>
	      <li class="<?= (Url::current() === '/index.php?r=site%2Ftips') ? 'active' : '' ?>"><a href="<?= Url::to(['site/tips']) ?>">Советы<br/> покупателю</a></li>
	      <li class="<?= (Url::current() === '/index.php?r=site%2Fpayment-and-delivery') ? 'active' : '' ?>"><a href="<?= Url::to(['site/payment-and-delivery']) ?>">Оплата<br/> и доставка</a></li>
	      <li class="<?= (Url::current() === '/index.php?r=site%2Ffeedback') ? 'active' : '' ?>"><a href="<?= Url::to(['site/feedback']) ?>">Обратная<br/> связь</a></li>
<!--	      <li>
		<div class="oc-lang">
		  <span>Язык:&nbsp;</span><br/>
		  <select onchange="location = this.options[this.selectedIndex].value;">
		    <option value="ru">Русский</option>
		    <option value="ua" disabled>Українська</option>
		    <option value="en" disabled>English</option>
		    <option value="de" disabled>Deutsch</option>
		  </select>​
		</div>
	      </li>-->
	    </ul>
	  </div><!-- /.navbar-collapse -->
	</div><!-- /.container-fluid -->
      </nav>
      <div class="oc-contact container-fluid">
	<div class="clearfix">
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
	  <div class="oc-location">
	    <div class="oc-div-i">
	      <i class="glyphicon glyphicon-map-marker"></i>
	    </div>
	    <div class="oc-info">
	      <a href="<?= Url::to(['site/contacts']) ?>">г. Донецк, ул. Университетская, 63, салон обуви <q>Бумеранг</q> (наш партнер)</a>
	    </div>
	  </div>
	  <div class="oc-cart">
	    <div class="oc-div-i">
	      <i class="glyphicon glyphicon-shopping-cart"></i>
	    </div>
	    <div class="oc-info">
	      <?php if (Ware::getCartWaresCount() > 0) { ?>
  	      <a href="<?= Url::to(['site/cart']) ?>">
		  <?php echo Ware::getCartWaresCount() . ' (' . Ware::getCartWaresCost() . ' грн.)'; ?>
  	      </a>
	      <?php } else { ?>
  	      Добавьте товары в корзину
	      <?php } ?>
	    </div>
	  </div>
	</div>
      </div>
      <section class="oc-breadcrumbs">
	<h1>
	  <?php
	  if (isset($this->params['header']) && !Yii::$app->user->isGuest) {
	    echo $this->params['header'] . Html::a('Выход', ['/site/logout'], ['data' => ['method' => 'post'], 'class' => 'btn btn-danger btn-xs', 'style' => 'margin-left: 10px']);
	  } else if (!isset($this->params['header']) && !Yii::$app->user->isGuest) {
	    echo Html::a('Выход', ['/site/logout'], ['data' => ['method' => 'post'], 'class' => 'btn btn-danger btn-xs']);
	  } else if (isset($this->params['header'])) {
	    echo $this->params['header'];
	  } else {
	    echo '<a href="/">obuv.co</a>';
	  }
	  ?>
	</h1>
      </section>
    </header>

    <?= $content ?>

    <a id="oc-ontop" href="#top">
      <span class="oc-square text-center">вверх</span>
      <span class="oc-triangle"></span>
    </a>
    <footer>
      <div class="oc-footer-one">
	<div class="container-fluid">
	  <div class="col-sm-4">
	    <a class="<?= (Url::current() === '/index.php?r=site%2Fhow-to-order') ? 'active' : '' ?>" href="<?= Url::to(['site/how-to-order']) ?>">Как сделать заказ</a>
	    <br/>
	    <a class="<?= (Url::current() === '/index.php?r=site%2Fsizes') ? 'active' : '' ?>" href="<?= Url::to(['site/sizes']) ?>">Таблица размеров</a>
	    <br/>
	    <a class="<?= (Url::current() === '/index.php?r=site%2Fcontacts') ? 'active' : '' ?>" href="<?= Url::to(['site/contacts']) ?>">Контакты</a>
	  </div>
	  <div class="col-sm-5">
	    <a class="<?= (Url::current() === '/index.php?r=site%2Fpayment-and-delivery') ? 'active' : '' ?>" href="<?= Url::to(['site/payment-and-delivery']) ?>">Оплата и доставка</a>
	    <br/>
	    <a class="<?= (Url::current() === '/index.php?r=site%2Fmoneyback') ? 'active' : '' ?>" href="<?= Url::to(['site/moneyback']) ?>">Условия обмена и возврата</a>
	    <br/>
	    <a class="<?= (Url::current() === '/index.php?r=site%2Fguarantee') ? 'active' : '' ?>" href="<?= Url::to(['site/guarantee']) ?>">Гарантийные обязательства</a>
	  </div>
	  <div class="col-sm-3">
	    <?= SubscribeWidget::widget() ?>
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

	      <!-- Yandex.Metrika informer -->
	      <a href="http://metrika.yandex.ru/stat/?id=23142487&amp;from=informer"
		 target="_blank" rel="nofollow">
		<img src="//bs.yandex.ru/informer/23142487/3_0_FFFFFFFF_FFFFFFFF_0_pageviews"
		     style="margin-top:10px; width:88px; height:31px; border:0;" alt="Яндекс.Метрика" title="Яндекс.Метрика: данные за сегодня (просмотры, визиты и уникальные посетители)" onclick="try {
			   Ya.Metrika.informer({i: this, id: 23142487, lang: 'ru'});
			   return false
			 } catch (e) {
			 }"/>
	      </a>
	      <!-- /Yandex.Metrika informer -->

	      <!-- Yandex.Metrika counter -->
	      <script type="text/javascript">
		(function (d, w, c) {
		  (w[c] = w[c] || []).push(function () {
		    try {
		      w.yaCounter23142487 = new Ya.Metrika({id: 23142487,
			webvisor: true,
			clickmap: true,
			trackLinks: true,
			accurateTrackBounce: true});
		    } catch (e) {
		    }
		  });

		  var n = d.getElementsByTagName("script")[0],
			  s = d.createElement("script"),
			  f = function () {
			    n.parentNode.insertBefore(s, n);
			  };
		  s.type = "text/javascript";
		  s.async = true;
		  s.src = (d.location.protocol == "https:" ? "https:" : "http:") + "//mc.yandex.ru/metrika/watch.js";

		  if (w.opera == "[object Opera]") {
		    d.addEventListener("DOMContentLoaded", f, false);
		  } else {
		    f();
		  }
		})(document, window, "yandex_metrika_callbacks");
	      </script>
	      <noscript><div><img src="//mc.yandex.ru/watch/23142487" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
	      <!-- /Yandex.Metrika counter -->

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
