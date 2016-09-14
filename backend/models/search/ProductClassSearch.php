<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\ProductClass;

/**
 * ProductClassSearch represents the model behind the search form about `common\models\ProductClass`.
 */
class ProductClassSearch extends ProductClass
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'pid', 'status', 'order', 'created_at', 'updated_at', 'manager_id'], 'integer'],
            [['code', 'name', 'name_alias', 'description'], 'safe'],
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
        $query = ProductClass::find();

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
            'pid' => $this->pid,
            'status' => $this->status,
            'order' => $this->order,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'manager_id' => $this->manager_id,
        ]);

        $query->andFilterWhere(['like', 'code', $this->code])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'name_alias', $this->name_alias])
            ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
