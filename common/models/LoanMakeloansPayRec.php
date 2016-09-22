<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%loan_makeloans_pay_rec}}".
 *
 * @property integer $id
 * @property integer $customer_id
 * @property integer $loan_id
 * @property integer $plan_id
 * @property integer $makeloans_id
 * @property integer $money_back_time
 * @property string $money_back_money
 * @property integer $real_money_back_time
 * @property string $real_money_back_money
 * @property string $change_money
 * @property string $fine_money
 * @property integer $is_repayment
 * @property string $remark
 * @property integer $order
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $pos_withhold
 * @property integer $money_back_type
 * @property integer $audit_by
 * @property integer $audit_at
 * @property integer $type
 */
class LoanMakeloansPayRec extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%loan_makeloans_pay_rec}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['customer_id', 'loan_id', 'plan_id', 'makeloans_id', 'money_back_time', 'real_money_back_time', 'is_repayment', 'order', 'status', 'money_back_type', 'audit_by', 'audit_at', 'type'], 'integer'],
            [['money_back_money', 'real_money_back_money', 'change_money', 'fine_money'], 'number'],
            [['remark'], 'string'],
            [['pos_withhold'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '自动增长ID',
            'customer_id' => '借款人ID',
            'loan_id' => '借款ticket_id',
            'plan_id' => '还款计划ID',
            'makeloans_id' => '放款单ID',
            'money_back_time' => '还款日期',
            'money_back_money' => '还款金额',
            'real_money_back_time' => '实际还款时间',
            'real_money_back_money' => '实际还款金额',
            'change_money' => '调整金额',
            'fine_money' => '罚息',
            'is_repayment' => '是否还款（0：未还款 1：己还款）',
            'remark' => '备注',
            'order' => '排序',
            'status' => '状态 （0：删除 1：正常）',
            'created_at' => '创建时间',
            'updated_at' => '更新时间',
            'pos_withhold' => 'POS代扣',
            'money_back_type' => '银行手工转账（1：按期还款 2：提前还款）',
            'audit_by' => '确认管理员ID',
            'audit_at' => '确认日期',
            'type' => '还款记录类型 1-提报的 2-财务新加',
        ];
    }

    /**
     * @inheritdoc
     * @return \common\models\query\LoanMakeloansPayRecQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\LoanMakeloansPayRecQuery(get_called_class());
    }
}
