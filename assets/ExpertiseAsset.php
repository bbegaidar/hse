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
class ExpertiseAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/swiper.css',
        'css/expertise/style.css',
        'css/expertise/style1.css',
        'css/expertise/style2.css',
        'css/expertise/responsive.css',
        'css/expertise/animate.css',
        'css/expertise/animate-2.css',
        'css/mystyle.css'
    ];
    public $js = [
        'js/velocity.min.js',
        'js/velocity.ui.min.js',
        'js/jquery.waypoints.min.js',
        'js/swiper.min.js',
        'js/emain.js',
        'js/myjs.js'
    ];
    public $depends = [
        'yii\web\YiiAsset'
    ];
}
