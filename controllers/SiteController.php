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
        $this->view->params['header'] = 'Интернет-магазин обуви Obuv.CO. Новые поступления (на 26 мая 2014).';
        return $this->render('index');
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
        $this->view->params['header'] = '<a href="/">' . Yii::$app->name . '</a>' . ' \ Контакты';
        return $this->render('contacts');
    }

    /**
     * Displays brands page.
     *
     * @return string
     */
    public function actionBrands() {
        $this->view->params['header'] = '<a href="/">' . Yii::$app->name . '</a>' . ' \ Торговые марки';
        return $this->render('brands');
    }

    /**
     * Displays brands page.
     *
     * @return string
     */
    public function actionShoesWomen() {
        $this->view->params['header'] = '<a href="/">' . Yii::$app->name . '</a>' . ' \ Женская обувь';
        return $this->render('shoes-women');
    }

    /**
     * Displays brands page.
     *
     * @return string
     */
    public function actionShoesMen() {
        $this->view->params['header'] = '<a href="/">' . Yii::$app->name . '</a>' . ' \ Мужская обувь';
        return $this->render('shoes-men');
    }

    /**
     * Displays brand page.
     *
     * @return string
     */
    public function actionBrand($id) {
        $brand = Brand::findOne($id);
        $this->view->params['header'] = '<a href="/">' . Yii::$app->name . '</a>' . ' \ <a href="index.php?r=site%2Fbrands">Торговые марки</a>' . ' \ ' . $brand->name;
        return $this->render('brand', [
                    'brand' => $brand
        ]);
    }

    /**
     * Displays brand page.
     *
     * @return string
     */
    public function actionWare($id) {
        $ware = Ware::findOne($id);
        $this->view->params['header'] = '<a href="/">' . Yii::$app->name . '</a>' . ' \ <a href="' . Url::to(['site/brand', 'id' => $ware->_brand->id]) . '">' . $ware->_brand->name . '</a>' . ' \ ' . $ware->code;
        return $this->render('ware', [
                    'ware' => $ware
        ]);
    }

    /**
     * Displays tips page.
     *
     * @return string
     */
    public function actionTips() {
        $this->view->params['header'] = '<a href="/">' . Yii::$app->name . '</a>' . ' \ Советы покупателю';
        return $this->render('tips');
    }

    /**
     * Displays payment-and-delivery page.
     *
     * @return string
     */
    public function actionPaymentAndDelivery() {
        $this->view->params['header'] = '<a href="/">' . Yii::$app->name . '</a>' . ' \ Оплата и доставка';
        return $this->render('payment-and-delivery');
    }

    /**
     * Displays feedback page.
     *
     * @return string
     */
    public function actionFeedback() {
        $this->view->params['header'] = '<a href="/">' . Yii::$app->name . '</a>' . ' \ Обратная связь';
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('feedback', [
                    'model' => $model,
                    'rules' => ['name', 'required', 'message' => 'Please choose a username.'],
        ]);
    }

    /**
     * Displays sizes page.
     *
     * @return string
     */
    public function actionSizes() {
        $this->view->params['header'] = '<a href="/">' . Yii::$app->name . '</a>' . ' \ Таблица размеров';
        return $this->render('sizes');
    }

    /**
     * Displays how-to-order page.
     *
     * @return string
     */
    public function actionHowToOrder() {
        $this->view->params['header'] = '<a href="/">' . Yii::$app->name . '</a>' . ' \ Как сделать заказ';
        return $this->render('how-to-order');
    }

    /**
     * Displays moneyback page.
     *
     * @return string
     */
    public function actionMoneyback() {
        $this->view->params['header'] = '<a href="/">' . Yii::$app->name . '</a>' . ' \ Условия обмена и возврата';
        return $this->render('moneyback');
    }

    /**
     * Displays guarantee page.
     *
     * @return string
     */
    public function actionGuarantee() {
        $this->view->params['header'] = '<a href="/">' . Yii::$app->name . '</a>' . ' \ Гарантийные обязательства';
        return $this->render('guarantee');
    }

    /**
     * Displays cart page.
     *
     * @return string
     */
    public function actionCart() {
        $cart = Yii::$app->cart;
        $products = $cart->getPositions();
        $wares = [];
        foreach ($products as $product) {
            $ware = Ware::findOne($product->id);
            $ware->sizes = $product->sizes;
            array_push($wares, $ware);
        }
        $this->view->params['header'] = '<a href="/">' . Yii::$app->name . '</a>' . ' \ Корзина';


        $model = new OrderForm();
        if ($model->load(Yii::$app->request->post()) && $model->send(Yii::$app->params['adminEmail'], $wares)) {
            Yii::$app->session->setFlash('orderFormSubmitted');
            
            return $this->refresh();
        }
        return $this->render('cart', ['wares' => $wares, 'model' => $model]);
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
     * Displays confirmation page.
     *
     * @return string
     */
    public function actionConfirmation() {
        $this->view->params['header'] = '<a href="/">' . Yii::$app->name . '</a>' . ' \ Спасибо!';
        return $this->render('confirmation');
    }

}
