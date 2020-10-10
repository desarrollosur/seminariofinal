<?php

namespace app\models\query;

/**
 * This is the ActiveQuery class for [[\app\models\TipoDni]].
 *
 * @see \app\models\TipoDni
 */
class TipoDniQuery extends \yii\db\ActiveQuery
{
    public function activo()
    {
        $this->andWhere('[[activo]]=1');
        return $this;
    }

    /**
     * @inheritdoc
     * @return \app\models\TipoDni[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \app\models\TipoDni|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
