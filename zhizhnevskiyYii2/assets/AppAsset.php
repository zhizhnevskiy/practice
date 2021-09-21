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
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        'css/style.css',
        'css/styleLogo.css',
        'https://fonts.googleapis.com/css?family=Oswald',
        '../favicon.ico',
        'css/demo02.css',
        'css/style02.css',
        'css/elastislide02.css',
        'http://fonts.googleapis.com/css?family=PT+Sans+Narrow&v1',
        'http://fonts.googleapis.com/css?family=Pacifico',
    ];
    public $js = [
        'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js',
        'js/index.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
