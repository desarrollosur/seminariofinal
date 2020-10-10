<?php

namespace app\modules\api;
use \yii\web\Response;
use yii;

class Api extends \yii\base\Module {

    public $controllerNamespace = 'app\modules\api\controllers';

    public function init() {
        parent::init();
        if (Yii::$app instanceof \yii\web\Application){
                Yii::$app->response->format = Response::FORMAT_JSON;            

        }
        // ...  other initialization code ...
    }

}
