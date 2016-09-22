<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\LoanMakeloansPayRec;

/**
 * LoanMakeloansPayRecSearch represents the model behind the search form about `common\models\LoanMakeloansPayRec`.
 */
class LoanMakeloansPayRecSearch extends LoanMakeloansPayRec
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'customer_id', 'loan_id', 'plan_id', 'makeloans_id', 'money_back_time', 'real_money_back_time', 'is_repayment', 'order', 'status', 'created_at', 'updated_at', 'money_back_type', 'audit_by', 'audit_at', 'type'], 'integer'],
            [['money_back_money', 'real_money_back_money', 'change_money', 'fine_money'], 'number'],
            [['remark', 'pos_withhold'], 'safe'],
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
        $query = LoanMakeloansPayRec::find();

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
            'plan_id' => $this->plan_id,
            'makeloans_id' => $this->makeloans_id,
            'money_back_time' => $this->money_back_time,
            'money_back_money' => $this->money_back_money,
            'real_money_back_time' => $this->real_money_back_time,
            'real_money_back_money' => $this->real_money_back_money,
            'change_money' => $this->change_money,
            'fine_money' => $this->fine_money,
            'is_repayment' => $this->is_repayment,
            'order' => $this->order,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'money_back_type' => $this->money_back_type,
            'audit_by' => $this->audit_by,
            'audit_at' => $this->audit_at,
            'type' => $this->type,
        ]);

        $query->andFilterWhere(['like', 'remark', $this->remark])
            ->andFilterWhere(['like', 'pos_withhold', $this->pos_withhold]);

        return $dataProvider;
    }
}
