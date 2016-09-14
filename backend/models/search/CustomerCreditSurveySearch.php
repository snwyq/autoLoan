<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\CustomerCreditSurvey;

/**
 * CustomerCreditSurveySearch represents the model behind the search form about `common\models\CustomerCreditSurvey`.
 */
class CustomerCreditSurveySearch extends CustomerCreditSurvey
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'apply_id', 'suvey_by', 'customer_id', 'oldcustomer_flag', 'overdue_flag', 'auto_work_year_id', 'family_net_assets', 'total_liabilities', 'from_other_biz_money', 'month_sales_amount', 'month_stock_num', 'growth_in_sales', 'turnover_days', 'turnover_days_min', 'forecasts_growth', 'is_Lease_contract_flag', 'industry_experience_flag', 'second_hand_car_experience_flag', 'bad_credit_flag', 'cars_stop_number', 'order', 'status', 'created_at', 'updated_at'], 'integer'],
            [['card_address', 'live_desp', 'credit_desp', 'biz_desp', 'financing_purpose', 'other_purpose', 'investigation', 'remark'], 'safe'],
            [['sales_profit'], 'number'],
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
        $query = CustomerCreditSurvey::find();

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
            'apply_id' => $this->apply_id,
            'suvey_by' => $this->suvey_by,
            'customer_id' => $this->customer_id,
            'oldcustomer_flag' => $this->oldcustomer_flag,
            'overdue_flag' => $this->overdue_flag,
            'auto_work_year_id' => $this->auto_work_year_id,
            'family_net_assets' => $this->family_net_assets,
            'total_liabilities' => $this->total_liabilities,
            'from_other_biz_money' => $this->from_other_biz_money,
            'month_sales_amount' => $this->month_sales_amount,
            'month_stock_num' => $this->month_stock_num,
            'growth_in_sales' => $this->growth_in_sales,
            'sales_profit' => $this->sales_profit,
            'turnover_days' => $this->turnover_days,
            'turnover_days_min' => $this->turnover_days_min,
            'forecasts_growth' => $this->forecasts_growth,
            'is_Lease_contract_flag' => $this->is_Lease_contract_flag,
            'industry_experience_flag' => $this->industry_experience_flag,
            'second_hand_car_experience_flag' => $this->second_hand_car_experience_flag,
            'bad_credit_flag' => $this->bad_credit_flag,
            'cars_stop_number' => $this->cars_stop_number,
            'order' => $this->order,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'card_address', $this->card_address])
            ->andFilterWhere(['like', 'live_desp', $this->live_desp])
            ->andFilterWhere(['like', 'credit_desp', $this->credit_desp])
            ->andFilterWhere(['like', 'biz_desp', $this->biz_desp])
            ->andFilterWhere(['like', 'financing_purpose', $this->financing_purpose])
            ->andFilterWhere(['like', 'other_purpose', $this->other_purpose])
            ->andFilterWhere(['like', 'investigation', $this->investigation])
            ->andFilterWhere(['like', 'remark', $this->remark]);

        return $dataProvider;
    }
}
