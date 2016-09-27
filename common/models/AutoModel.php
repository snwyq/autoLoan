<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%auto_model}}".
 *
 * @property integer $id
 * @property integer $model_id
 * @property string $model_name
 * @property integer $brand_id
 * @property integer $series_id
 * @property double $model_price
 * @property string $liter
 */
class AutoModel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%auto_model}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['model_id', 'model_name', 'brand_id', 'series_id'], 'required'],
            [['model_id', 'brand_id', 'series_id'], 'integer'],
            [['model_price'], 'number'],
            [['model_name'], 'string', 'max' => 100],
            [['liter'], 'string', 'max' => 10],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'model_id' => '车300ID',
            'model_name' => 'Model Name',
            'brand_id' => 'Brand ID',
            'series_id' => 'Series ID',
            'model_price' => 'Model Price',
            'liter' => 'Liter',
        ];
    }


    public static function getModelBySeries($id = null)
    {
        if (is_null($id)) {
            return [];
        }

        $model = Yii::$app->cache->get(['model', $id]);
        if ($model === false) {
            $model = self::find()->where(['series_id' => $id])->select('model_name')->indexBy('model_id')->column();
            Yii::$app->cache->set(['model', $id], $model);
        }
        return $model;
    }


    public static function  parseFullmodel($brand,$series,$model)
    {

        return "testbrand".'testseries'.'testsereismodel';
    }


    /**
     * @inheritdoc
     * @return \common\models\query\AutoModelQuery the active query used by this AR class.
     */
    public
    static function find()
    {
        return new \common\models\query\AutoModelQuery(get_called_class());
    }

    public
    static function  getAutoModel()
    {
        return static::find()->select('model_name')->indexBy('model_id')->column();
    }
}
