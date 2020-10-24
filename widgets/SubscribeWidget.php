<?php

namespace app\widgets;

use yii\base\Widget;
use app\models\forms\SubscribeForm;

class SubscribeWidget extends Widget {

    public function init() {
        parent::init();
    }

    /**
     * @return form
     */
    public function run() {
        $model = new SubscribeForm();

        return $this->render('subscribeform', [
                    'model' => $model
        ]);
    }
}

?>