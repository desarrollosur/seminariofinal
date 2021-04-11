<?php

namespace app\tests\fixtures;

use yii\test\ActiveFixture;

class CuestionarioActividadFixture extends BaseFixtures
{
    public $modelClass = 'app\models\CuestionarioActividad';
    public $dataFile = '@tests/_data/cuestionario_actividad.php';
    public $depends = ['\app\tests\fixtures\CuestionarioFixture', '\app\tests\fixtures\ActividadFixture'];
    
}