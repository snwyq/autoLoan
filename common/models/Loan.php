<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%loan}}".
 *
 * @property integer $id
 * @property string $loan_no
 * @property integer $customer_id
 * @property integer $company_id
 * @property integer $province_id
 * @property integer $city_id
 * @property integer $area_id
 * @property integer $apply_time
 * @property integer $manager_id
 * @property integer $money_channel_id
 * @property integer $money_channel_product_id
 * @property integer $loan_period_id
 * @property integer $pay_type_id
 * @property string $apply_money
 * @property string $audit_money
 * @property string $loan_money_rate
 * @property string $loan_money_rate_add
 * @property integer $audit_at
 * @property integer $audit_by
 * @property string $loan_use_to
 * @property string $source_repayment
 * @property string $money_in_account
 * @property string $money_in_account_name
 * @property string $money_in_bank
 * @property string $money_in_bank_branch
 * @property integer $loan_back_time
 * @property string $money_back_account
 * @property string $money_back_account_name
 * @property string $money_back_bank
 * @property string $money_back_bank_branch
 * @property string $remark
 * @property integer $loan_back_status
 * @property integer $loan_back_by
 * @property integer $status
 * @property string $audit_remark
 * @property integer $order
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $created_by
 */
class Loan extends \yii\db\ActiveRecord
{


    //1：未提报  2：借款初审 3：车车评估  4 车车监管 5 补质评估 6 补质监管 7：合同待上传 8：待放款 9：还款中 -10：单据终止 10 已还清;

    const  TEMP = 1;     //未提报
    const  FRISTAUDIT = 2;     //借款初审
    const  CARASSESS = 3;     //车辆评估
    const  CARASSESSAUDIT = 4;     //总部核价
    const  CARCONTROL = 5;     //车辆监管
    const  CARASSESSADD = 6;     //车辆补质
    const  CONTRACTADD = 7;     //初审
    const  WAITMONEY = 8;     //待放款
    const  PAYING = 9;     //还款中
    const  LOANSTOP = -10;    //中止
    const  LOANCLOSE = 10;   //还清


    public function  behaviors()
    {

        return
            [
                TimestampBehavior::className(),
            ];


    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%loan}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['loan_no'], 'required'],
            [['customer_id', 'company_id', 'province_id', 'city_id', 'area_id', 'apply_time', 'manager_id', 'money_channel_id', 'money_channel_product_id', 'loan_period_id', 'pay_type_id', 'audit_at', 'audit_by', 'loan_back_time', 'loan_back_status', 'loan_back_by', 'status', 'order', 'created_by'], 'integer'],
            [['apply_money', 'audit_money', 'loan_money_rate', 'loan_money_rate_add'], 'number'],
            [['audit_remark'], 'string'],
            [['loan_no'], 'string', 'max' => 20],
            [['loan_use_to', 'source_repayment'], 'string', 'max' => 200],
            [['money_in_account', 'money_back_account', 'money_back_account_name'], 'string', 'max' => 50],
            [['money_in_account_name', 'money_in_bank', 'money_in_bank_branch', 'money_back_bank', 'money_back_bank_branch'], 'string', 'max' => 100],
            [['remark'], 'string', 'max' => 255],

            ['apply_time', 'default', 'value' => function () {
                return date('Y-m-d', time());
            }],

            ['apply_time', 'filter', 'filter' => function ($value) {
                return is_numeric($value) ? $value : strtotime($value);
            }, 'skipOnEmpty' => true]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '自动增长ID',
            'loan_no' => '业务编号',
            'customer_id' => '借款人',
            'company_id' => '企业id',
            'province_id' => '提报省份ID',
            'city_id' => '提报市ID',
            'area_id' => '提报区ID',
            'apply_time' => '申请时间',
            'manager_id' => '提报人',
            'money_channel_id' => '资金通道',
            'money_channel_product_id' => '产品',
            'loan_period_id' => '贷款周期',
            'pay_type_id' => '还款方式',
            'apply_money' => '申请金额',
            'audit_money' => '申批的金额（放款）',
            'loan_money_rate' => '借款利率',
            'loan_money_rate_add' => '浮动利率',
            'audit_at' => '申批的时间',
            'audit_by' => '申批人员ID',
            'loan_use_to' => '借款用途',
            'source_repayment' => '还款来源',
            'money_in_account' => '收款帐户',
            'money_in_account_name' => '收款帐户名称',
            'money_in_bank' => '收款帐户银行',
            'money_in_bank_branch' => '收款帐户开户行',
            'loan_back_time' => '还款日期',
            'money_back_account' => '还款帐户',
            'money_back_account_name' => '还款帐户户主名称',
            'money_back_bank' => '还款帐户开户行',
            'money_back_bank_branch' => '还款帐户开户行支行',
            'remark' => '备注',
            'loan_back_status' => '是否已还',
            'loan_back_by' => '还款确认人员ID',
            'status' => '状态',
            'audit_remark' => '审核意见',
            'order' => '排序',
            'created_at' => '创建时间',
            'updated_at' => '更新时间',
            'created_by' => '录单员',
        ];
    }

    /**
     * @inheritdoc
     * @return \common\models\query\LoanQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\LoanQuery(get_called_class());
    }


    //返回定单的状态

    public static function  getLoanStatus()
    {
        return [

            '1' => '待提报',
            '2' => '待初审',
            '3' => '待评估',
            '4' => '待核价',
            '5' => '待监管',
            '6' => '待补质',
            '7' => '待签约',
            '8' => '待放款',
            '9' => '还款中',
            '-10' => '终止',
            '10' => '还清',
        ];
    }

    //返回定单的状态

    public static function  getLoanNextStatus()
    {
        return [
            '1' =>
                [
                    '1' => '提报',
                    '2' => 2,
                ],
            '2' =>
                [
                    '1' => '初审完成',
                    '2' => 2,
                ],

            '3' =>
                [
                    '1' => '评估完成',
                    '2' => 4,
                ],
            '4' =>
                [
                    '1' => '核价完成',
                    '2' => 5,

                ],
            '5' =>
                [
                    '1' => '监管完成',
                    '2' => 7,
                ],
            '6' =>
                [
                    '1' => '补质完成',
                    '2' => 4,
                ],
            '7' =>
                [
                    '1' => '签约完成',
                    '2' => 8,
                ],
            '8' =>
                [
                    '1' => '放款完成',
                    '2' => 9,
                ],
            '9' =>
                [
                    '1' => '还款完成',
                    '2' => 10,
                ],

            '-10' =>
                [
                    '1' => '中断',
                    '2' => 0,
                ],
            '10' =>
                [
                    '1' => '结束',
                    '2' => 0,
                ],

        ];


    }


//得到经销商名称

    public   function  getCustomer()
    {
        return $this->hasOne(Customer::className(), ['id' => 'customer_id']);
    }

//得到产品
    public
    function  getMoneyProduct()
    {
        return $this->hasOne(ProductMoneyChannelProduct::className(), ['id' => 'money_channel_product_id']);
    }


}