<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%company_change_history}}".
 *
 * @property integer $id
 * @property integer $customer_id
 * @property integer $change_time
 * @property string $change_title
 * @property string $before_content
 * @property string $after_content
 * @property string $remark
 * @property integer $order
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 */
class CompanyChangeHistory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%company_change_history}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['customer_id', 'change_time', 'order', 'status'], 'integer'],
            [['before_content', 'after_content', 'remark'], 'string'],
            [['change_title'], 'string', 'max' => 50],
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
            'change_time' => '变更时间',
            'change_title' => '变更概要 如公司名称、住所、法定代表人、注册资本、公司组织形式、经营范围、营业期限、',
            'before_content' => '变更前内容',
            'after_content' => '变更后情况',
            'remark' => '备注说明',
            'order' => '排序',
            'status' => '状态（1：正常  0：删除）',
            'created_at' => '创建时间',
            'updated_at' => '更新时间',
        ];
    }

    /**
     * @inheritdoc
     * @return \common\models\query\CompanyChangeHistoryQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\CompanyChangeHistoryQuery(get_called_class());
    }
}
