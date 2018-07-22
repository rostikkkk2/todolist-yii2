<?php

namespace app\assets;

use yii\web\AssetBundle;

class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
      'css/style.css',
      'https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css',
    ];
    public $js = [
      'js/todolist.js',
      'https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapPluginAsset',
    ];
}
