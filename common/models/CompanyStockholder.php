<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%company_stockholder}}".
 *
 * @property integer $id
 * @property integer $customer_id
 * @property string $name
 * @property string $capital_amount
 * @property string $reality_amount
 * @property integer $investment_type
 * @property string $card_number
 * @property string $investment_rate
 * @property string $remark
 * @property integer $order
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 */
class CompanyStockholder extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%company_stockholder}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['customer_id', 'capital_amount', 'reality_amount', 'investment_type', 'order', 'status'], 'integer'],
            [['name'], 'required'],
            [['investment_rate'], 'number'],
            [['remark'], 'string'],
            [['name'], 'string', 'max' => 200],
            [['card_number'], 'string', 'max' => 30],
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
            'name' => '股东名称',
            'capital_amount' => '出资金额',
            'reality_amount' => '实缴金额',
            'investment_type' => '出资形式',
            'card_number' => '身份证号',
            'investment_rate' => '占股比例',
            'remark' => '备注',
            'order' => '排序',
            'status' => '状态（0：删除 1：正常）',
            'created_at' => '创建时间',
            'updated_at' => '更新时间',
        ];
    }

    /**
     * @inheritdoc
     * @return \common\models\query\CompanyStockholderQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\CompanyStockholderQuery(get_called_class());
    }
}
