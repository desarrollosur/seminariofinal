<?php

namespace app\models\query;

/**
 * This is the ActiveQuery class for [[\app\models\Subcategoria]].
 *
 * @see \app\models\Subcategoria
 */
class SubcategoriaQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return \app\models\Subcategoria[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \app\models\Subcategoria|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
