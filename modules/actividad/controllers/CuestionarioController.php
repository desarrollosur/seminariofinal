<?php

namespace app\modules\actividad\controllers;

use app\models\Cuestionario;

class CuestionarioController extends \yii\web\Controller {

    public function actionCreate() {
        return $this->render('create');
    }

    public function actionIndex() {
        $searchModel = new search\CuestionarioSearch();
        $dataProvider = $searchModel->search($_GET);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchModel'=>$searchModel
            ]);
    }

    public function actionRealizarCuestionario($id) {
        $cuestionario = Cuestionario::findOne($id);
        $preguntaActual = current($cuestionario->actividades);
        return $this->render('realizar_cuestionario', 
            [
            'cuestionario'=>$cuestionario,
            'preguntaActual'=>$preguntaActual
            ]);
    }

}
