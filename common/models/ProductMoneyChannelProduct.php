<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%product_money_channel_product}}".
 *
 * @property integer $id
 * @property integer $money_channel_id
 * @property integer $product_class_id
 * @property string $code
 * @property string $name
 * @property string $name_alias
 * @property string $cost_rate_day
 * @property string $cost_rate_month
 * @property string $cost_rate_year
 * @property string $sale_rate_day
 * @property string $sale_rate_month
 * @property string $sale_rate_year
 * @property string $max_rate_add
 * @property string $min_rate_add
 * @property integer $rate_type
 * @property string $pay_period_var
 * @property string $pay_type_var
 * @property integer $fixed_day
 * @property integer $status
 * @property integer $fine_grace_days
 * @property string $fine_coefficient
 * @property integer $inerest_type
 * @property integer $money_type_id
 * @property string $description
 * @property integer $order
 * @property integer $created_at
 * @property integer $updated_at
 */
class ProductMoneyChannelProduct extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%product_money_channel_product}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['money_channel_id', 'product_class_id', 'rate_type', 'fixed_day', 'status', 'fine_grace_days', 'inerest_type', 'money_type_id', 'order'], 'integer'],
            [['cost_rate_day', 'cost_rate_month', 'cost_rate_year', 'sale_rate_day', 'sale_rate_month', 'sale_rate_year', 'max_rate_add', 'min_rate_add', 'fine_coefficient'], 'number'],
            [['description'], 'string'],
            [['code', 'name', 'name_alias', 'pay_period_var', 'pay_type_var'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '自动增长ID',
            'money_channel_id' => '资产通道ID 来源于sys_money_channel',
            'product_class_id' => '产品类别',
            'code' => '类型代码',
            'name' => '名称',
            'name_alias' => '别名',
            'cost_rate_day' => '日成本',
            'cost_rate_month' => '月成本',
            'cost_rate_year' => '年成本',
            'sale_rate_day' => '销售日利率',
            'sale_rate_month' => '销售月利率',
            'sale_rate_year' => '销售年利率',
            'max_rate_add' => '最大浮动利率',
            'min_rate_add' => '最小浮动利率',
            'rate_type' => '计算方式  1 日  2 月 3 年',
            'pay_period_var' => '支持的还款周期（数组）1个月，3个月，6个月，9个月等',
            'pay_type_var' => '支持的还款方式（数组）按月付息到期还本，等额本息，固定还款日期，随借随还',
            'fixed_day' => '每月固定时间还款的日期号',
            'status' => '状态',
            'fine_grace_days' => '罚息-宽限天数',
            'fine_coefficient' => '罚息系数 (一般大于0)',
            'inerest_type' => '计息方式：1：T+1 2：T+0',
            'money_type_id' => '资金方式 1:代收代付 2:直收直付 3:代收直付 4:直收代付',
            'description' => '说明',
            'order' => '排序',
            'created_at' => '创建时间',
            'updated_at' => '更新时间',
        ];
    }

    /*取得产品分类
     * */
    public  function  getProductClass()
    {
        return $this->hasOne(ProductClass::className(),['id'=>'product_class_id']);
    }

    /*取得资鑫通道
     * */

    public  function  getProductMoneyChannel()
    {
        return  $this->hasOne(ProductMoneyChannel::className(),['id'=>'money_channel_id']);

    }


    /**
     * @inheritdoc
     * @return \common\models\query\ProductMoneyChannelProductQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\ProductMoneyChannelProductQuery(get_called_class());
    }
}
