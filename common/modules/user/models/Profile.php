<?php

namespace common\modules\user\models;

use common\models\City;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\helpers\Url;

/**
 * This is the model class for table "{{%profile}}".
 *
 * @property integer $id
 * @property integer $money
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $signature
 * @property string $avatar
 * @property integer $gender
 */
class Profile extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%profile}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['area'], 'required', 'when' => function($model) {
                $provinceValue = $model->province;
                $provinceIsEmpty = $provinceValue === null || $provinceValue === [] || $provinceValue === '';
                $cityValue = $model->city;
                $cityIsEmpty = $cityValue === null || $cityValue === [] || $cityValue === '';
                return !$provinceIsEmpty || !$cityIsEmpty;
            }, 'whenClient' => "function(attribute, value){
                return $('#profile-province').val() || $('#profile-city').val();
            }"],
            [['province', 'city', 'area'], 'integer'],
            [['gender'], 'integer'],
            [['money'], 'integer', 'on' => 'charge'], // 充值场景
            [['signature'], 'string', 'max' => 100],
            [['qq'], 'string', 'max' => 20],
            [['phone'], 'match', 'pattern' => '/^1[0-9]{10}$/'],
            [['avatar'], 'string', 'max' => 255],
            ['locale', 'default', 'value' => Yii::$app->language],
            ['locale', 'in', 'range' => array_keys(Yii::$app->params['availableLocales'])],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'money' => Yii::t('common', 'Money'),
            'created_at' => Yii::t('common', 'Created At'),
            'updated_at' => Yii::t('common', 'Updated At'),
            'signature' => Yii::t('common', 'Signature'),
            'avatar' => Yii::t('common', 'Avatar'),
            'gender' => Yii::t('common', 'Gender'),
            'locale' => '语言',
            'qq' => 'QQ',
            'phone' => '手机',
            'province' => '省',
            'city' => '市',
            'area' => '区',
            'fullArea' => '所在地',
        ];
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::className()
        ];
    }

    public static function getGenderList()
    {
        return [Yii::t('common', 'Male'), Yii::t('common', 'Famale')];
    }

    public static function getLocaleList()
    {
        return Yii::$app->params['availableLocales'];
    }

    /**不应该依赖City
     * @return string
     */
    public function getFullArea()
    {
        return City::createFullArea($this->province, $this->city, $this->area);
    }
}
