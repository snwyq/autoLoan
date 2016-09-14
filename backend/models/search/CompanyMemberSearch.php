<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\CompanyMember;

/**
 * CompanyMemberSearch represents the model behind the search form about `common\models\CompanyMember`.
 */
class CompanyMemberSearch extends CompanyMember
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'customer_id', 'role_type', 'sex_id', 'educational_id', 'is_work_contacts', 'order', 'status', 'created_at', 'updated_at'], 'integer'],
            [['name', 'card_number', 'telephone', 'other_link_type', 'work_position', 'address', 'remark'], 'safe'],
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
        $query = CompanyMember::find();

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
            'role_type' => $this->role_type,
            'sex_id' => $this->sex_id,
            'educational_id' => $this->educational_id,
            'is_work_contacts' => $this->is_work_contacts,
            'order' => $this->order,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'card_number', $this->card_number])
            ->andFilterWhere(['like', 'telephone', $this->telephone])
            ->andFilterWhere(['like', 'other_link_type', $this->other_link_type])
            ->andFilterWhere(['like', 'work_position', $this->work_position])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'remark', $this->remark]);

        return $dataProvider;
    }
}
