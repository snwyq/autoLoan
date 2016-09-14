<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%customer_credit_apply}}".
 *
 * @property integer $id
 * @property integer $customer_id
 * @property string $apply_no
 * @property integer $province_id
 * @property integer $city_id
 * @property integer $area_id
 * @property integer $apply_time
 * @property integer $apply_manager_id
 * @property integer $customer_class
 * @property integer $apply_type_id
 * @property string $old_credit_money
 * @property string $to_credit_money
 * @property integer $money_channel_id
 * @property string $apply_money
 * @property string $audit_money
 * @property string $audit_rate
 * @property string $description
 * @property integer $status
 * @property string $status_remark
 * @property integer $order
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $company_id
 */
class CustomerCreditApply extends \yii\db\ActiveRecord
{


    //define credit  apply   type

    const  CREDIT_ADD = 1;
    const  CREDIT_GOON = 2;
    const  CREDIT_CHANGE = 3;


    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%customer_credit_apply}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['area'], 'required', 'when' => function($model) {
                $provinceValue = $model->province_id;
                $provinceIsEmpty = $provinceValue === null || $provinceValue === [] || $provinceValue === '';
                $cityValue = $model->city_id;
                $cityIsEmpty = $cityValue === null || $cityValue === [] || $cityValue === '';
                return !$provinceIsEmpty || !$cityIsEmpty;
            }, 'whenClient' => "function(attribute, value){
                return $('#customercreditapply-province_id').val() || $('#customercreditapply-city_id').val();
            }"],
            [['customer_id', 'province_id', 'city_id', 'area_id', 'apply_time', 'apply_manager_id', 'customer_class', 'apply_type_id', 'money_channel_id', 'status', 'order', 'company_id'], 'integer'],
            [['apply_no'], 'required'],
            [['old_credit_money', 'to_credit_money', 'apply_money', 'audit_money', 'audit_rate'], 'number'],
            [['description', 'status_remark'], 'string'],
            [['apply_no'], 'string', 'max' => 20],
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
            'customer.name' => '借款名称',
            'apply_no' => '业务编号',
            'province_id' => '提报省份ID',
            'city_id' => '提报市ID',
            'area_id' => '提报区ID',
            'apply_time' => '申请时间',
            'apply_manager_id' => '申请人ID（业务员ID）',
            'customer_class' => '客户属性）',
            'apply_type_id' => '申请类型（1新增授信 2延续授信 3 变更授信）',
            'old_credit_money' => '原授信',
            'to_credit_money' => '调整后授信',
            'money_channel_id' => '资金通道',
            'apply_money' => '申请授信金额',
            'audit_money' => '申批的授信额度',
            'audit_rate' => '建议费率',
            'description' => '备注说明',
            'status' => '状态',
            'status_remark' => '状态说明',
            'order' => '排序',
            'created_at' => '创建时间',
            'updated_at' => '更新时间',
            'company_id' => '企业ID',
        ];
    }

    /**
     * @inheritdoc
     * @return \common\models\query\CustomerCreditApplyQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\CustomerCreditApplyQuery(get_called_class());
    }

    /* 取得借款人的名字
     * */
    public function  getCustomer()
    {

        return $this->hasOne(Customer::className(), ['id' => 'customer_id']);
    }

    /*
     * 取得省份城市
     * */

    public function  getProvince()
    {
        return $this->hasOne(City::className(), ['id' => 'province_id']);
    }

    /*
    * 取得省份城市
    * */

    public function  getCity()
    {
        return $this->hasOne(City::className(), ['id' => 'city_id']);
    }

    /*
     * 返回状态
     * */

    public function  getStatus()
    {
        return [
            '1' => '未提报',
            '2' => '待修改',
            '3' => '背调中',
            '9' => '否决',
            '10' => '完成',
        ];
    }

    public static  function getCreditType()
    {
        return [
            static::CREDIT_ADD=>"新增授信",
            static::CREDIT_CHANGE=>"额度变更",
            static::CREDIT_GOON =>"授信延长",
        ];
    }


}

