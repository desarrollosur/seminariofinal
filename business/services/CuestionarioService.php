<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\business\services;

use app\business\interfaces\IServicioTutorIA;
use app\models\Cuestionario;
use app\models\User;

/**
 * @property IServicioTutorIA $tutor servicio de tutor IA
 * Description of CuestionarioService
 *
 * @author mariano
 */
class CuestionarioService {
    protected $tutor;
    //put your code here
    
    public function __construct(IServicioTutorIA $tutor) {
        $this->tutor = $tutor;
    }
    
    public function consultarTutor(User $usuarioActual, Cuestionario $cuestionario) {
        return $this->tutor->consultarTutorUsuarioCuestionario($usuarioActual, $cuestionario);
    }
    
    public function iniciarCuestionario(){
        
    }
    public function persistirRespuesta(){
        
    }
}
