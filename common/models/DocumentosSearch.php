<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Documentos;

/**
 * DocumentosSearch represents the model behind the search form of `common\models\Documentos`.
 */
class DocumentosSearch extends Documentos
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'solicitante_id', 'periodo', 'entidad_id', 'region_id', 'mun_id', 'loc_id', 'status', 'created_by', 'updated_by'], 'integer'],
            [['documento', 'foto', 'created_at', 'updated_at'], 'safe'],
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
        $query = Documentos::find();

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
            'solicitante_id' => $this->solicitante_id,
            'periodo' => $this->periodo,
            'entidad_id' => $this->entidad_id,
            'region_id' => $this->region_id,
            'mun_id' => $this->mun_id,
            'loc_id' => $this->loc_id,
            'status' => $this->status,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'documento', $this->documento])
            ->andFilterWhere(['like', 'foto', $this->foto]);

        return $dataProvider;
    }
}
