<?php

namespace app\modules\actividad\controllers;

use app\models\Actividad;
use app\models\Multimedia;
use kartik\filesystem\File;

class ActividadController extends \yii\web\Controller
{
    public function actionCreate()
    {
        return $this->render('create');
    }

    public function actionIndex()
    {
        return $this->render('index');
    }
    
    public function actionImagenActividad($id) {
        $actividad = Actividad::findOne($id);
        if(!$actividad)
            return false;
        $archivo = new File('@archivos'.DIRECTORY_SEPARATOR.$actividad->multimediaid);
        if(!$archivo->exists())
            return false;
        if(!$archivo->open())
            return false;
        
        $image = stream_get_contents($archivo->handle);
        header('Content-type: image/png img/jpg');
        echo $image;      
        
    }

}
