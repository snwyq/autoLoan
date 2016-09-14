<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%person_family_house}}".
 *
 * @property integer $id
 * @property integer $customer_id
 * @property string $name
 * @property integer $house_type
 * @property double $area
 * @property integer $price
 * @property string $address
 * @property integer $loan_flag
 * @property integer $decorate_type
 * @property integer $rent_flag
 * @property string $remark
 * @property integer $order
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 */
class PersonFamilyHouse extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%person_family_house}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['customer_id', 'house_type', 'price', 'loan_flag', 'decorate_type', 'rent_flag', 'order', 'status'], 'integer'],
            [['area'], 'number'],
            [['name'], 'string', 'max' => 20],
            [['address'], 'string', 'max' => 40],
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
            'name' => '所有权人姓名',
            'house_type' => '房产性质 1:商品房 2:自建',
            'area' => '面积',
            'price' => '房产价值',
            'address' => '所在位置',
            'loan_flag' => '是否贷款 1:是 0:否',
            'decorate_type' => '装修情况 1:简装 2:精装 3:豪装',
            'rent_flag' => '是否出租 1:是 0:否',
            'remark' => '备注说明',
            'order' => '排序',
            'status' => '状态 1:正常 0:删除',
            'created_at' => '创建时间',
            'updated_at' => '更新时间',
        ];
    }

    public static  function  getHousetype(){
        return  [
            '1'=>'商品房',
            '2'=>'自建房',
        ];
    }



    /**
     * @inheritdoc
     * @return \common\models\query\PersonFamilyHouseQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\PersonFamilyHouseQuery(get_called_class());
    }
}
