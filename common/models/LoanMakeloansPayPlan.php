<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%loan_makeloans_pay_plan}}".
 *
 * @property integer $id
 * @property integer $customer_id
 * @property integer $loan_id
 * @property integer $makeloan_id
 * @property integer $back_money_time
 * @property string $back_money
 * @property integer $urged_time
 * @property string $change_money
 * @property integer $real_back_money_time
 * @property string $principal_money
 * @property string $interest_money
 * @property string $remaining_money
 * @property integer $is_overdual
 * @property integer $manager_id
 * @property string $remark
 * @property integer $attachment_num
 * @property integer $order
 * @property integer $status
 * @property integer $is_compensatory
 * @property integer $is_urged
 * @property integer $created_at
 * @property integer $updated_at
 */
class LoanMakeloansPayPlan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%loan_makeloans_pay_plan}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['customer_id', 'loan_id', 'makeloan_id', 'back_money_time', 'urged_time', 'real_back_money_time', 'is_overdual', 'manager_id', 'attachment_num', 'order', 'status', 'is_compensatory', 'is_urged'], 'integer'],
            [['back_money', 'change_money', 'principal_money', 'interest_money', 'remaining_money'], 'number'],
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
            'loan_id' => '借款主表ticket_id',
            'makeloan_id' => '放款单ID',
            'back_money_time' => '还款日期',
            'back_money' => '还款金额',
            'urged_time' => '催还日期',
            'change_money' => '调整金额',
            'real_back_money_time' => '真实还款日期',
            'principal_money' => '本期的本金',
            'interest_money' => '本期的利息',
            'remaining_money' => '上期结余的金额',
            'is_overdual' => '是否逾期 1-否 0-是',
            'manager_id' => '管理员ID（生成计划）',
            'remark' => '备注',
            'attachment_num' => '附件数量',
            'order' => '排序',
            'status' => '状态 1-待提报 2-待财务确认 3-财务已经确认 -1 删除的',
            'is_compensatory' => '是否代偿 0：没有代偿 1：代偿',
            'is_urged' => '是否催款 1 已催',
            'created_at' => '创建时间',
            'updated_at' => '更新时间',
        ];
    }

    /**
     * @inheritdoc
     * @return \common\models\query\LoanMakeloansPayPlanQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\LoanMakeloansPayPlanQuery(get_called_class());
    }
}
