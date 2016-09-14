<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\ProductMoneyChannel;

/**
 * ProductMoneyChannelSearch represents the model behind the search form about `common\models\ProductMoneyChannel`.
 */
class ProductMoneyChannelSearch extends ProductMoneyChannel
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'company_type_id', 'province_id', 'city_id', 'area_id', 'created_at', 'updated_at', 'status', 'order', 'begin_time', 'end_time'], 'integer'],
            [['code', 'name', 'contacts_name', 'contacts_phone', 'address', 'description'], 'safe'],
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
        $query = ProductMoneyChannel::find();

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
            'company_type_id' => $this->company_type_id,
            'province_id' => $this->province_id,
            'city_id' => $this->city_id,
            'area_id' => $this->area_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'status' => $this->status,
            'order' => $this->order,
            'begin_time' => $this->begin_time,
            'end_time' => $this->end_time,
        ]);

        $query->andFilterWhere(['like', 'code', $this->code])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'contacts_name', $this->contacts_name])
            ->andFilterWhere(['like', 'contacts_phone', $this->contacts_phone])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
