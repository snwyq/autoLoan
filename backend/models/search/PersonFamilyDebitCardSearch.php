<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\PersonFamilyDebitCard;

/**
 * PersonFamilyDebitCardSearch represents the model behind the search form about `common\models\PersonFamilyDebitCard`.
 */
class PersonFamilyDebitCardSearch extends PersonFamilyDebitCard
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'customer_id', 'credit_amount', 'used_amount', 'half_year_amount', 'overdue_num', 'guaranty_flag', 'order', 'status', 'created_at', 'updated_at'], 'integer'],
            [['name', 'bank', 'remark'], 'safe'],
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
        $query = PersonFamilyDebitCard::find();

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
            'credit_amount' => $this->credit_amount,
            'used_amount' => $this->used_amount,
            'half_year_amount' => $this->half_year_amount,
            'overdue_num' => $this->overdue_num,
            'guaranty_flag' => $this->guaranty_flag,
            'order' => $this->order,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'bank', $this->bank])
            ->andFilterWhere(['like', 'remark', $this->remark]);

        return $dataProvider;
    }
}
