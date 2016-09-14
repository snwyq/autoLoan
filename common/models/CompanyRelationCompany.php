<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%company_relation_company}}".
 *
 * @property integer $id
 * @property integer $customer_id
 * @property string $company_name
 * @property string $rela_form
 * @property string $remark
 * @property integer $order
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $rela_customer_id
 */
class CompanyRelationCompany extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%company_relation_company}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['customer_id', 'order', 'status', 'rela_customer_id'], 'integer'],
            [['company_name'], 'required'],
            [['remark'], 'string'],
            [['company_name'], 'string', 'max' => 100],
            [['rela_form'], 'string', 'max' => 50],
            [['customer_id'], 'unique'],
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
            'company_name' => '关联企业名称',
            'rela_form' => '关联形式',
            'remark' => '备注说明',
            'order' => '排序',
            'status' => '状态',
            'created_at' => '创建时间',
            'updated_at' => '更新时间',
            'rela_customer_id' => '关联企业ID',
        ];
    }

    /**
     * @inheritdoc
     * @return \common\models\query\CompanyRelationCompanyQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\CompanyRelationCompanyQuery(get_called_class());
    }
}
