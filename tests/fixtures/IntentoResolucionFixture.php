<?php

namespace app\tests\fixtures;

use yii\test\ActiveFixture;

class IntentoResolucionFixture extends BaseFixtures
{
    public $modelClass = 'app\models\IntentoResolucion';
    public $dataFile = '@tests/_data/intento_resolucion.php';
    public $depends = ['\app\tests\fixtures\UserFixture'];
    
}