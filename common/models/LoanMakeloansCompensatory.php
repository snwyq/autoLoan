<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%loan_makeloans_compensatory}}".
 *
 * @property integer $id
 * @property integer $customer_id
 * @property integer $loan_id
 * @property integer $makeloans_id
 * @property integer $pay_plan_id
 * @property integer $money_back_time
 * @property integer $money_end_time
 * @property string $money_back_money
 * @property integer $overdue_days
 * @property string $overdue_prit
 * @property string $overdue_inst
 * @property string $overdue_penalty
 * @property integer $is_repayment
 * @property integer $type
 * @property string $remark
 * @property integer $order
 * @property integer $status
 * @property integer $created_by
 * @property integer $updated_at
 * @property integer $created_at
 */
class LoanMakeloansCompensatory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%loan_makeloans_compensatory}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['customer_id', 'loan_id', 'makeloans_id', 'pay_plan_id', 'money_back_time', 'money_end_time', 'overdue_days', 'is_repayment', 'type', 'order', 'status', 'created_by'], 'integer'],
            [['money_back_money', 'overdue_prit', 'overdue_inst', 'overdue_penalty'], 'number'],
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
            'customer_id' => '借款人ID',
            'loan_id' => '借款单',
            'makeloans_id' => '放款单ID',
            'pay_plan_id' => '还款计划ID',
            'money_back_time' => '代偿日期',
            'money_end_time' => '借款到期日',
            'money_back_money' => '代偿金额',
            'overdue_days' => '逾期天数',
            'overdue_prit' => '逾期本金',
            'overdue_inst' => '逾期利息',
            'overdue_penalty' => '逾期罚息',
            'is_repayment' => '是否还款（0：未还款 1：己还款）',
            'type' => '代偿类型',
            'remark' => '备注',
            'order' => '排序',
            'status' => '状态 （0：删除 1：正常）',
            'created_by' => '管理员ID',
            'updated_at' => '更新时间',
            'created_at' => '创建时间',
        ];
    }

    /**
     * @inheritdoc
     * @return \common\models\query\LoanMakeloansCompensatoryQuery the active query used by this AR class.
     */

    /*add by wyq  2016.10.11 */
    public  static  function  getRepaymentFlag()
    {
        return [
            1=>'已偿还',
            0=>'未偿还',
        ];

    }


    public static function find()
    {
        return new \common\models\query\LoanMakeloansCompensatoryQuery(get_called_class());
    }

    public function getCustomer()
    {
        return $this->hasOne(Customer::className(),['id'=>'customer_id']);
    }

    public function getLoan()
    {
        return $this->hasOne(Loan::className(),['id'=>'loan_id']);
    }
    public function getMakeLoan()
    {
        return $this->hasOne(LoanMakeloans::className(),['id'=>'makeloans_id']);
    }

    public function getMakeLoanPayPlan()
    {
        return $this->hasOne(LoanMakeloansPayPlan::className(),['id'=>'pay_plan_id']);
    }




}
