<?php

namespace app\tests\fixtures;

use yii\test\ActiveFixture;

class ActividadOpcionFixture extends BaseFixtures
{
    public $modelClass = 'app\models\ActividadOpcion';
    public $dataFile = '@tests/_data/actividad_opcion.php';
    public $depends = ['\app\tests\fixtures\ActividadFixture'];
    
}