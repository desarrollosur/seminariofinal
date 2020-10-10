<?php


namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class FullCalendarAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'fullcalendar/packages/core/main.css',
        'fullcalendar/packages/daygrid/main.css'
    ];
    public $js = [
        'fullcalendar/packages/core/main.js',
        'fullcalendar/packages/daygrid/main.js',
        'fullcalendar/packages/core/locales/es.js',
        'fullcalendar/packages/interaction/main.js',
        'fullcalendar/moment-with-locales.js',
        'fullcalendar/packages/moment/main.js'
    ];
    public $depends = [
        'app\assets\AppAsset',
    ];
}
