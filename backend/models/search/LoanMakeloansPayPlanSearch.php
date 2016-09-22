<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\LoanMakeloansPayPlan;

/**
 * LoanMakeloansPayPlanSearch represents the model behind the search form about `common\models\LoanMakeloansPayPlan`.
 */
class LoanMakeloansPayPlanSearch extends LoanMakeloansPayPlan
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'customer_id', 'loan_id', 'makeloan_id', 'back_money_time', 'urged_time', 'real_back_money_time', 'is_overdual', 'manager_id', 'attachment_num', 'order', 'status', 'is_compensatory', 'is_urged', 'created_at', 'updated_at'], 'integer'],
            [['back_money', 'change_money', 'principal_money', 'interest_money', 'remaining_money'], 'number'],
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
        $query = LoanMakeloansPayPlan::find();

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
            'makeloan_id' => $this->makeloan_id,
            'back_money_time' => $this->back_money_time,
            'back_money' => $this->back_money,
            'urged_time' => $this->urged_time,
            'change_money' => $this->change_money,
            'real_back_money_time' => $this->real_back_money_time,
            'principal_money' => $this->principal_money,
            'interest_money' => $this->interest_money,
            'remaining_money' => $this->remaining_money,
            'is_overdual' => $this->is_overdual,
            'manager_id' => $this->manager_id,
            'attachment_num' => $this->attachment_num,
            'order' => $this->order,
            'status' => $this->status,
            'is_compensatory' => $this->is_compensatory,
            'is_urged' => $this->is_urged,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'remark', $this->remark]);

        return $dataProvider;
    }
}
