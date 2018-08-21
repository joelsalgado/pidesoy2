<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * SolicitantesSearch represents the model behind the search form of `common\models\Solicitantes`.
 */
class BitacoraFamiliaSearch extends BitacoraFamilia
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'entidad_id', 'region_id', 'mun_id', 'loc_id'], 'integer'],
            [['fecha'], 'safe'],
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
        $query = BitacoraFamilia::find()->where(['status' => 1]);

        // add conditions that should always apply here
        if (Yii::$app->user->identity->role == 10 || Yii::$app->user->identity->role == 20){
            $region = Yii::$app->user->identity->region_id;
            $query->andWhere(['region_id' => $region]);
        }
        $query->orderBy(['id' => SORT_DESC]);

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
            'fecha' => $this->fecha
        ]);

        return $dataProvider;
    }
}
