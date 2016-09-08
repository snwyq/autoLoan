<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\PersonFamilyHouse;

/**
 * PersonFamilyHouseSearch represents the model behind the search form about `common\models\PersonFamilyHouse`.
 */
class PersonFamilyHouseSearch extends PersonFamilyHouse
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'customer_id', 'house_type', 'price', 'loan_flag', 'decorate_type', 'rent_flag', 'order', 'status', 'created_at', 'updated_at'], 'integer'],
            [['name', 'address', 'remark'], 'safe'],
            [['area'], 'number'],
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
        $query = PersonFamilyHouse::find();

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
            'house_type' => $this->house_type,
            'area' => $this->area,
            'price' => $this->price,
            'loan_flag' => $this->loan_flag,
            'decorate_type' => $this->decorate_type,
            'rent_flag' => $this->rent_flag,
            'order' => $this->order,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'remark', $this->remark]);

        return $dataProvider;
    }
}
