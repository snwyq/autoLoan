<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\CompanyOtherLoan;

/**
 * CompanyOtherLoanSearch represents the model behind the search form about `common\models\CompanyOtherLoan`.
 */
class CompanyOtherLoanSearch extends CompanyOtherLoan
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'customer_id', 'loan_num', 'loan_remainder', 'start_time', 'end_time', 'loan_type_id', 'overdue_num', 'loan_type_by', 'sued_flag', 'order', 'status', 'created_at', 'updated_at'], 'integer'],
            [['loan_name', 'loan_bank', 'remark'], 'safe'],
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
        $query = CompanyOtherLoan::find();

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
            'loan_num' => $this->loan_num,
            'loan_remainder' => $this->loan_remainder,
            'start_time' => $this->start_time,
            'end_time' => $this->end_time,
            'loan_type_id' => $this->loan_type_id,
            'overdue_num' => $this->overdue_num,
            'loan_type_by' => $this->loan_type_by,
            'sued_flag' => $this->sued_flag,
            'order' => $this->order,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'loan_name', $this->loan_name])
            ->andFilterWhere(['like', 'loan_bank', $this->loan_bank])
            ->andFilterWhere(['like', 'remark', $this->remark]);

        return $dataProvider;
    }
}
