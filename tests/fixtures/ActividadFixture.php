<?php

namespace app\tests\fixtures;

use yii\test\ActiveFixture;

class ActividadFixture extends BaseFixtures
{
    public $modelClass = 'app\models\Actividad';
    public $dataFile = '@tests/_data/actividad.php';
    public $depends = ['\app\tests\fixtures\MultimediaFixture'];
    
}