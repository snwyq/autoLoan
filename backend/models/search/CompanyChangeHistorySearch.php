<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\CompanyChangeHistory;

/**
 * CompanyChangeHistorySearch represents the model behind the search form about `common\models\CompanyChangeHistory`.
 */
class CompanyChangeHistorySearch extends CompanyChangeHistory
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'customer_id', 'change_time', 'order', 'status', 'created_at', 'updated_at'], 'integer'],
            [['change_title', 'before_content', 'after_content', 'remark'], 'safe'],
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
        $query = CompanyChangeHistory::find();

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
            'change_time' => $this->change_time,
            'order' => $this->order,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'change_title', $this->change_title])
            ->andFilterWhere(['like', 'before_content', $this->before_content])
            ->andFilterWhere(['like', 'after_content', $this->after_content])
            ->andFilterWhere(['like', 'remark', $this->remark]);

        return $dataProvider;
    }
}
