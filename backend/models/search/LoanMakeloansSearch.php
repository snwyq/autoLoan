<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\LoanMakeloans;

/**
 * LoanMakeloansSearch represents the model behind the search form about `common\models\LoanMakeloans`.
 */
class LoanMakeloansSearch extends LoanMakeloans
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'customer_id', 'loan_id', 'money_channel_id', 'money_channel_product_id', 'give_money_time', 'loan_money', 'loan_term_id', 'loan_period_id', 'loan_rate_type_id', 'loan_pay_type_id', 'fixed_day', 'loan_start_time', 'loan_end_time', 'first_pay_date', 'order', 'status', 'created_by', 'created_at', 'updated_at'], 'integer'],
            [['loan_money_rate'], 'number'],
            [['remark'], 'safe'],
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
        $query = LoanMakeloans::find();

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
            'loan_id' => $this->loan_id,
            'money_channel_id' => $this->money_channel_id,
            'money_channel_product_id' => $this->money_channel_product_id,
            'give_money_time' => $this->give_money_time,
            'loan_money' => $this->loan_money,
            'loan_term_id' => $this->loan_term_id,
            'loan_period_id' => $this->loan_period_id,
            'loan_money_rate' => $this->loan_money_rate,
            'loan_rate_type_id' => $this->loan_rate_type_id,
            'loan_pay_type_id' => $this->loan_pay_type_id,
            'fixed_day' => $this->fixed_day,
            'loan_start_time' => $this->loan_start_time,
            'loan_end_time' => $this->loan_end_time,
            'first_pay_date' => $this->first_pay_date,
            'order' => $this->order,
            'status' => $this->status,
            'created_by' => $this->created_by,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'remark', $this->remark]);

        return $dataProvider;
    }
}
