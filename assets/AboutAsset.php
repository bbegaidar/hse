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
class AboutAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/swiper.css',
        'css/style.css',
        'css/style2.css',
        'css/about.css',
        'css/responsive.css',
        'css/aboutresponsive.css',
        'css/animate.css',
        'css/mystyle.css'
       // 'css/owl_carousel.css',
       // 'css/responsive.css',
       // 'css/team.css',
    ];
    public $js = [
       // 'js/jquery.min.js',
       // 'js/html-load.js',
        
        'js/velocity.min.js',
        'js/velocity.ui.min.js',
        'js/jquery.waypoints.min.js',
        'js/swiper.min.js',
        'js/main.js',
        'js/myjs.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        //'yii\bootstrap\BootstrapAsset',
    ];
}
