<?php

namespace app\models;

use Yii;
use \app\models\base\Assignment as BaseAssignment;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "auth_assignment".
 */
class Assignment extends BaseAssignment
{

    public function behaviors()
    {
        return ArrayHelper::merge(
            parent::behaviors(),
            [
                # custom behaviors
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
}
