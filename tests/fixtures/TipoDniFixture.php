<?php

namespace app\tests\fixtures;

use yii\test\ActiveFixture;

class TipoDniFixture extends ActiveFixture
{
    public $modelClass = 'app\models\TipoDni';
    public $depends = ['\app\tests\fixtures\UserFixture'];
    
    public $dataFile = '@tests/_data/tipo_dni.php';
}