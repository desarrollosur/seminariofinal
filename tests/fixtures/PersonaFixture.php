<?php

namespace app\tests\fixtures;


class PersonaFixture extends BaseFixtures
{
    public $modelClass = 'app\models\Persona';
    public $depends = ['\app\tests\fixtures\TipoDniFixture', '\app\tests\fixtures\PaisFixture', '\app\tests\fixtures\UserFixture'];
    
    public $dataFile = '@tests/_data/persona.php';
}