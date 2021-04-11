<?php

namespace app\tests\fixtures;

use yii\test\ActiveFixture;

class CuestionarioFixture extends BaseFixtures
{
    public $modelClass = 'app\models\Cuestionario';
    public $dataFile = '@tests/_data/cuestionario.php';
    public $depends = ['\app\tests\fixtures\UserFixture'];
    
}