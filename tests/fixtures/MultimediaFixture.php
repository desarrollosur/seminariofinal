<?php

namespace app\tests\fixtures;

use yii\test\ActiveFixture;
use kartik\filesystem\File;
use kartik\filesystem\Folder;
use yii\base\Exception;
use Error;
use Yii;

class MultimediaFixture extends BaseFixtures
{
    public $modelClass = 'app\models\Multimedia';
    public $dataFile = '@tests/_data/multimedia.php';
    public $depends = ['\app\tests\fixtures\UserFixture'];
    
    public function load() {
        parent::load();

        try {
            $carpetaOrigen = new Folder('@tests/_data/multimedia');
            foreach ($carpetaOrigen->find() as $archivo ){
                  $stringFile = $carpetaOrigen->pwd() . DIRECTORY_SEPARATOR . $archivo;
                  $objetoArchivo = new File($stringFile);
                  $dirArchivos = Yii::getAlias('@archivos');
                  $objetoArchivo->copy($dirArchivos.DIRECTORY_SEPARATOR.$archivo);
            }
        } catch (Error $ex) {
            Yii::error('error al copiar la multimedia');
        } 
    }
    
    public function unload() {
        parent::unload();
        try {
            $carpetaOrigen = new Folder('@archivos');
            foreach ($carpetaOrigen->find('[0-9]*') as $archivo ){
                  $stringFile = $carpetaOrigen->pwd() . DIRECTORY_SEPARATOR . $archivo;
                  $objetoArchivo = new File($stringFile);
                  $objetoArchivo->delete();
            }
        } catch (Error $ex) {
            Yii::error('error al borrar la multimedia');
        }        
    }
}