<?php

namespace app\tests\fixtures;

use yii\test\ActiveFixture;

class SubcategoriaFixture extends BaseFixtures
{
    public $modelClass = 'app\models\Subcategoria';
    public $dataFile = '@tests/_data/subcategoria.php';
    public $depends = ['\app\tests\fixtures\CategoriaFixture'];
    
}