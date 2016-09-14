<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%customer_credit_process_his}}".
 *
 * @property integer $id
 * @property integer $apply_id
 * @property integer $manager_id
 * @property integer $result_id
 * @property string $remark
 * @property integer $create_time
 * @property integer $update_time
 * @property integer $status
 * @property integer $order
 */
class CustomerCreditProcessHis extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%customer_credit_process_his}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['apply_id', 'manager_id', 'result_id', 'create_time', 'update_time', 'status', 'order'], 'integer'],
            [['remark'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '自动增长ID',
            'apply_id' => '单据类型 ，如 1授信  2借款 3 评估',
            'manager_id' => '操作员',
            'result_id' => '1 通过 -1 否决 0 未审核  10 查看',
            'remark' => '审核结论',
            'create_time' => '创建时间',
            'update_time' => '更新时间',
            'status' => '状态',
            'order' => '排序',
        ];
    }

    /**
     * @inheritdoc
     * @return \common\models\query\CustomerCreditProcessHisQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\CustomerCreditProcessHisQuery(get_called_class());
    }
}
