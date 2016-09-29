<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\LoanCarAssess;

/**
 * LoanCarAssessSearch represents the model behind the search form about `common\models\LoanCarAssess`.
 */
class LoanCarAssessSearch extends LoanCarAssess
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'car_id', 'loan_id', 'customer_id', 'car_change_num', 'first_plate_date', 'car_mileage', 'car_yearly_check_due_time', 'car_insurance_due_time', 'audit_assess_money', 'audit_discount', 'audit_at', 'audit_by', 'assess_by', 'assess_at', 'order', 'status', 'created_at', 'updated_at'], 'integer'],
            [['car_displacement', 'fire_car_flag', 'car_water_flag', 'car_insurance_due_description', 'car_surface', 'car_interior', 'car_engine', 'car_malfunction', 'car_condition', 'audit_remark', 'car_use', 'car_owner', 'car_checking_grade', 'car_description', 'remark'], 'safe'],
            [['audit_loan_money', 'assess_loan_money','assess_discount', 'assess_money', 'new_auto_price', 'bigdata_price_1', 'bigdata_price_2', 'bigdata_price_3'], 'number'],
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
        $query = LoanCarAssess::find();

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
            'car_id' => $this->car_id,
            'loan_id' => $this->loan_id,
            'customer_id' => $this->customer_id,
            'car_change_num' => $this->car_change_num,
            'first_plate_date' => $this->first_plate_date,
            'car_mileage' => $this->car_mileage,
            'car_yearly_check_due_time' => $this->car_yearly_check_due_time,
            'car_insurance_due_time' => $this->car_insurance_due_time,
            'audit_assess_money' => $this->audit_assess_money,
            'audit_discount' => $this->audit_discount,
            'audit_loan_money' => $this->audit_loan_money,
            'audit_at' => $this->audit_at,
            'audit_by' => $this->audit_by,
            'assess_by' => $this->assess_by,
            'assess_at' => $this->assess_at,
            'assess_discount' => $this->assess_discount,
            'assess_money' => $this->assess_money,
            'assess_loan_money' => $this->assess_loan_money,
            'new_auto_price' => $this->new_auto_price,
            'bigdata_price_1' => $this->bigdata_price_1,
            'bigdata_price_2' => $this->bigdata_price_2,
            'bigdata_price_3' => $this->bigdata_price_3,
            'order' => $this->order,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'car_displacement', $this->car_displacement])
            ->andFilterWhere(['like', 'fire_car_flag', $this->fire_car_flag])
            ->andFilterWhere(['like', 'car_water_flag', $this->car_water_flag])
            ->andFilterWhere(['like', 'car_insurance_due_description', $this->car_insurance_due_description])
            ->andFilterWhere(['like', 'car_surface', $this->car_surface])
            ->andFilterWhere(['like', 'car_interior', $this->car_interior])
            ->andFilterWhere(['like', 'car_engine', $this->car_engine])
            ->andFilterWhere(['like', 'car_malfunction', $this->car_malfunction])
            ->andFilterWhere(['like', 'car_condition', $this->car_condition])
            ->andFilterWhere(['like', 'audit_remark', $this->audit_remark])
            ->andFilterWhere(['like', 'car_use', $this->car_use])
            ->andFilterWhere(['like', 'car_owner', $this->car_owner])
            ->andFilterWhere(['like', 'car_checking_grade', $this->car_checking_grade])
            ->andFilterWhere(['like', 'car_description', $this->car_description])
            ->andFilterWhere(['like', 'remark', $this->remark]);

        return $dataProvider;
    }
}
