<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\LoanCarCheck;

/**
 * LoanCarCheckSearch represents the model behind the search form about `common\models\LoanCarCheck`.
 */
class LoanCarCheckSearch extends LoanCarCheck
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'loan_id', 'car_id', 'check_class_id', 'check_type_id', 'plan_check_manager_by', 'plan_check_time', 'check_by_id', 'check_result', 'check_time', 'audit_status', 'audit_by', 'status', 'created_at', 'updated_at'], 'integer'],
            [['check_description', 'check_longitude', 'check_latitude', 'audit_description'], 'safe'],
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
        $query = LoanCarCheck::find();

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
            'car_id' => $this->car_id,
            'check_class_id' => $this->check_class_id,
            'check_type_id' => $this->check_type_id,
            'plan_check_manager_by' => $this->plan_check_manager_by,
            'plan_check_time' => $this->plan_check_time,
            'check_by_id' => $this->check_by_id,
            'check_result' => $this->check_result,
            'check_time' => $this->check_time,
            'audit_status' => $this->audit_status,
            'audit_by' => $this->audit_by,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'check_description', $this->check_description])
            ->andFilterWhere(['like', 'check_longitude', $this->check_longitude])
            ->andFilterWhere(['like', 'check_latitude', $this->check_latitude])
            ->andFilterWhere(['like', 'audit_description', $this->audit_description]);

        return $dataProvider;
    }
}
