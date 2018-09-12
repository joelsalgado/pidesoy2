<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * ActividadesRelevantesSearch represents the model behind the search form of `common\models\ActividadesRelevantes`.
 */
class DIrectorioResponsablesSearch extends DirectorioResponsables
{
    public function rules()
    {
        return [
            [['id', 'entidad_id', 'region_id', 'mun_id1', 'loc_id1'], 'integer'],
            [['nombre', 'apellido_paterno', 'apellido_materno'], 'safe'],
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

    public function search($params)
    {
        $query = DirectorioResponsables::find()->where(['status' => 1]);

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
            'mun_id1' => $this->mun_id1,
            'loc_id1' => $this->loc_id1,
        ]);

        $query->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'apellido_paterno', $this->apellido_paterno])
            ->andFilterWhere(['like', 'apellido_materno', $this->apellido_materno]);

        return $dataProvider;
    }
}