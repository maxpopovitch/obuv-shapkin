<?php

namespace app\modules\admin\controllers;

use Yii;
use yii\web\Controller;
use app\models\forms\LoginForm;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\helpers\Html;

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
        if (!Yii::$app->user->isGuest) {
            $this->view->params['header'] = '<a href="/">' . Yii::$app->name . '</a>' . ' \ Администрирование';
        } else {
            $this->view->params['header'] = '<a href="/">' . Yii::$app->name . '</a>' . ' \ Администрирование';
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->render('index', [
                        'model' => $model,
            ]);
        }


        return $this->render('index', [
                    'model' => $model,
        ]);
    }

}
