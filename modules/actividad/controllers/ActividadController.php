<?php

namespace app\modules\actividad\controllers;

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

}
