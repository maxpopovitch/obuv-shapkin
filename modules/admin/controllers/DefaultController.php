<?php

namespace app\modules\admin\controllers;

use Yii;
use yii\web\Controller;
use app\models\forms\LoginForm;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\helpers\Html;
use app\models\BackendUser;

/**
 * Default controller for the `admin` module
 */
class DefaultController extends Controller {

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
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex() {
        $model = new LoginForm();
        $this->view->params['header'] = '<a href="/">' . Yii::$app->name . '</a>' . ' \ Администрирование';
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->render('index', [
                        'model' => $model,
            ]);
        }

        return $this->render('index', [
                    'model' => $model,
        ]);
    }

    public function actionAddUser() {
        $backendUser = new BackendUser();
        $backendUser->username = 'user';
        $backendUser->setPassword('123');
        $backendUser->generateAuthKey();
        $backendUser->save();
        \yii\helpers\VarDumper::dump($backendUser->getErrors());
    }

}
