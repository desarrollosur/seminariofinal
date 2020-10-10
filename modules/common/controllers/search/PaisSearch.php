<?php

namespace app\modules\common\controllers\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Pais;

/**
* PaisSearch represents the model behind the search form about `app\models\Pais`.
*/
class PaisSearch extends Pais
{
/**
* @inheritdoc
*/
public function rules()
{
return [
[['id', 'activo', 'creado_porid', 'actualizado_porid', 'version'], 'integer'],
            [['descripcion', 'fecha_creacion', 'fecha_actualizacion'], 'safe'],
];
}

/**
* @inheritdoc
*/
public function scenarios()
{
// bypass scenarios() implementation in the parent class
return Model::scenarios();
}

/**
* Creates data provider instance with search query applied
*
* @param array $params
*
* @return ActiveDataProvider
*/
public function search($params)
{
$query = Pais::find();

$dataProvider = new ActiveDataProvider([
'query' => $query,
]);

$this->load($params);

if (!$this->validate()) {
// uncomment the following line if you do not want to any records when validation fails
// $query->where('0=1');
return $dataProvider;
}

$query->andFilterWhere([
            'id' => $this->id,
            'activo' => $this->activo,
            'fecha_creacion' => $this->fecha_creacion,
            'fecha_actualizacion' => $this->fecha_actualizacion,
            'creado_porid' => $this->creado_porid,
            'actualizado_porid' => $this->actualizado_porid,
            'version' => $this->version,
        ]);

        $query->andFilterWhere(['ilike', 'descripcion', $this->descripcion]);

return $dataProvider;
}
}