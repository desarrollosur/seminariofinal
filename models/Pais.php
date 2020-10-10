<?php

namespace app\models;

use app\models\base\Pais as BasePais;
use bedezign\yii2\audit\AuditTrailBehavior;
use yii\behaviors\OptimisticLockBehavior;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "pais".
 */
class Pais extends BasePais
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
