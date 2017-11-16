<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'bower_components/bootstrap/dist/css/bootstrap.min.css',
        'bower_components/font-awesome/css/font-awesome.min.css',
        'bower_components/simple-line-icons/css/simple-line-icons.css',
        'bower_components/weather-icons/css/weather-icons.min.css',
        'bower_components/themify-icons/css/themify-icons.css',
        'bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker3.min.css',
        'dist/css/main.css',
    ];
    public $js = [
        'bower_components/bootstrap/dist/js/bootstrap.min.js',
        'bower_components/jquery.nicescroll/dist/jquery.nicescroll.min.js',
        'bower_components/autosize/dist/autosize.min.js',
        'bower_components/datatables.net/js/jquery.dataTables.min.js',
        'bower_components/datatables-tabletools/js/dataTables.tableTools.js',
        'bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js',
        'bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js',
        'bower_components/datatables-colvis/js/dataTables.colVis.js',
        'bower_components/datatables-responsive/js/dataTables.responsive.js',
        'bower_components/datatables-scroller/js/dataTables.scroller.js',
        'bower_components/highcharts/highcharts.js',
        'bower_components/highcharts/highcharts-more.js',
        'bower_components/highcharts/modules/exporting.js',
        'dist/js/modernizr-custom.js',
        'dist/js/init-highcharts-inner.js',
        'dist/js/init-datatables.js',
        'dist/js/init-datepicker.js',
        'dist/js/main.js',
        // 'bower_components/jquery/dist/jquery.min.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        // 'yii\bootstrap\BootstrapAsset',
    ];
}
