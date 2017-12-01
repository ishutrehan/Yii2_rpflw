<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Sales;

/**
 * SalesSearch represents the model behind the search form about `app\models\Sales`.
 */
class SalesSearch extends Sales
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['order_date', 'firstname', 'lastname', 'jobnumber', 'products_sold', 'commission_amt', 'status', 'finalize_date', 'note'], 'safe'],
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
        $query = Sales::find();

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
        ]);

        $query->andFilterWhere(['like', 'order_date', $this->order_date])
            ->andFilterWhere(['like', 'firstname', $this->firstname])
            ->andFilterWhere(['like', 'lastname', $this->lastname])
            ->andFilterWhere(['like', 'jobnumber', $this->jobnumber])
            ->andFilterWhere(['like', 'products_sold', $this->products_sold])
            ->andFilterWhere(['like', 'commission_amt', $this->commission_amt])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'finalize_date', $this->finalize_date])
            ->andFilterWhere(['like', 'note', $this->note]);

        return $dataProvider;
    }
}
