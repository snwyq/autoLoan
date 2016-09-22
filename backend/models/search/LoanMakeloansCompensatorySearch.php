<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\LoanMakeloansCompensatory;

/**
 * LoanMakeloansCompensatorySearch represents the model behind the search form about `common\models\LoanMakeloansCompensatory`.
 */
class LoanMakeloansCompensatorySearch extends LoanMakeloansCompensatory
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'customer_id', 'loan_id', 'makeloans_id', 'pay_plan_id', 'money_back_time', 'money_end_time', 'overdue_days', 'is_repayment', 'type', 'order', 'status', 'created_by', 'updated_at', 'created_at'], 'integer'],
            [['money_back_money', 'overdue_prit', 'overdue_inst', 'overdue_penalty'], 'number'],
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
        $query = LoanMakeloansCompensatory::find();

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
            'makeloans_id' => $this->makeloans_id,
            'pay_plan_id' => $this->pay_plan_id,
            'money_back_time' => $this->money_back_time,
            'money_end_time' => $this->money_end_time,
            'money_back_money' => $this->money_back_money,
            'overdue_days' => $this->overdue_days,
            'overdue_prit' => $this->overdue_prit,
            'overdue_inst' => $this->overdue_inst,
            'overdue_penalty' => $this->overdue_penalty,
            'is_repayment' => $this->is_repayment,
            'type' => $this->type,
            'order' => $this->order,
            'status' => $this->status,
            'created_by' => $this->created_by,
            'updated_at' => $this->updated_at,
            'created_at' => $this->created_at,
        ]);

        $query->andFilterWhere(['like', 'remark', $this->remark]);

        return $dataProvider;
    }
}
