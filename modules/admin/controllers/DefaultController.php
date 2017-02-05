<?php

namespace app\modules\admin\controllers;

use Yii;
use yii\web\Controller;
use app\models\forms\LoginForm;

/**
 * Default controller for the `admin` module
 */
class DefaultController extends Controller {

    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex() {
        $model = new LoginForm();
        
        $this->view->params['header'] = '<a href="/">' . Yii::$app->name . '</a>' . ' \ Администрирование';
        return $this->render('index', [
                    'model' => $model,
        ]);
    }
}
