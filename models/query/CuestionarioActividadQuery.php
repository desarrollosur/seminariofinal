<?php

namespace app\models\query;

/**
 * This is the ActiveQuery class for [[\app\models\CuestionarioActividad]].
 *
 * @see \app\models\CuestionarioActividad
 */
class CuestionarioActividadQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return \app\models\CuestionarioActividad[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \app\models\CuestionarioActividad|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
