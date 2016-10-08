<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\LoanCar;

/**
 * LoanCarSearch represents the model behind the search form about `common\models\LoanCar`.
 */
class LoanCarSearch extends LoanCar
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'loan_id','change_id', 'customer_id', 'car_brand_id', 'car_series_id', 'car_model_id', 'car_years', 'car_outprice', 'car_start_time', 'car_out_time', 'order', 'status', 'created_at', 'updated_at'], 'integer'],
            [['car_displacement', 'car_engine_model_name', 'car_vin', 'car_color', 'car_interior_color', 'emission_standard'], 'safe'],
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
        $query = LoanCar::find();

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
            'change_id' => $this->change_id,
            'customer_id' => $this->customer_id,
            'car_brand_id' => $this->car_brand_id,
            'car_series_id' => $this->car_series_id,
            'car_model_id' => $this->car_model_id,
            'car_years' => $this->car_years,
            'car_outprice' => $this->car_outprice,
            'car_start_time' => $this->car_start_time,
            'car_out_time' => $this->car_out_time,
            'order' => $this->order,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'car_displacement', $this->car_displacement])
            ->andFilterWhere(['like', 'car_engine_model_name', $this->car_engine_model_name])
            ->andFilterWhere(['like', 'car_vin', $this->car_vin])
            ->andFilterWhere(['like', 'car_color', $this->car_color])
            ->andFilterWhere(['like', 'car_interior_color', $this->car_interior_color])
            ->andFilterWhere(['like', 'emission_standard', $this->emission_standard]);

        return $dataProvider;
    }
}
