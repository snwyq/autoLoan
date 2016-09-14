<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\CompanyProfile;

/**
 * CompanyProfileSearch represents the model behind the search form about `common\models\CompanyProfile`.
 */
class CompanyProfileSearch extends CompanyProfile
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'customer_id', 'reg_time', 'reg_province_id', 'reg_city_id', 'reg_area_id', 'reg_capital', 'real_begin_time', 'province_id', 'city_id', 'area_id', 'company_type_id', 'business_place_type_id', 'employees_id', 'business_start_time', 'business_end_time', 'owned_industry_id', 'status', 'manager_id', 'updated_by', 'created_by', 'updated_at', 'created_at'], 'integer'],
            [['name', 'nick_name', 'group_name', 'actual_controller', 'actual_controller_idno', 'actual_controller_mobile', 'contact', 'contact_mobile', 'contact_web_type', 'telephone', 'reg_address', 'trade_address', 'trade_market', 'property', 'business_licence_no', 'organization_code', 'main_business', 'customer_source', 'description', 'longitude', 'latitude'], 'safe'],
            [['store_area'], 'number'],
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
        $query = CompanyProfile::find();

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
            'reg_time' => $this->reg_time,
            'reg_province_id' => $this->reg_province_id,
            'reg_city_id' => $this->reg_city_id,
            'reg_area_id' => $this->reg_area_id,
            'reg_capital' => $this->reg_capital,
            'real_begin_time' => $this->real_begin_time,
            'province_id' => $this->province_id,
            'city_id' => $this->city_id,
            'area_id' => $this->area_id,
            'company_type_id' => $this->company_type_id,
            'business_place_type_id' => $this->business_place_type_id,
            'employees_id' => $this->employees_id,
            'business_start_time' => $this->business_start_time,
            'business_end_time' => $this->business_end_time,
            'owned_industry_id' => $this->owned_industry_id,
            'status' => $this->status,
            'manager_id' => $this->manager_id,
            'store_area' => $this->store_area,
            'updated_by' => $this->updated_by,
            'created_by' => $this->created_by,
            'updated_at' => $this->updated_at,
            'created_at' => $this->created_at,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'nick_name', $this->nick_name])
            ->andFilterWhere(['like', 'group_name', $this->group_name])
            ->andFilterWhere(['like', 'actual_controller', $this->actual_controller])
            ->andFilterWhere(['like', 'actual_controller_idno', $this->actual_controller_idno])
            ->andFilterWhere(['like', 'actual_controller_mobile', $this->actual_controller_mobile])
            ->andFilterWhere(['like', 'contact', $this->contact])
            ->andFilterWhere(['like', 'contact_mobile', $this->contact_mobile])
            ->andFilterWhere(['like', 'contact_web_type', $this->contact_web_type])
            ->andFilterWhere(['like', 'telephone', $this->telephone])
            ->andFilterWhere(['like', 'reg_address', $this->reg_address])
            ->andFilterWhere(['like', 'trade_address', $this->trade_address])
            ->andFilterWhere(['like', 'trade_market', $this->trade_market])
            ->andFilterWhere(['like', 'property', $this->property])
            ->andFilterWhere(['like', 'business_licence_no', $this->business_licence_no])
            ->andFilterWhere(['like', 'organization_code', $this->organization_code])
            ->andFilterWhere(['like', 'main_business', $this->main_business])
            ->andFilterWhere(['like', 'customer_source', $this->customer_source])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'longitude', $this->longitude])
            ->andFilterWhere(['like', 'latitude', $this->latitude]);

        return $dataProvider;
    }
}
