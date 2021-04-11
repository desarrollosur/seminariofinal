<?php

namespace app\tests\fixtures;

use yii\test\ActiveFixture;

class CategoriaFixture extends BaseFixtures
{
    public $modelClass = 'app\models\Categoria';
    public $dataFile = '@tests/_data/categoria.php';
    public $depends = ['\app\tests\fixtures\UserFixture'];

}