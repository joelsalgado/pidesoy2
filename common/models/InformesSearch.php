<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Informes;

/**
 * InformesSearch represents the model behind the search form of `common\models\Informes`.
 */
class InformesSearch extends Informes
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'entidad_id', 'region_id', 'mun_id', 'loc_id', 'cantidad', 'actividad_id', 'personas_beneficiadas', 'status', 'created_by', 'updated_by', 'created_at', 'updated_at'], 'integer'],
            [['fecha', 'descripcion'], 'safe'],
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
        $query = Informes::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'entidad_id' => $this->entidad_id,
            'region_id' => $this->region_id,
            'mun_id' => $this->mun_id,
            'loc_id' => $this->loc_id,
            'fecha' => $this->fecha,
            'cantidad' => $this->cantidad,
            'actividad_id' => $this->actividad_id,
            'personas_beneficiadas' => $this->personas_beneficiadas,
            'status' => $this->status,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'descripcion', $this->descripcion]);

        return $dataProvider;
    }
}
