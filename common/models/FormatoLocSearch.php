<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\FormatoLoc;

/**
 * FormatoLocSearch represents the model behind the search form of `common\models\FormatoLoc`.
 */
class FormatoLocSearch extends FormatoLoc
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'region_id', 'mun_id', 'loc_id', 'num_habitantes', 'ocupantes_por_vivienda', 'status', 'created_by', 'updated_by'], 'integer'],
            [['indice_marginacion', 'indentificacion_hogares', 'calidad_vivienda', 'serv_basicos', 'acceso_edu', 'salud', 'seguridad_social', 'ingresos', 'alimentacion', 'vinculacion', 'acceso_terrestre', 'created_at', 'updated_at'], 'safe'],
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
        $query = FormatoLoc::find();

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
            'region_id' => $this->region_id,
            'mun_id' => $this->mun_id,
            'loc_id' => $this->loc_id,
            'num_habitantes' => $this->num_habitantes,
            'ocupantes_por_vivienda' => $this->ocupantes_por_vivienda,
            'status' => $this->status,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'indice_marginacion', $this->indice_marginacion])
            ->andFilterWhere(['like', 'indentificacion_hogares', $this->indentificacion_hogares])
            ->andFilterWhere(['like', 'calidad_vivienda', $this->calidad_vivienda])
            ->andFilterWhere(['like', 'serv_basicos', $this->serv_basicos])
            ->andFilterWhere(['like', 'acceso_edu', $this->acceso_edu])
            ->andFilterWhere(['like', 'salud', $this->salud])
            ->andFilterWhere(['like', 'seguridad_social', $this->seguridad_social])
            ->andFilterWhere(['like', 'ingresos', $this->ingresos])
            ->andFilterWhere(['like', 'alimentacion', $this->alimentacion])
            ->andFilterWhere(['like', 'vinculacion', $this->vinculacion])
            ->andFilterWhere(['like', 'acceso_terrestre', $this->acceso_terrestre]);

        return $dataProvider;
    }
}
