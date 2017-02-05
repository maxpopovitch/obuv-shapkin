<?php

namespace app\modules\admin\controllers;

use Yii;
use yii\web\Controller;

/**
 * Default controller for the `admin` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $this->view->params['header'] = '<a href="/">' . Yii::$app->name . '</a>' . ' \ Администрирование';
        return $this->render('index');
    }
}
