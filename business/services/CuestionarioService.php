<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\business\services;

use app\business\interfaces\IServicioTutorIA;

/**
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
    
    public function iniciarCuestionario(){
        
    }
    public function persistirRespuesta(){
        
    }
}
