<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%loan_process_his}}".
 *
 * @property integer $id
 * @property integer $loan_id
 * @property integer $manager_id
 * @property integer $result_id
 * @property string $manager_name
 * @property string $remarks
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $status
 * @property integer $type
 * @property integer $order
 */
class LoanProcessHis extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%loan_process_his}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['loan_id', 'manager_id', 'result_id', 'status', 'type', 'order'], 'integer'],
            [['manager_name'], 'string', 'max' => 20],
            [['remarks'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '审核记录ID',
            'loan_id' => '借款表ID',
            'manager_id' => '审批人ID',
            'result_id' => '结论ID',
            'manager_name' => '审核人名字',
            'remarks' => '备注',
            'created_at' => '创建时间',
            'updated_at' => '更新时间',
            'status' => '审核状态 1-通过 0-未通过',
            'type' => '记录类型 1-审核 2审批',
            'order' => '排序',
        ];
    }

    /**
     * @inheritdoc
     * @return \common\models\query\LoanProcessHisQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\LoanProcessHisQuery(get_called_class());
    }
}
