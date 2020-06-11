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
class LoginAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        '/css1/owl.carousel.css',
        '/css1/font.css',
        '/css1/responsive.css',
        '/css1/style.css',
        'css/login/style.css',
        'css/login/style2.css',
        'css/login/responsive.css',
        'css/login/animate.css',
        'css/mystyle.css'
    ];
    public $js = [
        // '/js1/jquery.js',
        'js/jquery.waypoints.min.js',
        // '/js1/owl.js',
        '/js1/tilt.js',
        '/js1/main.js',
        'js/velocity.min.js',
        'js/velocity.ui.min.js',        
        'js/swiper.min.js',
        'js/myjs.js'
    ];
    public $depends = [
        'yii\web\YiiAsset'
    ];
}
