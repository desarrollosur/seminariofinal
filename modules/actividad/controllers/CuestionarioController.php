<?php

namespace app\modules\actividad\controllers;

use app\business\services\CuestionarioService;
use app\models\Cuestionario;
use app\models\IntentoResolucion;
use app\models\OpcionIntentoResolucion;
use app\modules\actividad\controllers\search\CuestionarioSearch;
use Yii;
use yii\base\Exception;
use yii\helpers\Json;
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
        $sesionPreguntaActual = Yii::$app->session->get('preguntaActual', 0);
        $sesionRespuestasActuales = Yii::$app->session->get('respuestas', []);
        $valorPregunta = Yii::$app->request->post('valor', null);
        $sesionRespuestasActuales[$sesionPreguntaActual] = $valorPregunta;

        $intento = new IntentoResolucion();
        if($sesionPreguntaActual===0){
            $intento->userid = Yii::$app->user->identity->id;
            $intento->cuestionarioid = $cuestionario;
            $intento->tipo_finalizacion_cuestionarioid = 2; // seteado temporalmente a ENVIO
            if(!$intento->save()){
                throw new Exception(Json::encode($intento->errors));
            }
            Yii::$app->session->set('intento_resolucion_actual', $intento->id);
        }else{
            $intento = IntentoResolucion::findOne(Yii::$app->session->get('intento_resolucion_actual'));
        }
        
        $opcionIntento = new OpcionIntentoResolucion();
        $opcionIntento->intento_resolucionid = $intento->id;
        $opcionIntento->actividad_opcionid = $valorPregunta;
        if(!$opcionIntento->save()){
            throw new Exception(Json::encode($opcionIntento->errors));
        }

        $managerCuestionarios = Yii::$container->get(CuestionarioService::class);
        /** @var CuestionarioService $managerCuestionarios */
        $cuestionarioActual = Cuestionario::findOne($cuestionario);
        $respuestaManager = $managerCuestionarios->consultarTutor(Yii::$app->user->identity, $cuestionarioActual);
        $valorTutor = $respuestaManager[0]??false;
        if($valorTutor && $valorTutor > 0.84) {
            Yii::$app->session->remove('preguntaActual');
            Yii::$app->session->remove('intento_resolucion_actual');
            return $this->redirect(['final-cuestionario', 'id'=>$cuestionario]);
        }
        
        Yii::$app->session->set('preguntaActual', ++$sesionPreguntaActual);



        return $this->redirect(['realizar-cuestionario', 'id'=>$cuestionario]);
    }
    
    public function actionFinalCuestionario($id){
        $managerCuestionarios = Yii::$container->get(CuestionarioService::class);
        /** @var CuestionarioService $managerCuestionarios */
        $cuestionario = Cuestionario::findOne($id);

        $respuestaManager = $managerCuestionarios->consultarTutor(Yii::$app->user->identity, $cuestionario);

        Yii::$app->session->remove('preguntaActual');
        Yii::$app->session->remove('intento_resolucion_actual');

        return $this->render('final-cuestionario', 
                [
                    'respuestaManager'=>$respuestaManager
                ]);
    }

}
