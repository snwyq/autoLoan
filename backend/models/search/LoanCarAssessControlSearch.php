<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\LoanCarAssessControl;

/**
 * LoanCarAssessControlSearch represents the model behind the search form about `common\models\LoanCarAssessControl`.
 */
class LoanCarAssessControlSearch extends LoanCarAssessControl
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'car_id', 'loan_id', 'put_stor_time', 'control_by_id', 'control_time', 'control_type', 'transfer_time', 'if_all_docment', 'order', 'status', 'created_by', 'created_at', 'updated_at'], 'integer'],
            [['put_stor_reason', 'tag_code', 'car_owner', 'car_certificate_number', 'control_address', 'transfer_person', 'transfer_telephone', 'transfer_card_number', 'car_license_number', 'control_description', 'car_condition', 'remarks'], 'safe'],
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
        $query = LoanCarAssessControl::find();

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
            'car_id' => $this->car_id,
            'loan_id' => $this->loan_id,
            'put_stor_time' => $this->put_stor_time,
            'control_by_id' => $this->control_by_id,
            'control_time' => $this->control_time,
            'control_type' => $this->control_type,
            'transfer_time' => $this->transfer_time,
            'if_all_docment' => $this->if_all_docment,
            'order' => $this->order,
            'status' => $this->status,
            'created_by' => $this->created_by,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'put_stor_reason', $this->put_stor_reason])
            ->andFilterWhere(['like', 'tag_code', $this->tag_code])
            ->andFilterWhere(['like', 'car_owner', $this->car_owner])
            ->andFilterWhere(['like', 'car_certificate_number', $this->car_certificate_number])
            ->andFilterWhere(['like', 'control_address', $this->control_address])
            ->andFilterWhere(['like', 'transfer_person', $this->transfer_person])
            ->andFilterWhere(['like', 'transfer_telephone', $this->transfer_telephone])
            ->andFilterWhere(['like', 'transfer_card_number', $this->transfer_card_number])
            ->andFilterWhere(['like', 'car_license_number', $this->car_license_number])
            ->andFilterWhere(['like', 'control_description', $this->control_description])
            ->andFilterWhere(['like', 'car_condition', $this->car_condition])
            ->andFilterWhere(['like', 'remarks', $this->remarks]);

        return $dataProvider;
    }
}
