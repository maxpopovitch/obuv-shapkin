<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\helpers\Url;
use app\models\forms\LoginForm;
use app\models\forms\ContactForm;
use app\models\forms\OrderForm;
use app\models\Brand;
use app\models\Ware;
use yz\shoppingcart\ShoppingCart;
use app\models\search\WareSearch;
use app\models\Subscriber;

class SiteController extends Controller {

  public function init() {
    parent::init();
    Yii::$app->language = 'ru';
    #add your logic: read the cookie and then set the language
  }

  /**
   * @inheritdoc
   */
  public function behaviors() {
    return [
	'access' => [
	    'class' => AccessControl::className(),
	    'only' => ['logout'],
	    'rules' => [
		[
		    'actions' => ['logout'],
		    'allow' => true,
		    'roles' => ['@'],
		],
	    ],
	],
	'verbs' => [
	    'class' => VerbFilter::className(),
	    'actions' => [
		'logout' => ['post'],
	    ],
	],
    ];
  }

  /**
   * @inheritdoc
   */
  public function actions() {
    return [
	'error' => [
	    'class' => 'yii\web\ErrorAction',
	],
	'captcha' => [
	    'class' => 'yii\captcha\CaptchaAction',
	    'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
	],
    ];
  }

  /**
   * Displays homepage.
   *
   * @return string
   */
  public function actionIndex() {
    $submittedForm = Yii::$app->request->post('Ware');
    $model = new Ware();
    $prices = [];
    $wares = Ware::find()->where(['status' => Ware::STATUS_ACTIVE])->all();
    foreach ($wares as $ware) {
      array_push($prices, $ware->new_price);
    }
    $prices = array_unique($prices);

    $searchModel = new WareSearch();
    $data = $searchModel->searchWares(Yii::$app->request->post('Ware'));

    $filteredWares = '';
    foreach ($data as $element) {
      $filteredWares.= $this->renderPartial('filtered_ware', ['ware' => $element]);
    }

    $this->view->params['header'] = 'Интернет-магазин обуви Obuv.CO. Новые поступления (на 26 мая 2014).';
    return $this->render('index', [
		'model' => $model,
		'prices' => $prices,
		'filteredWares' => $filteredWares,
		'submittedForm' => $submittedForm,
    ]);
  }

  /**
   * Login action.
   *
   * @return string
   */
  public function actionLogin() {
    if (!Yii::$app->user->isGuest) {
      return $this->goHome();
    }

    $model = new LoginForm();
    if ($model->load(Yii::$app->request->post()) && $model->login()) {
      return $this->goBack();
    }
    return $this->render('login', [
		'model' => $model,
    ]);
  }

  /**
   * Logout action.
   *
   * @return string
   */
  public function actionLogout() {
    Yii::$app->user->logout();

    return $this->goHome();
  }

