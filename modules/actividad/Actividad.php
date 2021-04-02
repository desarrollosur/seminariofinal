<?php

namespace app\modules\actividad;

use dmstr\web\traits\AccessBehaviorTrait;

class Actividad extends \yii\base\Module
{
    use AccessBehaviorTrait;

    public $controllerNamespace = 'app\modules\actividad\controllers';

    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }
}
