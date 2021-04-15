<?php

namespace app\business\services;

use app\business\interfaces\IServicioTutorIA;
use app\models\Cuestionario;
use app\models\IntentoResolucion;
use app\models\User;
use GuzzleHttp\Client;
use Yii;
use yii\helpers\Json;

/**
 * @property Client $cliente cliente guzzle
 * Description of TutorIAService
 *
 * @author mariano
 */
class TutorIAService implements IServicioTutorIA{
    protected $cliente;
    
    public function __construct(Client $cliente) {
        $this->cliente = $cliente;
    }
    //put your code here
    public function consultarTutorUsuarioCuestionario(User $usuarioActual, Cuestionario $cuestionario) {
        
        $paramEjemplo = <<<EOL
                {
                "order_id": [1, 2, 3, 4, 5, 6, 7, 8],
                "user_id": [1, 1, 1, 1, 1, 1, 1, 1],
                "skill_name": [
                    "Calculate part in proportion with fractions",
                    "Calculate part in proportion with fractions",
                    "Calculate part in proportion with fractions",
                    "Calculate part in proportion with fractions",
                    "Calculate part in proportion with fractions",
                    "Calculate part in proportion with fractions",
                    "Calculate part in proportion with fractions",
                    "Calculate part in proportion with fractions"
                    ],
                "correct": [1,1,1,0,1,1,1,1]
                }
        EOL;
        
        //$parametros = Json::decode($paramEjemplo);
        $parametros = $this->extraerParametrosDeCuestionario($usuarioActual, $cuestionario);
        $consultaTutor = (string)$this->cliente->post('http://flask:5000/predict', ['json'=>$parametros])->getBody();
        Yii::error($consultaTutor);
        return Json::decode($consultaTutor);
    }
    
    private function extraerParametrosDeCuestionario(User $usuarioActual, Cuestionario $cuestionario){
        $intento = IntentoResolucion::find()->where(['cuestionarioid'=>$cuestionario->id, 'userid'=>$usuarioActual->id])->orderBy("fecha_creacion DESC")->one();
        if(!$intento)
            throw new Exception ('No existe el intento para el cuestionario y usuario');
        
        $contador = 0;
        $skill_name = "Calculate part in proportion with fractions";
        $userid = $usuarioActual->id;
        $order_id = [];
        $correct = [];
        $parametros = [
            'order_id'=>[],
            'user_id'=>[],
            'skill_name'=>[],
            'correct'=>[]
        ];
        
        foreach($intento->opcionIntentoResolucions as $opcion)
        {
           $parametros['order_id'][$contador] = $opcion->id; 
           $parametros['user_id'][$contador] = $userid; 
           $parametros['skill_name'][$contador] = $skill_name; 
           $parametros['correct'][$contador] = $opcion->actividadOpcion->opcion_correcta?1:0; 
           $contador++;
        }
        
        return $parametros;
    }

}
