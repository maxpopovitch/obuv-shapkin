<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/custom.css',
        'css/buy-form.css',
        'css/offcanvas.css',
        'css/ontop.css',
        'css/receipt.css',
    ];
    public $js = [
        'js/jquery-2.1.3.min.js',
        'js/bootstrap.min.js',
        'js/cart.js',
        'js/gmaps-scroll.js',
        'js/offcanvas.js',
        'js/ontop.js',
        'js/range-value.js',
        'js/sidebar-height.js',
        'js/thumbs.js',
        'js/validator.min.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
