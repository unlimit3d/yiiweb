<?php
namespace frontend\moduls\map\assets;
use yii\web\AssetBundle;

class MapAsset extends AssetBundle
{
    
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    
    public $css = [
        '//api.mapbox.com/mapbox.js/v3.1.0/mapbox.css',
        
    ];
    public $js = [
        '//api.mapbox.com/mapbox.js/v3.1.0/mapbox.js'
    ];
    public $depends = [
        'frontend\assets\AppAsset',
    ];
    
}