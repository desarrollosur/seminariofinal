<?php

namespace app\modules\api\controllers;

use yii\rest\Controller;
use yii\helpers\Json;
use Yii;
use yii\base\Exception;
use yii\web\HttpException;
use yii\web\UploadedFile;

class EventoController extends Controller {

    /**
     * @inheritdoc
     */
    public function behaviors() {

        $behaviors = parent::behaviors();     
        $behaviors['access'] = [
            'class' => \yii\filters\AccessControl::className(),
            'only' => ['*'],
            'rules' => [
                [
                    'allow' => true,
                    'roles' => ['@'],
                ]
            ]
        ];
        return $behaviors;
    }
    
    public function actionIndex() {
        $servicioid = Yii::$app->request->get('s');
        $medicoid = Yii::$app->request->get('m');
        Yii::error('servicio:'.$servicioid);
        Yii::error('medico:'.$medicoid);
        if(!$medicoid || !$servicioid){
            return [];
        }
        
        $turnos = \app\models\Turno::find()->where([
            'servicioid'=>$servicioid,
            'medicoid'=>$medicoid,
            'activo'=>1
        ])->all();
        $resultadoTurnos = \yii\helpers\ArrayHelper::toArray($turnos, [
                                            \app\models\Turno::class=>[
                                                'title' => function(\app\models\Turno $t){
                                                            return $t->paciente->persona->apellido;
                                                            },
                                                'start' => function(\app\models\Turno $t){
                                                            return $t->fechahora_desde;
                                                            },
                                                'adicionales'=>function(\app\models\Turno $t){
                                                                return $t->toArray();
                                                            }
                                            ]
                           ]);
        return $resultadoTurnos;
       
    }
    
    public function actionGuardarCambios(){
        if(!$datosPost = Yii::$app->request->post()){
            throw new HttpException(500, 'No se recibieron los parámetros');
        }
        if($datosPost['eventoid']){
            $turno = \app\models\Turno::findOne($datosPost['eventoid']);
        }else{
            $turno = new \app\models\Turno();
        }
        $turno->servicioid = $datosPost['servicioid'];
        $turno->medicoid = $datosPost['medicoid'];
        $turno->obra_socialid = $datosPost['obrasocialid'] ?? null;
        $turno->pacienteid = $datosPost['pacienteid'] ?? null;
        $horario = substr($datosPost['horario'], 0, 2).':'.substr($datosPost['horario'], 2, 2);
        $turno->fechahora_desde = $datosPost['diaseleccionado']. ' '.$horario;
        $turno->fechahora_hasta = $datosPost['diaseleccionado']. ' '.$horario;
        //$turno->version = $datosPost['version'] ?? null;
        $turno->activo = 1;
        if(!$turno->save()){
            Yii::error(\yii\helpers\VarDumper::dumpAsString($turno->errors));
            throw new HttpException(500, 'error al guardar');
        }
        
    }
    
    public function actionMedicoServicioInfo($s = null, $m =null){
        if(!$s || !$m) {
            throw new HttpException(500, 'No se recibió algún parámetro necesario');
        }
        
        $horarios = \app\models\MedicoHorarioServicio::find()->with(['medico', 'medico.persona', 'servicio'])->where(['servicioid'=>$s, 'medicoid'=>$m, 'activo'=>1])->all();
        return \yii\helpers\ArrayHelper::toArray(
                $horarios, [\app\models\MedicoHorarioServicio::class => [
                    'id',
                    'medicoid',
                    'servicioid',
                    'medico'=>function($mhs){
                            return ['medico'=>$mhs->medico, 'persona'=>$mhs->medico->persona];
                    },
                    'servicio',
                    'dia_semana'
                ]]);
        
    }
    
    public function actionCancelarEvento() {
         if(!$datosPost = Yii::$app->request->post()){
            throw new HttpException(500, 'No se recibieron los parámetros');
        }
        if($datosPost['eventoid']){
            $turno = \app\models\Turno::findOne($datosPost['eventoid']);
        }else{
            throw new HttpException(500, 'No existe el evento a cancelar');
        }
        $turno->activo = 0;
        if(!$turno->save()){
            Yii::error(\yii\helpers\VarDumper::dumpAsString($turno->errors));
            throw new HttpException(500, 'error al guardar');
        }        
    }
    
}
