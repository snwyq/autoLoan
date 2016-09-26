<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%auto_brand}}".
 *
 * @property integer $id
 * @property integer $brand_id
 * @property string $brand_name
 * @property string $brand_initial
 * @property string $brand_icon
 */
class AutoBrand extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%auto_brand}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['brand_id', 'brand_name'], 'required'],
            [['brand_id'], 'integer'],
            [['brand_name'], 'string', 'max' => 100],
            [['brand_initial'], 'string', 'max' => 1],
            [['brand_icon'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'brand_id' => '车300ID',
            'brand_name' => 'Brand Name',
            'brand_initial' => 'Brand Initial',
            'brand_icon' => 'Brand Icon',
        ];
    }

    /**
     * @inheritdoc
     * @return \common\models\query\AutoBrandQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\AutoBrandQuery(get_called_class());
    }

    public  static  function  getBrand()
    {
        return  static::find()->select('brand_name')->indexBy('id')->column();
    }
}
