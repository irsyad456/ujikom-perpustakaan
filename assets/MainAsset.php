<?php

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class MainAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'gentelella/bootstrap/dist/css/bootstrap.min.css',
        'gentelella/font-awesome/css/font-awesome.min.css',
        'gentelella/nprogress/nprogress.css',
        'gentelella/build/css/custom.min.css',
        'gentelella/iCheck/skins/flat/green.css',
        'gentelella/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css',
        'gentelella/pnotify/dist/pnotify.css',
        'gentelella/pnotify/dist/pnotify.buttons.css',
    ];
    public $js = [
        'gentelella/bootstrap/dist/js/bootstrap.bundle.min.js',
        'gentelella/fastclick/lib/fastclick.js',
        'gentelella/nprogress/nprogress.js',
        'gentelella/build/js/custom.min.js',
        'gentelella/iCheck/icheck.min.js',
        'gentelella/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js',
        'gentelella/pnotify/dist/pnotify.js',
        'gentelella/pnotify/dist/pnotify.buttons.js',
    ];
    public $depends = [
        'yii\web\YiiAsset'
    ];
}
