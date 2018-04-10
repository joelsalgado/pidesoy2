<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\ActividadesRelevantes;

/**
 * ActividadesRelevantesSearch represents the model behind the search form of `common\models\ActividadesRelevantes`.
 */
class ActividadesRelevantesSearch extends ActividadesRelevantes
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'region_id', 'mun_id', 'loc_id', 'obra_comunitaria', 'status', 'created_by', 'updated_by'], 'integer'],
            [['fecha', 'descripcion', 'created_at', 'updated_at'], 'safe'],
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
        $query = ActividadesRelevantes::find()->where(['status' => 1]);

        // add conditions that should always apply here
        if (Yii::$app->user->identity->role != 30){
            $region = Yii::$app->user->identity->region_id;
            $query->andWhere(['region_id' => $region]);
        }

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
            'region_id' => $this->region_id,
            'mun_id' => $this->mun_id,
            'loc_id' => $this->loc_id,
            'obra_comunitaria' => $this->obra_comunitaria,
            'fecha' => $this->fecha,
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
