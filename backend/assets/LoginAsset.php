<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class LoginAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        'css/bootstrap.min.css',
        'css/datepicker3.css',
        'css/styles.css',
    ];
    public $js = [
        'js/jquery-1.11.1.min.js',
        'js/bootstrap.min.js',
        'js/chart.min.js',
        'js/bootstrap-datepicker.js',
        'js/easypiechart-data.js',
        'js/easypiechart.js',
        'js/chart-data.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}

