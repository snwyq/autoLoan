<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%person_family_car}}".
 *
 * @property integer $id
 * @property integer $customer_id
 * @property string $user_name
 * @property integer $brand_id
 * @property integer $series_id
 * @property integer $auto_type_id
 * @property string $car_plate
 * @property integer $buytime
 * @property string $price
 * @property string $mileage
 * @property string $remark
 * @property integer $order
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 */
class PersonFamilyCar extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%person_family_car}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['customer_id'], 'required'],
            [['customer_id', 'brand_id', 'series_id', 'auto_type_id', 'buytime', 'order', 'status'], 'integer'],
            [['price', 'mileage'], 'number'],
            [['remark'], 'string'],
            [['user_name', 'car_plate'], 'string', 'max' => 20],
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
            'user_name' => '所属人',
            'brand_id' => '品牌系列',
            'series_id' => '品牌型号',
            'auto_type_id' => '品牌款式',
            'car_plate' => '车牌号',
            'buytime' => '购置日期',
            'price' => '购买价格',
            'mileage' => '公里数',
            'remark' => '备注说明',
            'order' => '排序',
            'status' => '状态  1:正常 0:删除',
            'created_at' => '创建时间',
            'updated_at' => '更新时间',
        ];
    }

    /**
     * @inheritdoc
     * @return \common\models\query\PersonFamilyCarQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\PersonFamilyCarQuery(get_called_class());
    }
}
