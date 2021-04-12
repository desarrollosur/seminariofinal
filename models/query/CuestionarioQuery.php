<?php

namespace app\models\query;

/**
 * This is the ActiveQuery class for [[\app\models\Cuestionario]].
 *
 * @see \app\models\Cuestionario
 */
class CuestionarioQuery extends \yii\db\ActiveQuery
{
    public function active()
    {
        $this->andWhere('[[activo]]=1');
        return $this;
    }

    /**
     * @inheritdoc
     * @return \app\models\Cuestionario[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \app\models\Cuestionario|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
