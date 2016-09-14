<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%company_biz_address}}".
 *
 * @property integer $id
 * @property integer $customer_id
 * @property string $address
 * @property integer $modality
 * @property string $area
 * @property integer $start_time
 * @property integer $end_time
 * @property string $coordinate_x
 * @property string $coordinate_y
 * @property string $remark
 * @property integer $order
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 */
class CompanyBizAddress extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%company_biz_address}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['customer_id'], 'required'],
            [['customer_id', 'modality', 'start_time', 'end_time', 'order', 'status'], 'integer'],
            [['area'], 'number'],
            [['remark'], 'string'],
            [['address'], 'string', 'max' => 100],
            [['coordinate_x', 'coordinate_y'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '自动增长ID',
            'customer_id' => '用户user_id',
            'address' => '场所地址',
            'modality' => '所属形式（1：自有 2：租赁 3:市场内经营）',
            'area' => '面积',
            'start_time' => '开始时间',
            'end_time' => '结束时间',
            'coordinate_x' => '坐标X',
            'coordinate_y' => '坐标Y',
            'remark' => '备注',
            'order' => '排序',
            'status' => '状态（1：正常 0：删除）',
            'created_at' => '创建时间',
            'updated_at' => '更新时间',
        ];
    }

    /**
     * @inheritdoc
     * @return \common\models\query\CompanyBizAddressQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\CompanyBizAddressQuery(get_called_class());
    }
}
