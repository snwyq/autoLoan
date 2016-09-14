<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%company_other_loan}}".
 *
 * @property integer $id
 * @property integer $customer_id
 * @property string $loan_name
 * @property string $loan_num
 * @property string $loan_remainder
 * @property integer $start_time
 * @property integer $end_time
 * @property integer $loan_type_id
 * @property integer $overdue_num
 * @property string $loan_bank
 * @property integer $loan_type_by
 * @property integer $sued_flag
 * @property string $remark
 * @property integer $order
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 */
class CompanyOtherLoan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%company_other_loan}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['customer_id'], 'required'],
            [['customer_id', 'loan_num', 'loan_remainder', 'start_time', 'end_time', 'loan_type_id', 'overdue_num', 'loan_type_by', 'sued_flag', 'order', 'status'], 'integer'],
            [['remark'], 'string'],
            [['loan_name'], 'string', 'max' => 20],
            [['loan_bank'], 'string', 'max' => 30],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '自动增长ID',
            'customer_id' => '用户id',
            'loan_name' => '贷款人',
            'loan_num' => '贷款数量',
            'loan_remainder' => '贷款余额',
            'start_time' => '贷款开始时间',
            'end_time' => '贷款结束时间',
            'loan_type_id' => '贷款类型',
            'overdue_num' => '逾期次数',
            'loan_bank' => '贷款机构',
            'loan_type_by' => '借贷征信类型（1：企业，2：个人）',
            'sued_flag' => '是否涉诉',
            'remark' => '备注',
            'order' => '排序',
            'status' => '状态（0：删除 1：正常）',
            'created_at' => '创建时间',
            'updated_at' => '更新时间',
        ];
    }

    /**
     * @inheritdoc
     * @return \common\models\query\CompanyOtherLoanQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\CompanyOtherLoanQuery(get_called_class());
    }
}
