<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\CompanyStockholder;

/**
 * CompanyStockholderSearch represents the model behind the search form about `common\models\CompanyStockholder`.
 */
class CompanyStockholderSearch extends CompanyStockholder
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'customer_id', 'capital_amount', 'reality_amount', 'investment_type', 'order', 'status', 'created_at', 'updated_at'], 'integer'],
            [['name', 'card_number', 'remark'], 'safe'],
            [['investment_rate'], 'number'],
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
        $query = CompanyStockholder::find();

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
            'capital_amount' => $this->capital_amount,
            'reality_amount' => $this->reality_amount,
            'investment_type' => $this->investment_type,
            'investment_rate' => $this->investment_rate,
            'order' => $this->order,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'card_number', $this->card_number])
            ->andFilterWhere(['like', 'remark', $this->remark]);

        return $dataProvider;
    }
}
