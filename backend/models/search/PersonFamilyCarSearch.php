<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\PersonFamilyCar;

/**
 * PersonFamilyCarSearch represents the model behind the search form about `common\models\PersonFamilyCar`.
 */
class PersonFamilyCarSearch extends PersonFamilyCar
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'customer_id', 'brand_id', 'series_id', 'auto_type_id', 'buytime', 'order', 'status', 'created_at', 'updated_at'], 'integer'],
            [['user_name', 'car_plate', 'remark'], 'safe'],
            [['price', 'mileage'], 'number'],
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
        $query = PersonFamilyCar::find();

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
            'brand_id' => $this->brand_id,
            'series_id' => $this->series_id,
            'auto_type_id' => $this->auto_type_id,
            'buytime' => $this->buytime,
            'price' => $this->price,
            'mileage' => $this->mileage,
            'order' => $this->order,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'user_name', $this->user_name])
            ->andFilterWhere(['like', 'car_plate', $this->car_plate])
            ->andFilterWhere(['like', 'remark', $this->remark]);

        return $dataProvider;
    }
}
