<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\ProductMoneyChannelProduct;

/**
 * ProductMoneyChannelProductSearch represents the model behind the search form about `common\models\ProductMoneyChannelProduct`.
 */
class ProductMoneyChannelProductSearch extends ProductMoneyChannelProduct
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'money_channel_id', 'product_class_id', 'rate_type', 'fixed_day', 'status', 'fine_grace_days', 'inerest_type', 'money_type_id', 'order', 'created_at', 'updated_at'], 'integer'],
            [['code', 'name', 'name_alias', 'pay_period_var', 'pay_type_var', 'description'], 'safe'],
            [['cost_rate_day', 'cost_rate_month', 'cost_rate_year', 'sale_rate_day', 'sale_rate_month', 'sale_rate_year', 'max_rate_add', 'min_rate_add', 'fine_coefficient'], 'number'],
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
        $query = ProductMoneyChannelProduct::find();

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
            'money_channel_id' => $this->money_channel_id,
            'product_class_id' => $this->product_class_id,
            'cost_rate_day' => $this->cost_rate_day,
            'cost_rate_month' => $this->cost_rate_month,
            'cost_rate_year' => $this->cost_rate_year,
            'sale_rate_day' => $this->sale_rate_day,
            'sale_rate_month' => $this->sale_rate_month,
            'sale_rate_year' => $this->sale_rate_year,
            'max_rate_add' => $this->max_rate_add,
            'min_rate_add' => $this->min_rate_add,
            'rate_type' => $this->rate_type,
            'fixed_day' => $this->fixed_day,
            'status' => $this->status,
            'fine_grace_days' => $this->fine_grace_days,
            'fine_coefficient' => $this->fine_coefficient,
            'inerest_type' => $this->inerest_type,
            'money_type_id' => $this->money_type_id,
            'order' => $this->order,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'code', $this->code])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'name_alias', $this->name_alias])
            ->andFilterWhere(['like', 'pay_period_var', $this->pay_period_var])
            ->andFilterWhere(['like', 'pay_type_var', $this->pay_type_var])
            ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
