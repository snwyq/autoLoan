<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\LoanCarChange;

/**
 * LoanCarChangeSearch represents the model behind the search form about `common\models\LoanCarChange`.
 */
class LoanCarChangeSearch extends LoanCarChange
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'loan_id', 'customer_id', 'car_id', 'car_id_new', 'apply_time', 'manager_id', 'audit_at', 'audit_by', 'status', 'order', 'created_at', 'updated_at', 'created_by'], 'integer'],
            [['change_no', 'remark'], 'safe'],
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
        $query = LoanCarChange::find();

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
            'loan_id' => $this->loan_id,
            'customer_id' => $this->customer_id,
            'car_id' => $this->car_id,
            'car_id_new' => $this->car_id_new,
            'apply_time' => $this->apply_time,
            'manager_id' => $this->manager_id,
            'audit_at' => $this->audit_at,
            'audit_by' => $this->audit_by,
            'status' => $this->status,
            'order' => $this->order,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => $this->created_by,
        ]);

        $query->andFilterWhere(['like', 'change_no', $this->change_no])
            ->andFilterWhere(['like', 'remark', $this->remark]);

        return $dataProvider;
    }
}
