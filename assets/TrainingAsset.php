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
class TrainingAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/swiper.css',
        'css/training/style.css',
        'css/training/style2.css',
        'css/training/responsive.css',
        'css/training/animate.css',
        'css/mystyle.css'
       // 'css/owl_carousel.css',
       // 'css/responsive.css',
       // 'css/team.css',
    ];
    public $js = [
       
        'js/velocity.min.js',
        'js/velocity.ui.min.js',
        'js/jquery.waypoints.min.js',
        'js/swiper.min.js',
        'js/tmain.js',
        'js/myjs.js'
    ];
    public $depends = [
        'yii\web\YiiAsset'
        
    ];
}
