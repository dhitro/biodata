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
        // 'css/site.css',
        'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css',
        'https://use.fontawesome.com/releases/v5.7.2/css/all.css',
        'assets/stisla/css/style.css',
        'assets/stisla/css/components.css',
        'assets/stisla/modules/daterangepicker.css',
        'assets/stisla/modules/bootstrap-colorpicker.min.css',
        'assets/stisla/modules/select2.min.css',
        'assets/stisla/modules/selectric.css',
        'assets/stisla/modules/bootstrap-timepicker.min.css',
        'assets/stisla/modules/bootstrap-tagsinput.css',
    ];
    public $js = [
        // 'https://code.jquery.com/jquery-3.3.1.min.js',
        'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js',
        'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js',
        'https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js',
        'https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js',
        'assets/stisla/js/stisla.js',
        'assets/stisla/js/scripts.js',
        'assets/stisla/js/custom.js',
        // 'assets/stisla/js/page/index-0.js',
        'assets/stisla/modules/jquery.pwstrength.min.js',
        'assets/stisla/modules/daterangepicker.js',
        'assets/stisla/modules/bootstrap-colorpicker.min.js',
        'assets/stisla/modules/bootstrap-timepicker.min.js',
        'assets/stisla/modules/bootstrap-tagsinput.min.js',
        'assets/stisla/modules/select2.full.min.js',

    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
