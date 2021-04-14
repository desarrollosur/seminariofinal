<?php

namespace app\business\services;

use app\business\interfaces\IServicioTutorIA;
use app\models\Cuestionario;
use app\models\User;
use GuzzleHttp\Client;
use Yii;

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
        $consultaTutor = (string) $this->cliente->get('http://flask:5000')->getBody();
        Yii::error($consultaTutor);
        return $consultaTutor;
    }

}
