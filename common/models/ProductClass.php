<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%product_class}}".
 *
 * @property integer $id
 * @property integer $pid
 * @property string $code
 * @property string $name
 * @property string $name_alias
 * @property integer $status
 * @property integer $order
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $description
 * @property integer $manager_id
 */
class ProductClass extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%product_class}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pid', 'status', 'order', 'manager_id'], 'integer'],
            [['description'], 'string'],
            [['code'], 'string', 'max' => 50],
            [['name', 'name_alias'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '自动增长ID',
            'pid' => '父ID',
            'code' => '代码',
            'name' => '名称标题',
            'name_alias' => '别名',
            'status' => '状态',
            'order' => '排序',
            'created_at' => '创建时间',
            'updated_at' => '更新时间',
            'description' => '产品备注',
            'manager_id' => '录入人',
        ];
    }

    /**
     * @inheritdoc
     * @return \common\models\query\ProductClassQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\ProductClassQuery(get_called_class());
    }

    public  static  function  getProductList(){

        return  static::find()->select('name')->indexBy('id')->column();
    }
}
