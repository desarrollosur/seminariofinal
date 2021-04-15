<?php

namespace app\business\services;

use app\business\interfaces\IServicioTutorIA;
use app\models\Cuestionario;
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
        
        $parametros = Json::decode($paramEjemplo);
        $consultaTutor = (string)$this->cliente->post('http://flask:5000/predict', ['json'=>$parametros])->getBody();
        Yii::error($consultaTutor);
        return $consultaTutor;
    }
    
    private function extraerParametrosDeCuestionario(User $usuarioActual, Cuestionario $cuestionario){
        
    }

}
