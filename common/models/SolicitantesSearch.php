<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Solicitantes;

/**
 * SolicitantesSearch represents the model behind the search form of `common\models\Solicitantes`.
 */
class SolicitantesSearch extends Solicitantes
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'periodo', 'entidad_id', 'region_id', 'mun_id', 'loc_id', 'edo_civil_id', 'edad', 'codigo_postal', 'otra_referencia', 'status', 'created_by', 'updated_by'], 'integer'],
            [['nombre', 'apellido_paterno', 'apellido_materno', 'fecha_nacimiento', 'sexo', 'telefono', 'calle', 'colonia', 'num_ext', 'num_int', 'created_at', 'updated_at'], 'safe'],
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
        $query = Solicitantes::find();

        // add conditions that should always apply here
        if (Yii::$app->user->identity->role != 30){
            $region = Yii::$app->user->identity->region_id;
            $query->where(['region_id' => $region]);
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
            'periodo' => $this->periodo,
            'entidad_id' => $this->entidad_id,
            'region_id' => $this->region_id,
            'mun_id' => $this->mun_id,
            'loc_id' => $this->loc_id,
            'edo_civil_id' => $this->edo_civil_id,
            'fecha_nacimiento' => $this->fecha_nacimiento,
            'edad' => $this->edad,
            'codigo_postal' => $this->codigo_postal,
            'otra_referencia' => $this->otra_referencia,
            'status' => $this->status,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'apellido_paterno', $this->apellido_paterno])
            ->andFilterWhere(['like', 'apellido_materno', $this->apellido_materno])
            ->andFilterWhere(['like', 'sexo', $this->sexo])
            ->andFilterWhere(['like', 'telefono', $this->telefono])
            ->andFilterWhere(['like', 'calle', $this->calle])
            ->andFilterWhere(['like', 'colonia', $this->colonia])
            ->andFilterWhere(['like', 'num_ext', $this->num_ext])
            ->andFilterWhere(['like', 'num_int', $this->num_int]);

        return $dataProvider;
    }
}
