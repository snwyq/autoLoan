<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\AutoSeries;

/**
 * AutoSeriesSearch represents the model behind the search form about `common\models\AutoSeries`.
 */
class AutoSeriesSearch extends AutoSeries
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'series_id', 'brand_id'], 'integer'],
            [['series_name', 'series_group_name'], 'safe'],
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
        $query = AutoSeries::find();

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
            'series_id' => $this->series_id,
            'brand_id' => $this->brand_id,
        ]);

        $query->andFilterWhere(['like', 'series_name', $this->series_name])
            ->andFilterWhere(['like', 'series_group_name', $this->series_group_name]);

        return $dataProvider;
    }
}
