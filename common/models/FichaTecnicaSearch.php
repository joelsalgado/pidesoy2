<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\FichaTecnica;

/**
 * FichaTecnicaSearch represents the model behind the search form of `common\models\FichaTecnica`.
 */
class FichaTecnicaSearch extends FichaTecnica
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'entidad_id', 'region_id', 'mun_id', 'loc_id', 'acceso_facil', 'cedulas_aplicadas', 'habitantes', 'ocupantes', 'campesinos', 'obreros', 'albañiles', 'amas', 'empleados', 'otros', 'de1a3', 'de3a5', 'de5mas', 'catolica', 'testigos', 'evangelistas', 'cristiana', 'otra', 'status', 'created_by', 'updated_by', 'created_at', 'updated_at'], 'integer'],
            [['fecha', 'indicaciones', 'tipo_acceso', 'estado', 'tiempo', 'indice_marginacion', 'indice_desarrollo_humano', 'cual1', 'cual2'], 'safe'],
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
        $query = FichaTecnica::find();

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
            'acceso_facil' => $this->acceso_facil,
            'cedulas_aplicadas' => $this->cedulas_aplicadas,
            'habitantes' => $this->habitantes,
            'ocupantes' => $this->ocupantes,
            'campesinos' => $this->campesinos,
            'obreros' => $this->obreros,
            'albañiles' => $this->albañiles,
            'amas' => $this->amas,
            'empleados' => $this->empleados,
            'otros' => $this->otros,
            'de1a3' => $this->de1a3,
            'de3a5' => $this->de3a5,
            'de5mas' => $this->de5mas,
            'catolica' => $this->catolica,
            'testigos' => $this->testigos,
            'evangelistas' => $this->evangelistas,
            'cristiana' => $this->cristiana,
            'otra' => $this->otra,
            'status' => $this->status,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'indicaciones', $this->indicaciones])
            ->andFilterWhere(['like', 'tipo_acceso', $this->tipo_acceso])
            ->andFilterWhere(['like', 'estado', $this->estado])
            ->andFilterWhere(['like', 'tiempo', $this->tiempo])
            ->andFilterWhere(['like', 'indice_marginacion', $this->indice_marginacion])
            ->andFilterWhere(['like', 'indice_desarrollo_humano', $this->indice_desarrollo_humano])
            ->andFilterWhere(['like', 'cual1', $this->cual1])
            ->andFilterWhere(['like', 'cual2', $this->cual2]);

        return $dataProvider;
    }
}
