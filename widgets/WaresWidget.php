<?php

namespace app\widgets;

use yii\base\Widget;
use app\models\Ware;

class WaresWidget extends Widget {
    
    private $_wares;
    public $filter;

    public function init() {
        parent::init();
        if ($this->filter === null) {
            $this->_wares = Ware::find()->where(['status' => Ware::STATUS_ACTIVE])->orderBy(['position' => SORT_ASC])->all();
        } else {
            $this->_wares = Ware::find()->where(['status' => Ware::STATUS_ACTIVE])->andWhere($this->filter)->orderBy(['position' => SORT_ASC])->all();
        }
    }

    /**
     * @return wares list
     */
    public function run() {
        return $this->render('wares', [
                    'wares' => $this->_wares,
        ]);
    }
}

?>