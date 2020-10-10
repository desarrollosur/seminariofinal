<?php

namespace app\tests\fixtures;

use yii\test\ActiveFixture;

class PaisFixture extends BaseFixtures
{
    public $modelClass = 'app\models\Pais';
    public $depends = ['\app\tests\fixtures\UserFixture'];
    
    public $dataFile = '@tests/_data/pais.php';
}