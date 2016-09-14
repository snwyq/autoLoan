<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\CompanyBizAddress;

/**
 * CompanyBizAddressSearch represents the model behind the search form about `common\models\CompanyBizAddress`.
 */
class CompanyBizAddressSearch extends CompanyBizAddress
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'customer_id', 'modality', 'start_time', 'end_time', 'order', 'status', 'created_at', 'updated_at'], 'integer'],
            [['address', 'coordinate_x', 'coordinate_y', 'remark'], 'safe'],
            [['area'], 'number'],
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
        $query = CompanyBizAddress::find();

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
            'modality' => $this->modality,
            'area' => $this->area,
            'start_time' => $this->start_time,
            'end_time' => $this->end_time,
            'order' => $this->order,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'coordinate_x', $this->coordinate_x])
            ->andFilterWhere(['like', 'coordinate_y', $this->coordinate_y])
            ->andFilterWhere(['like', 'remark', $this->remark]);

        return $dataProvider;
    }
}
