<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class MapsAsset extends AssetBundle
{
    public $basePath = '@webroot/vendor/jquery-latitude-longitude-picker-gmaps-master/';
    public $baseUrl = '@web/vendor/jquery-latitude-longitude-picker-gmaps-master/';
    public $css = [
        // 'css/demo.css',
        'css/jquery-gmaps-latlon-picker.css',
    ];
    public $js = [
        'js/jquery-2.1.1.min.js',
        'http://maps.googleapis.com/maps/api/js?sensor=false',
        'js/jquery-gmaps-latlon-picker.js',
    ];
}
