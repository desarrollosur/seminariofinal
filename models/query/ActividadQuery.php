<?php

namespace app\models\query;

/**
 * This is the ActiveQuery class for [[\app\models\Actividad]].
 *
 * @see \app\models\Actividad
 */
class ActividadQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return \app\models\Actividad[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \app\models\Actividad|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
