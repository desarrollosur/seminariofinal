<?php

namespace app\models\query;

/**
 * This is the ActiveQuery class for [[\app\models\IntentoResolucion]].
 *
 * @see \app\models\IntentoResolucion
 */
class IntentoResolucionQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return \app\models\IntentoResolucion[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \app\models\IntentoResolucion|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
