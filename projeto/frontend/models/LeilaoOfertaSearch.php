<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\LeilaoOferta;

/**
 * LeilaoOfertaSearch represents the model behind the search form of `common\models\LeilaoOferta`.
 */
class LeilaoOfertaSearch extends LeilaoOferta
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'idleilao', 'iduser'], 'integer'],
            [['dataoferta'], 'safe'],
            [['montante'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = LeilaoOferta::find();

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
            'idleilao' => $this->idleilao,
            'iduser' => $this->iduser,
            'dataoferta' => $this->dataoferta,
            'montante' => $this->montante,
        ]);

        return $dataProvider;
    }
}
