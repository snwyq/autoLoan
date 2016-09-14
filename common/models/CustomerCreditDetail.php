<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%customer_credit_detail}}".
 *
 * @property integer $id
 * @property integer $customer_id
 * @property integer $money_channel_id
 * @property integer $credit_money
 * @property integer $product_class_main_money
 * @property integer $product_class_part_money
 * @property integer $directional_credit_money
 * @property integer $immediately_credit_money
 * @property integer $single_credit_money
 * @property string $credit_rating
 * @property integer $supervision_mode
 * @property integer $credit_period
 * @property integer $combination_rate
 * @property string $inter_loan_limit
 * @property integer $start_time
 * @property integer $end_time
 * @property string $condition
 * @property string $description
 * @property integer $order
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $created_by
 */
class CustomerCreditDetail extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%customer_credit_detail}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['customer_id', 'money_channel_id', 'credit_money', 'product_class_main_money', 'product_class_part_money', 'directional_credit_money', 'immediately_credit_money', 'single_credit_money', 'supervision_mode', 'credit_period', 'combination_rate', 'start_time', 'end_time', 'order', 'status', 'created_by'], 'integer'],
            [['condition', 'description'], 'string'],
            [['credit_rating'], 'string', 'max' => 50],
            [['inter_loan_limit'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '主键ID',
            'customer_id' => '借款主体ID',
            'money_channel_id' => '资金渠道id（vf_sys_money_channel表主键）',
            'credit_money' => '授信额度',
            'product_class_main_money' => '库存产品授信额度',
            'product_class_part_money' => '单车融产品授信额度',
            'directional_credit_money' => '定向支付授信额度',
            'immediately_credit_money' => '即时授信额度',
            'single_credit_money' => '单次放款限额',
            'credit_rating' => '信用评级',
            'supervision_mode' => '监管方式（1：质押 2：其它）',
            'credit_period' => '贷款期限',
            'combination_rate' => '综合费率',
            'inter_loan_limit' => '放款间限',
            'start_time' => '授信开始时间',
            'end_time' => '授信结束时间',
            'condition' => '必须落实条件（1：必须落实的担保措施 2：放款条件 3：贷后管理）',
            'description' => '备注',
            'order' => '排序',
            'status' => '状态（1：正常 0：失效  -1 删除）',
            'created_at' => '创建时间',
            'updated_at' => '更新时间',
            'created_by' => '录入管理员',
        ];
    }

    /**
     * @inheritdoc
     * @return \common\models\query\CustomerCreditDetailQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\CustomerCreditDetailQuery(get_called_class());
    }
}
