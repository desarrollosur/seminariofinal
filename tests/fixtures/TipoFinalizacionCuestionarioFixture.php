<?php

namespace app\tests\fixtures;

use yii\test\ActiveFixture;

class TipoFinalizacionCuestionarioFixture extends BaseFixtures
{
    public $modelClass = 'app\models\TipoFinalizacionCuestionario';
    public $dataFile = '@tests/_data/tipo_finalizacion_cuestionario.php';
    public $depends = ['\app\tests\fixtures\UserFixture'];
    
}