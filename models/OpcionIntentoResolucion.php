<?php

namespace app\models;

use app\models\base\OpcionIntentoResolucion as BaseOpcionIntentoResolucion;
use bedezign\yii2\audit\AuditTrailBehavior;
use Yii;
use yii\behaviors\OptimisticLockBehavior;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "opcion_intento_resolucion".
 */
class OpcionIntentoResolucion extends BaseOpcionIntentoResolucion
{

    public function behaviors()
    {
        return ArrayHelper::merge(
            parent::behaviors(),
            [
                OptimisticLockBehavior::class,
                AuditTrailBehavior::class
            ]
        );
    }

    public function rules()
    {
        return ArrayHelper::merge(
            parent::rules(),
            [
                # custom validation rules
            ]
        );
    }
    
    public function optimisticLock(): string {
        return 'version';
    }      
}
