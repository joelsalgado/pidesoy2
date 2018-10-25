<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\MinutaLocalidades;

/**
 * MinutaAutoridadesSearch represents the model behind the search form of `common\models\MinutaAutoridades`.
 */
class MinutaLocalidadesSearch extends MinutaLocalidades
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'entidad_id', 'region_id', 'mun_id', 'loc_id', 'status', 'created_by', 'updated_by', 'created_at', 'updated_at'], 'integer'],
            [['mes', 'periodo', 'fecha', 'minuta', 'lista'], 'safe'],
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
        $query = MinutaLocalidades::find();

        // add conditions that should always apply here
        if (Yii::$app->user->identity->role == 10 || Yii::$app->user->identity->role == 20){
            $region = Yii::$app->user->identity->region_id;
            $query->andWhere(['region_id' => $region]);
        }
        $query->orderBy(['fecha' => SORT_DESC]);

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
            'status' => $this->status,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'mes', $this->mes])
            ->andFilterWhere(['like', 'periodo', $this->periodo])
            ->andFilterWhere(['like', 'minuta', $this->minuta])
            ->andFilterWhere(['like', 'lista', $this->lista]);

        return $dataProvider;
    }
}
