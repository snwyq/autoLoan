<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\CustomerCreditDetail;

/**
 * CustomerCreditDetailSearch represents the model behind the search form about `common\models\CustomerCreditDetail`.
 */
class CustomerCreditDetailSearch extends CustomerCreditDetail
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'customer_id', 'money_channel_id', 'credit_money', 'product_class_main_money', 'product_class_part_money', 'directional_credit_money', 'immediately_credit_money', 'single_credit_money', 'supervision_mode', 'credit_period', 'combination_rate', 'start_time', 'end_time', 'order', 'status', 'created_at', 'updated_at', 'created_by'], 'integer'],
            [['credit_rating', 'inter_loan_limit', 'condition', 'description'], 'safe'],
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
        $query = CustomerCreditDetail::find();

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
            'money_channel_id' => $this->money_channel_id,
            'credit_money' => $this->credit_money,
            'product_class_main_money' => $this->product_class_main_money,
            'product_class_part_money' => $this->product_class_part_money,
            'directional_credit_money' => $this->directional_credit_money,
            'immediately_credit_money' => $this->immediately_credit_money,
            'single_credit_money' => $this->single_credit_money,
            'supervision_mode' => $this->supervision_mode,
            'credit_period' => $this->credit_period,
            'combination_rate' => $this->combination_rate,
            'start_time' => $this->start_time,
            'end_time' => $this->end_time,
            'order' => $this->order,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => $this->created_by,
        ]);

        $query->andFilterWhere(['like', 'credit_rating', $this->credit_rating])
            ->andFilterWhere(['like', 'inter_loan_limit', $this->inter_loan_limit])
            ->andFilterWhere(['like', 'condition', $this->condition])
            ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
