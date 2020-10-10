<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\widgets\persona;

/**
 * Description of PersonaFormWidget
 *
 * @author mariano
 */
class PersonaFormWidget extends \yii\bootstrap\Widget{
    
    public $model;
    public function run(): string {
        return $this->render('_form', ['model'=>$this->model]);
    }
}
