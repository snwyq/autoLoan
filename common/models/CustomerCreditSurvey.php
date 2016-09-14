<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%customer_credit_survey}}".
 *
 * @property integer $id
 * @property integer $apply_id
 * @property integer $suvey_by
 * @property integer $customer_id
 * @property integer $oldcustomer_flag
 * @property integer $overdue_flag
 * @property string $card_address
 * @property string $live_desp
 * @property integer $auto_work_year_id
 * @property integer $family_net_assets
 * @property integer $total_liabilities
 * @property integer $from_other_biz_money
 * @property integer $month_sales_amount
 * @property integer $month_stock_num
 * @property integer $growth_in_sales
 * @property string $sales_profit
 * @property integer $turnover_days
 * @property integer $turnover_days_min
 * @property integer $forecasts_growth
 * @property string $credit_desp
 * @property string $biz_desp
 * @property string $financing_purpose
 * @property string $other_purpose
 * @property string $investigation
 * @property integer $is_Lease_contract_flag
 * @property integer $industry_experience_flag
 * @property integer $second_hand_car_experience_flag
 * @property integer $bad_credit_flag
 * @property integer $cars_stop_number
 * @property string $remark
 * @property integer $order
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 */
class CustomerCreditSurvey extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%customer_credit_survey}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['apply_id', 'suvey_by', 'customer_id', 'oldcustomer_flag', 'overdue_flag', 'auto_work_year_id', 'family_net_assets', 'total_liabilities', 'from_other_biz_money', 'month_sales_amount', 'month_stock_num', 'growth_in_sales', 'turnover_days', 'turnover_days_min', 'forecasts_growth', 'is_Lease_contract_flag', 'industry_experience_flag', 'second_hand_car_experience_flag', 'bad_credit_flag', 'cars_stop_number', 'order', 'status'], 'integer'],
            [['customer_id'], 'required'],
            [['sales_profit'], 'number'],
            [['credit_desp', 'biz_desp', 'financing_purpose', 'other_purpose', 'investigation'], 'string'],
            [['card_address', 'live_desp'], 'string', 'max' => 200],
            [['remark'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '自动增长ID',
            'apply_id' => '授信申请ID',
            'suvey_by' => '背调来源 （ 1 市场  2 总部风控）',
            'customer_id' => '借款主体ID',
            'oldcustomer_flag' => '是否老客户',
            'overdue_flag' => '征信是否有逾期',
            'card_address' => '户口所在地',
            'live_desp' => '居住情况',
            'auto_work_year_id' => '行业经验',
            'family_net_assets' => '家庭净资产',
            'total_liabilities' => '负债总额',
            'from_other_biz_money' => '其它渠道提供的营运资金',
            'month_sales_amount' => '月均销售额',
            'month_stock_num' => '月均库存额',
            'growth_in_sales' => '销售额增长率',
            'sales_profit' => '销售利润率',
            'turnover_days' => '周转天数',
            'turnover_days_min' => '最快周转天数',
            'forecasts_growth' => '预计增长率',
            'credit_desp' => '借款人资信情况',
            'biz_desp' => '企业经营情况',
            'financing_purpose' => '融资用途说明',
            'other_purpose' => '其它相关说明',
            'investigation' => '调查情况说明',
            'is_Lease_contract_flag' => '是否可以提供场地租赁合同（1：可以  0：不可以）',
            'industry_experience_flag' => '借款人行业经验是否2年以上（0：否，1：是）',
            'second_hand_car_experience_flag' => '是否正常从事二手车经营1年以上（0：否，1：是）',
            'bad_credit_flag' => '借款人近三年内是否有重大不良信用记录:（0：没有  1：有）',
            'cars_stop_number' => '车位数量',
            'remark' => '备注',
            'order' => '排序',
            'status' => '状态',
            'created_at' => '创建时间',
            'updated_at' => '更新时间',
        ];
    }

    /**
     * @inheritdoc
     * @return \common\models\query\CustomerCreditSurveyQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\CustomerCreditSurveyQuery(get_called_class());
    }
}
