<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%person_family_income}}".
 *
 * @property integer $id
 * @property integer $customer_id
 * @property integer $income_type
 * @property integer $price_amount
 * @property string $remark
 * @property integer $order
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 */
class PersonFamilyIncome extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%person_family_income}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['customer_id', 'income_type', 'price_amount', 'order', 'status'], 'integer'],
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
            'customer_id' => '借款人ID',
            'income_type' => '项目类型 1:租金收入 2:工资收入 3:其他收入',
            'price_amount' => '金额',
            'remark' => '备注说明',
            'order' => '排序',
            'status' => '状态  1:正常 0:删除',
            'created_at' => '创建时间',
            'updated_at' => '更新时间',
        ];
    }

    /**
     * @inheritdoc
     * @return \common\models\query\PersonFamilyIncomeQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\PersonFamilyIncomeQuery(get_called_class());
    }
}
