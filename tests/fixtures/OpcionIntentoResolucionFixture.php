<?php

namespace app\tests\fixtures;

use yii\test\ActiveFixture;

class OpcionIntentoResolucionFixture extends BaseFixtures
{
    public $modelClass = 'app\models\OpcionIntentoResolucion';
    public $dataFile = '@tests/_data/opcion_intento_resolucion.php';
    public $depends = ['\app\tests\fixtures\IntentoResolucionFixture'];

}