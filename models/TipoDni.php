<?php

namespace app\models;

use app\models\base\TipoDni as BaseTipoDni;
use bedezign\yii2\audit\AuditTrailBehavior;
use yii\behaviors\OptimisticLockBehavior;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "tipo_dni".
 */
class TipoDni extends BaseTipoDni
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
                # custom validation rules
            ]
        );
    }
    public function optimisticLock(): string {
        return 'version';
    }      
}
