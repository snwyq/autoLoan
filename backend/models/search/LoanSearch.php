<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Loan;

/**
 * LoanSearch represents the model behind the search form about `common\models\Loan`.
 */
class LoanSearch extends Loan
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'customer_id', 'company_id', 'province_id', 'city_id', 'area_id', 'apply_time', 'manager_id', 'money_channel_id', 'money_channel_product_id', 'loan_period_id', 'pay_type_id', 'audit_at', 'audit_by', 'loan_back_time', 'loan_back_status', 'loan_back_by', 'status', 'order', 'created_at', 'updated_at', 'created_by'], 'integer'],
            [['loan_no', 'loan_use_to', 'source_repayment', 'money_in_account', 'money_in_account_name', 'money_in_bank', 'money_in_bank_branch', 'money_back_account', 'money_back_account_name', 'money_back_bank', 'money_back_bank_branch', 'remark', 'audit_remark'], 'safe'],
            [['apply_money', 'audit_money', 'loan_money_rate', 'loan_money_rate_add'], 'number'],
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
        $query = Loan::find();

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
            'company_id' => $this->company_id,
            'province_id' => $this->province_id,
            'city_id' => $this->city_id,
            'area_id' => $this->area_id,
            'apply_time' => $this->apply_time,
            'manager_id' => $this->manager_id,
            'money_channel_id' => $this->money_channel_id,
            'money_channel_product_id' => $this->money_channel_product_id,
            'loan_period_id' => $this->loan_period_id,
            'pay_type_id' => $this->pay_type_id,
            'apply_money' => $this->apply_money,
            'audit_money' => $this->audit_money,
            'loan_money_rate' => $this->loan_money_rate,
            'loan_money_rate_add' => $this->loan_money_rate_add,
            'audit_at' => $this->audit_at,
            'audit_by' => $this->audit_by,
            'loan_back_time' => $this->loan_back_time,
            'loan_back_status' => $this->loan_back_status,
            'loan_back_by' => $this->loan_back_by,
            'status' => $this->status,
            'order' => $this->order,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => $this->created_by,
        ]);

        $query->andFilterWhere(['like', 'loan_no', $this->loan_no])
            ->andFilterWhere(['like', 'loan_use_to', $this->loan_use_to])
            ->andFilterWhere(['like', 'source_repayment', $this->source_repayment])
            ->andFilterWhere(['like', 'money_in_account', $this->money_in_account])
            ->andFilterWhere(['like', 'money_in_account_name', $this->money_in_account_name])
            ->andFilterWhere(['like', 'money_in_bank', $this->money_in_bank])
            ->andFilterWhere(['like', 'money_in_bank_branch', $this->money_in_bank_branch])
            ->andFilterWhere(['like', 'money_back_account', $this->money_back_account])
            ->andFilterWhere(['like', 'money_back_account_name', $this->money_back_account_name])
            ->andFilterWhere(['like', 'money_back_bank', $this->money_back_bank])
            ->andFilterWhere(['like', 'money_back_bank_branch', $this->money_back_bank_branch])
            ->andFilterWhere(['like', 'remark', $this->remark])
            ->andFilterWhere(['like', 'audit_remark', $this->audit_remark]);

        return $dataProvider;
    }
}
