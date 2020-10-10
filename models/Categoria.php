<?php

namespace app\models;

use Yii;
use \app\models\base\Categoria as BaseCategoria;
use bedezign\yii2\audit\AuditTrailBehavior;
use yii\behaviors\OptimisticLockBehavior;
use yii\helpers\ArrayHelper;
/**
 * This is the model class for table "categoria".
 */
class Categoria extends BaseCategoria
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
