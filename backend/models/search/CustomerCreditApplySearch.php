<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\CustomerCreditApply;

/**
 * CustomerCreditApplySearch represents the model behind the search form about `common\models\CustomerCreditApply`.
 */
class CustomerCreditApplySearch extends CustomerCreditApply
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['customer_id', 'province_id', 'city_id', 'area_id', 'apply_time', 'apply_manager_id', 'customer_class', 'apply_type_id', 'money_channel_id', 'status', 'order', 'created_at', 'updated_at', 'company_id'], 'integer'],
            [['apply_no', 'description', 'status_remark'], 'safe'],
            [['old_credit_money', 'to_credit_money', 'apply_money', 'audit_money', 'audit_rate'], 'number'],
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
    public function search($params, $type=[])
    {


        $query = CustomerCreditApply::find()->where($type);

        


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
            'province_id' => $this->province_id,
            'city_id' => $this->city_id,
            'area_id' => $this->area_id,
            'apply_time' => $this->apply_time,
            'apply_manager_id' => $this->apply_manager_id,
            'customer_class' => $this->customer_class,
            'apply_type_id' => $this->apply_type_id,
            'old_credit_money' => $this->old_credit_money,
            'to_credit_money' => $this->to_credit_money,
            'money_channel_id' => $this->money_channel_id,
            'apply_money' => $this->apply_money,
            'audit_money' => $this->audit_money,
            'audit_rate' => $this->audit_rate,
            'status' => $this->status,
            'order' => $this->order,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'company_id' => $this->company_id,
        ]);

        $query->andFilterWhere(['like', 'apply_no', $this->apply_no])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'status_remark', $this->status_remark]);

        return $dataProvider;
    }
}
