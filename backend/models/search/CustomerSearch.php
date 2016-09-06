<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Customer;

/**
 * CustomerSearch represents the model behind the search form about `common\models\Customer`.
 */
class CustomerSearch extends Customer
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'province_id', 'city_id', 'city_proper_id', 'status', 'src_id', 'manager_id', 'created_at', 'updated_at', 'created_by', 'updated_by', 'block_at', 'confirmed_at'], 'integer'],
            [['code', 'class', 'name', 'company_name', 'link_name', 'card_number', 'card_address', 'address', 'email', 'mobile', 'description', 'remarks'], 'safe'],
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
    public function search($params,$class=0)
    {
        if($class==10){
            $query=Customer::find()->onlyPerson();
        }
        elseif($class==20){
            $query=Customer::find()->onlyCompany();
        }
        else{
            $query=Customer::find();
        }

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
            'province_id' => $this->province_id,
            'city_id' => $this->city_id,
            'city_proper_id' => $this->city_proper_id,
            'status' => $this->status,
            'src_id' => $this->src_id,
            'manager_id' => $this->manager_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
            'block_at' => $this->block_at,
            'confirmed_at' => $this->confirmed_at,
        ]);

        $query->andFilterWhere(['like', 'code', $this->code])
            ->andFilterWhere(['like', 'class', $this->class])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'company_name', $this->company_name])
            ->andFilterWhere(['like', 'link_name', $this->link_name])
            ->andFilterWhere(['like', 'card_number', $this->card_number])
            ->andFilterWhere(['like', 'card_address', $this->card_address])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'mobile', $this->mobile])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'remarks', $this->remarks]);

        return $dataProvider;
    }
}
