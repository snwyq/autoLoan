<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%product_money_channel}}".
 *
 * @property integer $id
 * @property string $code
 * @property string $name
 * @property string $contacts_name
 * @property string $contacts_phone
 * @property integer $company_type_id
 * @property integer $province_id
 * @property integer $city_id
 * @property integer $area_id
 * @property string $address
 * @property string $description
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $status
 * @property integer $order
 * @property integer $begin_time
 * @property integer $end_time
 */
class ProductMoneyChannel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%product_money_channel}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['company_type_id', 'province_id', 'city_id', 'area_id', 'status', 'order', 'begin_time', 'end_time'], 'integer'],
            [['description'], 'string'],
            [['code', 'name', 'address'], 'string', 'max' => 200],
            [['contacts_name', 'contacts_phone'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '自动增长ID',
            'code' => '类型代码',
            'name' => '资金方名称',
            'contacts_name' => '联系人',
            'contacts_phone' => '联系电话',
            'company_type_id' => '渠道性质',
            'province_id' => '省份ID',
            'city_id' => '所在城市ID',
            'area_id' => '地区ID',
            'address' => '办公详细地址',
            'description' => '说明',
            'created_at' => '创建时间',
            'updated_at' => '更新时间',
            'status' => '状态',
            'order' => '排序',
            'begin_time' => '开始时间',
            'end_time' => '结束时间',
        ];
    }

    /**
     * @inheritdoc
     * @return \common\models\query\ProductMoneyChannelQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\ProductMoneyChannelQuery(get_called_class());
    }

    public  static  function  getMoneychannel(){

        return  static::find()->select('name')->indexBy('id')->column();
    }
}
