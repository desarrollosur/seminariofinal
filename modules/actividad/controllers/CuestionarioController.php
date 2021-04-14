<?php

namespace app\modules\actividad\controllers;

use app\business\services\CuestionarioService;
use app\models\Cuestionario;
use app\modules\actividad\controllers\search\CuestionarioSearch;
use Yii;
use yii\web\Controller;

class CuestionarioController extends Controller {

    public function actionCreate() {
        return $this->render('create');
    }

    public function actionIndex() {
        $searchModel = new CuestionarioSearch();
        $dataProvider = $searchModel->search($_GET);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchModel'=>$searchModel
            ]);
    }

    public function actionRealizarCuestionario($id) {
        $managerCuestionarios = Yii::$container->get(CuestionarioService::class);
        $cuestionario = Cuestionario::findOne($id);
        $actividades = $cuestionario->actividades;
        $sesionPreguntaActual = Yii::$app->session->get('preguntaActual', 0);
        $preguntaActual = $actividades[$sesionPreguntaActual]??false;
        if(!$preguntaActual) {
            Yii::$app->session->set('preguntaActual', 0);
            return $this->redirect(['final-cuestionario', 'id'=>$id]);
        }
        return $this->render('realizar_cuestionario', 
            [
            'cuestionario'=>$cuestionario,
            'preguntaActual'=>$preguntaActual
            ]);
    }
    
    public function actionSiguientePregunta($cuestionario){
        $sesionPreguntaActual = Yii::$app->session->get('preguntaActual');
        $sesionRespuestasActuales = Yii::$app->session->get('respuestas', []);
        $valorPregunta = Yii::$app->request->post('valor', null);
        $sesionRespuestasActuales[$sesionPreguntaActual] = $valorPregunta;
        Yii::$app->session->set('respuestas', $sesionRespuestasActuales);
        Yii::$app->session->set('preguntaActual', ++$sesionPreguntaActual);
        return $this->redirect(['realizar-cuestionario', 'id'=>$cuestionario]);
    }
    
    public function actionFinalCuestionario($id){
        return $this->render('final-cuestionario');
    }

}