  /**
   * Displays contact page.
   *
   * @return string
   */
  public function actionContact() {
    $model = new ContactForm();
    if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
      Yii::$app->session->setFlash('contactFormSubmitted');

      return $this->refresh();
    }
    return $this->render('contact', [
		'model' => $model,
    ]);
  }

  /**
   * Displays contacts page.
   *
   * @return string
   */
  public function actionContacts() {
    $form = Yii::$app->request->post('Ware');
    $model = new Ware();
    $prices = [];
    $wares = Ware::find()->where(['status' => Ware::STATUS_ACTIVE])->all();
    foreach ($wares as $ware) {
      array_push($prices, $ware->new_price);
    }
    $prices = array_unique($prices);
    $this->view->params['header'] = '<a href="/">' . Yii::$app->name . '</a>' . ' \ Контакты';
    return $this->render('contacts', [
		'model' => $model,
		'prices' => $prices,
    ]);
  }

  /**
   * Displays brands page.
   *
   * @return string
   */
  public function actionBrands() {
    $form = Yii::$app->request->post('Ware');
    $model = new Ware();
    $prices = [];
    $wares = Ware::find()->where(['status' => Ware::STATUS_ACTIVE])->all();
    foreach ($wares as $ware) {
      array_push($prices, $ware->new_price);
    }
    $prices = array_unique($prices);
    $this->view->params['header'] = '<a href="/">' . Yii::$app->name . '</a>' . ' \ Торговые марки';
    return $this->render('brands', [
		'model' => $model,
		'prices' => $prices,
    ]);
  }

  /**
   * Displays page with women's shoes.
   *
   * @return string
   */
  public function actionShoesWomen() {
    $form = Yii::$app->request->post('Ware');
    $model = new Ware();
    $prices = [];
    $wares = Ware::find()->where(['status' => Ware::STATUS_ACTIVE])->all();
    foreach ($wares as $ware) {
      array_push($prices, $ware->new_price);
    }
    $prices = array_unique($prices);
    $this->view->params['header'] = '<a href="/">' . Yii::$app->name . '</a>' . ' \ Женская обувь';
    return $this->render('shoes-women', [
		'model' => $model,
		'prices' => $prices,
    ]);
  }

  /**
   * Displays page with men's shoes.
   *
   * @return string
   */
  public function actionShoesMen() {
    $form = Yii::$app->request->post('Ware');
    $model = new Ware();
    $prices = [];
    $wares = Ware::find()->where(['status' => Ware::STATUS_ACTIVE])->all();
    foreach ($wares as $ware) {
      array_push($prices, $ware->new_price);
    }
    $prices = array_unique($prices);
    $this->view->params['header'] = '<a href="/">' . Yii::$app->name . '</a>' . ' \ Мужская обувь';
    return $this->render('shoes-men', [
		'model' => $model,
		'prices' => $prices,
    ]);
  }

  /**
   * Displays brand page.
   *
   * @return string
   */
  public function actionBrand($id) {
    $form = Yii::$app->request->post('Ware');
    $model = new Ware();
    $prices = [];
    $wares = Ware::find()->where(['status' => Ware::STATUS_ACTIVE])->all();
    foreach ($wares as $ware) {
      array_push($prices, $ware->new_price);
    }
    $prices = array_unique($prices);
    $brand = Brand::findOne($id);
    $this->view->params['header'] = '<a href="/">' . Yii::$app->name . '</a>' . ' \ <a href="index.php?r=site%2Fbrands">Торговые марки</a>' . ' \ ' . $brand->name;
    return $this->render('brand', [
		'model' => $model,
		'prices' => $prices,
		'brand' => $brand,
    ]);
  }

  /**
   * Displays ware page.
   *
   * @return string
   */
  public function actionWare($id) {
    $form = Yii::$app->request->post('Ware');
    $model = new Ware();
    $prices = [];
    $wares = Ware::find()->where(['status' => Ware::STATUS_ACTIVE])->all();
    foreach ($wares as $ware) {
      array_push($prices, $ware->new_price);
    }
    $prices = array_unique($prices);
    $ware = Ware::findOne($id);
    $this->view->params['header'] = '<a href="/">' . Yii::$app->name . '</a>' . ' \ <a href="' . Url::to(['site/brand', 'id' => $ware->_brand->id]) . '">' . $ware->_brand->name . '</a>' . ' \ ' . $ware->code;
    return $this->render('ware', [
		'model' => $model,
		'prices' => $prices,
		'ware' => $ware,
    ]);
  }

  /**
   * Displays tips page.
   *
   * @return string
   */
  public function actionTips() {
    $form = Yii::$app->request->post('Ware');
    $model = new Ware();
    $prices = [];
    $wares = Ware::find()->where(['status' => Ware::STATUS_ACTIVE])->all();
    foreach ($wares as $ware) {
      array_push($prices, $ware->new_price);
    }
    $prices = array_unique($prices);
    $this->view->params['header'] = '<a href="/">' . Yii::$app->name . '</a>' . ' \ Советы покупателю';
    return $this->render('tips', [
		'model' => $model,
		'prices' => $prices,
    ]);
  }

  /**
   * Displays payment-and-delivery page.
   *
   * @return string
   */
  public function actionPaymentAndDelivery() {
    $form = Yii::$app->request->post('Ware');
    $model = new Ware();
    $prices = [];
    $wares = Ware::find()->where(['status' => Ware::STATUS_ACTIVE])->all();
    foreach ($wares as $ware) {
      array_push($prices, $ware->new_price);
    }
    $prices = array_unique($prices);
    $this->view->params['header'] = '<a href="/">' . Yii::$app->name . '</a>' . ' \ Оплата и доставка';
    return $this->render('payment-and-delivery', [
		'model' => $model,
		'prices' => $prices,
    ]);
  }

  /**
   * Displays feedback page.
   *
   * @return string
   */
  public function actionFeedback() {
    $form = Yii::$app->request->post('Ware');
    $model = new Ware();
    $prices = [];
    $wares = Ware::find()->where(['status' => Ware::STATUS_ACTIVE])->all();
    foreach ($wares as $ware) {
      array_push($prices, $ware->new_price);
    }
    $prices = array_unique($prices);
    $this->view->params['header'] = '<a href="/">' . Yii::$app->name . '</a>' . ' \ Обратная связь';
    $feedbackModel = new ContactForm();
    if ($feedbackModel->load(Yii::$app->request->post()) && $feedbackModel->contact(Yii::$app->params['adminEmail'])) {
      Yii::$app->session->setFlash('contactFormSubmitted');

      return $this->refresh();
    }
    return $this->render('feedback', [
		'feedbackModel' => $feedbackModel,
		'model' => $model,
		'prices' => $prices,
		'rules' => ['name', 'required', 'message' => 'Please choose a username.'],
    ]);
  }

  /**
   * Displays sizes page.
   *
   * @return string
   */
  public function actionSizes() {
    $form = Yii::$app->request->post('Ware');
    $model = new Ware();
    $prices = [];
    $wares = Ware::find()->where(['status' => Ware::STATUS_ACTIVE])->all();
    foreach ($wares as $ware) {
      array_push($prices, $ware->new_price);
    }
    $prices = array_unique($prices);
    $this->view->params['header'] = '<a href="/">' . Yii::$app->name . '</a>' . ' \ Таблица размеров';
    return $this->render('sizes', [
		'model' => $model,
		'prices' => $prices,
    ]);
  }

  /**
   * Displays how-to-order page.
   *
   * @return string
   */
  public function actionHowToOrder() {
    $form = Yii::$app->request->post('Ware');
    $model = new Ware();
    $prices = [];
    $wares = Ware::find()->where(['status' => Ware::STATUS_ACTIVE])->all();
    foreach ($wares as $ware) {
      array_push($prices, $ware->new_price);
    }
    $prices = array_unique($prices);
    $this->view->params['header'] = '<a href="/">' . Yii::$app->name . '</a>' . ' \ Как сделать заказ';
    return $this->render('how-to-order', [
		'model' => $model,
		'prices' => $prices,
    ]);
  }

  /**
   * Displays moneyback page.
   *
   * @return string
   */
  public function actionMoneyback() {
    $form = Yii::$app->request->post('Ware');
    $model = new Ware();
    $prices = [];
    $wares = Ware::find()->where(['status' => Ware::STATUS_ACTIVE])->all();
    foreach ($wares as $ware) {
      array_push($prices, $ware->new_price);
    }
    $prices = array_unique($prices);
    $this->view->params['header'] = '<a href="/">' . Yii::$app->name . '</a>' . ' \ Условия обмена и возврата';
    return $this->render('moneyback', [
		'model' => $model,
		'prices' => $prices,
    ]);
  }

  /**
   * Displays guarantee page.
   *
   * @return string
   */
  public function actionGuarantee() {
    $form = Yii::$app->request->post('Ware');
    $model = new Ware();
    $prices = [];
    $wares = Ware::find()->where(['status' => Ware::STATUS_ACTIVE])->all();
    foreach ($wares as $ware) {
      array_push($prices, $ware->new_price);
    }
    $prices = array_unique($prices);
    $this->view->params['header'] = '<a href="/">' . Yii::$app->name . '</a>' . ' \ Гарантийные обязательства';
    return $this->render('guarantee', [
		'model' => $model,
		'prices' => $prices,
    ]);
  }

  /**
   * Displays cart page.
   *
   * @return string
   */
  public function actionCart() {
    $form = Yii::$app->request->post('Ware');
    $model = new Ware();
    $prices = [];
    $wares = Ware::find()->where(['status' => Ware::STATUS_ACTIVE])->all();
    foreach ($wares as $ware) {
      array_push($prices, $ware->new_price);
    }
    $prices = array_unique($prices);

    $cart = Yii::$app->cart;
    $products = $cart->getPositions();
    $cartWares = [];
    foreach ($products as $product) {
      $cartWare = Ware::findOne($product->id);
      $cartWare->sizes = $product->sizes;
      array_push($cartWares, $cartWare);
    }


    $this->view->params['header'] = '<a href="/">' . Yii::$app->name . '</a>' . ' \ Корзина';
    $cartModel = new OrderForm();
    if ($cartModel->load(Yii::$app->request->post()) && $cartModel->send(Yii::$app->params['adminEmail'], $cartWares)) {
      Yii::$app->session->setFlash('orderFormSubmitted');

      return $this->refresh();
    }
    return $this->render('cart', [
		'model' => $model,
		'prices' => $prices,
		'cartWares' => $cartWares,
		'cartModel' => $cartModel,
    ]);
  }

  /**
   * Adds ware to shopping cart and displays cart page.
   *
   * @return string
   */
  public function actionAddToCart($id, $size) {
    $model = Ware::findOne($id);
    $model->transformCallback = false;
    $model->sizes = $size;
    if ($model) {
      Yii::$app->cart->put($model, 1);
      return $this->redirect('index.php?r=site%2Fcart');
    }
    throw new NotFoundHttpException();
  }

  /**
   * Adds ware to shopping cart and displays cart page.
   *
   * @return string
   */
  public function actionRemoveFromCart($id) {
    if ($id) {
      Yii::$app->cart->removeByid($id);
      return $this->redirect('index.php?r=site%2Fcart');
    }
    throw new NotFoundHttpException();
  }

  /**
   * Search wares by parameters.
   *
   * @return result
   */
  public function actionFilter() {
    $this->view->params['header'] = 'It works!';
    return $this->render('index');
  }

  /**
   * Add subscriber to subscribe table.
   *
   * @return result
   */
  public function actionSubscribe() {
    $form = Yii::$app->request->post('SubscribeForm');
    $return = [
      'status' => 'error',
      'message' => 'Ошибка сохранения в базу данных'
    ];
    if (!empty($form['email'])) {
      $subscribers = Subscriber::find()->where(['email' => $form['email']])->all();
      if (is_array($subscribers) && count($subscribers) > 0) {
	$return['status'] = 'warning';
	$return['message'] = 'Такой email уже есть в базе';
	echo json_encode($return);
      } else {
	$model = new Subscriber();
	$model->email = $form['email'];
	if ($model->save()) {
	  $return['status'] = 'success';
	  $return['message'] = 'Вы подписаны на новости';
	  echo json_encode($return);
	} else {
	  echo json_encode($return);
	}
      }
    }
  }

}
