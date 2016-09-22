<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\CustomerCreditProcessHis;

/**
 * CustomerCreditProcessHisSearch represents the model behind the search form about `common\models\CustomerCreditProcessHis`.
 */
class CustomerCreditProcessHisSearch extends CustomerCreditProcessHis
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'apply_id', 'manager_id', 'result_id', 'create_time', 'update_time', 'status', 'order'], 'integer'],
            [['remark'], 'safe'],
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
    public function search($params,$filter=[])
    {
        $query = CustomerCreditProcessHis::find()->where($filter);

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
            'apply_id' => $this->apply_id,
            'manager_id' => $this->manager_id,
            'result_id' => $this->result_id,
            'create_time' => $this->create_time,
            'update_time' => $this->update_time,
            'status' => $this->status,
            'order' => $this->order,
        ]);

        $query->andFilterWhere(['like', 'remark', $this->remark]);

        return $dataProvider;
    }
}
