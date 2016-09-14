<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\CompanyTradeCondition;

/**
 * CompanyTradeConditionSearch represents the model behind the search form about `common\models\CompanyTradeCondition`.
 */
class CompanyTradeConditionSearch extends CompanyTradeCondition
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'customer_id', 'year', 'month', 'trade_count', 'trade_money', 'trade_profit_margin', 'sell_num', 'sell_money', 'stock_money', 'order', 'status', 'created_at', 'updated_at'], 'integer'],
            [['trade_cost'], 'number'],
            [['sell_condition', 'buy_condition', 'remark'], 'safe'],
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
        $query = CompanyTradeCondition::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => [
                    'id' => SORT_DESC
                ]
            ]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'customer_id' => $this->customer_id,
            'year' => $this->year,
            'month' => $this->month,
            'trade_count' => $this->trade_count,
            'trade_money' => $this->trade_money,
            'trade_cost' => $this->trade_cost,
            'trade_profit_margin' => $this->trade_profit_margin,
            'sell_num' => $this->sell_num,
            'sell_money' => $this->sell_money,
            'stock_money' => $this->stock_money,
            'order' => $this->order,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'sell_condition', $this->sell_condition])
            ->andFilterWhere(['like', 'buy_condition', $this->buy_condition])
            ->andFilterWhere(['like', 'remark', $this->remark]);

        return $dataProvider;
    }
}
