<?php

namespace app\models;

use app\models\base\Persona as BasePersona;
use bedezign\yii2\audit\AuditTrailBehavior;
use yii\behaviors\OptimisticLockBehavior;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "persona".
 */
class Persona extends BasePersona
{

    public function behaviors()
    {
        return ArrayHelper::merge(
            parent::behaviors(),
            [
                OptimisticLockBehavior::class,
                AuditTrailBehavior::class,                    ]
        );
    }

    public function rules()
    {
        return ArrayHelper::merge(
            parent::rules(),
            [
                ['xfecha_nacimiento', 'safe']
            ]
        );
    }
    public function optimisticLock(): string {
        return 'version';
    }
    
    public function getApellidoYNombre(): string {
        return $this->apellido.', '.$this->nombre;
    }
    
    public function getXfecha_nacimiento() {
        if (!empty($this->fecha_nacimiento) && $valor = \DateTime::createFromFormat("Y-m-d", $this->fecha_nacimiento)) {
            return $valor->format('d/m/Y');
        } else {
            return $this->fecha_nacimiento;
        }
    }

    public function setXfecha_nacimiento($value) {
        if (!empty($value) && $valor = \DateTime::createFromFormat("d/m/Y", $value)) {
            $this->fecha_nacimiento = $valor->format('Y-m-d');
        } else
            $this->fecha_nacimiento = $value;
    }    
    
}
