<?php

namespace app\models;

use app\business\interfaces\IServicioTutorIA;
use app\models\base\Cuestionario as BaseCuestionario;
use bedezign\yii2\audit\AuditTrailBehavior;
use yii\behaviors\OptimisticLockBehavior;
use yii\helpers\ArrayHelper;
/**
 * This is the model class for table "cuestionario".
 */
class Cuestionario extends BaseCuestionario
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

    public function debeContinuarRespondiendo(IServicioTutorIA $tutor): boolean {

    }
}
