<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%auto_series}}".
 *
 * @property integer $id
 * @property integer $series_id
 * @property string $series_name
 * @property string $series_group_name
 * @property integer $brand_id
 */
class AutoSeries extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%auto_series}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['series_id', 'series_name', 'brand_id'], 'required'],
            [['series_id', 'brand_id'], 'integer'],
            [['series_name', 'series_group_name'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'series_id' => '车300ID',
            'series_name' => 'Series Name',
            'series_group_name' => 'Series Group Name',
            'brand_id' => 'Brand ID',
        ];
    }

    /**
     * @inheritdoc
     * @return \common\models\query\AutoSeriesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\AutoSeriesQuery(get_called_class());
    }
}
