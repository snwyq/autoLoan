<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%company_trade_condition}}".
 *
 * @property integer $id
 * @property integer $customer_id
 * @property integer $year
 * @property integer $month
 * @property integer $trade_count
 * @property integer $trade_money
 * @property string $trade_cost
 * @property integer $trade_profit_margin
 * @property integer $sell_num
 * @property integer $sell_money
 * @property integer $stock_money
 * @property string $sell_condition
 * @property string $buy_condition
 * @property string $remark
 * @property integer $order
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 */
class CompanyTradeCondition extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%company_trade_condition}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['customer_id', 'year', 'month', 'trade_count', 'trade_money', 'trade_profit_margin', 'sell_num', 'sell_money', 'stock_money', 'order', 'status'], 'integer'],
            [['year'], 'required'],
            [['trade_cost'], 'number'],
            [['remark'], 'string'],
            [['sell_condition', 'buy_condition'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '自动增长ID',
            'customer_id' => '企业ID',
            'year' => '年份',
            'month' => '月份',
            'trade_count' => '经营数量 新：实时库存数量',
            'trade_money' => '旧：经营销售额，新：投入运营资金额',
            'trade_cost' => '成本额（万元）',
            'trade_profit_margin' => '利润率',
            'sell_num' => '近半年月均销售数量',
            'sell_money' => '近半年月均销售金额',
            'stock_money' => '月均库存金额',
            'sell_condition' => '上游车源情况',
            'buy_condition' => '下游客户情况',
            'remark' => '备注',
            'order' => '排序',
            'status' => '状态',
            'created_at' => '创建时间',
            'updated_at' => '更新时间',
        ];
    }

    /**
     * @inheritdoc
     * @return \common\models\query\CompanyTradeConditionQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\CompanyTradeConditionQuery(get_called_class());
    }
}
