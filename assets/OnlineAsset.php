<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class OnlineAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/swiper.css',
        'css/online/style.css',
        'css/online/style2.css',
        'css/online/responsive.css',
        'css/online/animate.css',
        'css/mystyle.css'
    ];
    public $js = [
        'js/velocity.min.js',
        'js/velocity.ui.min.js',
        'js/jquery.waypoints.min.js',
        'js/swiper.min.js',
        'js/omain.js',
        'js/myjs.js'
    ];
    public $depends = [
        'yii\web\YiiAsset'
    ];
}
