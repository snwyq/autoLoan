<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\PersonProfile;

/**
 * PersonProfileSearch represents the model behind the search form about `common\models\PersonProfile`.
 */
class PersonProfileSearch extends PersonProfile
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'customer_id', 'sex_id', 'card_type_id', 'card_province_id', 'card_city_id', 'card_area_id', 'province_id', 'city_id', 'area_id', 'educational_id', 'marriage_type_id', 'houseflag', 'carflag', 'birth', 'auto_work_year_id', 'work_position_id', 'income', 'company_id', 'manager_id', 'status', 'order', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['name', 'nation', 'card_number', 'card_address', 'address', 'email', 'mobile', 'work_years', 'company_name', 'company_address', 'phone', 'other_contact', 'other_phone', 'description'], 'safe'],
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
        $query = PersonProfile::find();

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
            'sex_id' => $this->sex_id,
            'card_type_id' => $this->card_type_id,
            'card_province_id' => $this->card_province_id,
            'card_city_id' => $this->card_city_id,
            'card_area_id' => $this->card_area_id,
            'province_id' => $this->province_id,
            'city_id' => $this->city_id,
            'area_id' => $this->area_id,
            'educational_id' => $this->educational_id,
            'marriage_type_id' => $this->marriage_type_id,
            'houseflag' => $this->houseflag,
            'carflag' => $this->carflag,
            'birth' => $this->birth,
            'auto_work_year_id' => $this->auto_work_year_id,
            'work_position_id' => $this->work_position_id,
            'income' => $this->income,
            'company_id' => $this->company_id,
            'manager_id' => $this->manager_id,
            'status' => $this->status,
            'order' => $this->order,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'nation', $this->nation])
            ->andFilterWhere(['like', 'card_number', $this->card_number])
            ->andFilterWhere(['like', 'card_address', $this->card_address])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'mobile', $this->mobile])
            ->andFilterWhere(['like', 'work_years', $this->work_years])
            ->andFilterWhere(['like', 'company_name', $this->company_name])
            ->andFilterWhere(['like', 'company_address', $this->company_address])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'other_contact', $this->other_contact])
            ->andFilterWhere(['like', 'other_phone', $this->other_phone])
            ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
