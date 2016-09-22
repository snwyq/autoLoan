<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%loan_makeloans}}".
 *
 * @property integer $id
 * @property integer $customer_id
 * @property integer $loan_id
 * @property integer $money_channel_id
 * @property integer $money_channel_product_id
 * @property integer $give_money_time
 * @property integer $loan_money
 * @property integer $loan_term_id
 * @property integer $loan_period_id
 * @property string $loan_money_rate
 * @property integer $loan_rate_type_id
 * @property integer $loan_pay_type_id
 * @property integer $fixed_day
 * @property integer $loan_start_time
 * @property integer $loan_end_time
 * @property integer $first_pay_date
 * @property string $remark
 * @property integer $order
 * @property integer $status
 * @property integer $created_by
 * @property integer $created_at
 * @property integer $updated_at
 */
class LoanMakeloans extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%loan_makeloans}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['customer_id', 'loan_id', 'money_channel_id', 'money_channel_product_id', 'give_money_time', 'loan_money', 'loan_term_id', 'loan_period_id', 'loan_rate_type_id', 'loan_pay_type_id', 'fixed_day', 'loan_start_time', 'loan_end_time', 'first_pay_date', 'order', 'status', 'created_by'], 'integer'],
            [['loan_money_rate'], 'number'],
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
            'customer_id' => '借款人',
            'loan_id' => '借款表ticket_id',
            'money_channel_id' => '资金通道ID 从配置中来',
            'money_channel_product_id' => '用款产品ID (获取产品表ID)',
            'give_money_time' => '放款日期',
            'loan_money' => '放款金额',
            'loan_term_id' => '贷款期数',
            'loan_period_id' => '贷款期限（年，月，日） 从apply_product_type_ID获得',
            'loan_money_rate' => '贷款利率(计算利息的利率)',
            'loan_rate_type_id' => '利率类型 1 日利率 2 月利率 3 年利率 ',
            'loan_pay_type_id' => '贷款方式（1：到期还本息 2：到期还本，按月还息 3：随定随还）',
            'fixed_day' => '固定时间还款的固定时间',
            'loan_start_time' => '贷款计息时间',
            'loan_end_time' => '贷款结束时间',
            'first_pay_date' => '首次还款日期',
            'remark' => '备注',
            'order' => '排序',
            'status' => '状态  1:未还清 2:未还清（还款中） 3：已还清 -1：已删除',
            'created_by' => '放款确认人',
            'created_at' => '创建时间',
            'updated_at' => '更新时间',
        ];
    }

    /**
     * @inheritdoc
     * @return \common\models\query\LoanMakeloansQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\LoanMakeloansQuery(get_called_class());
    }
}
