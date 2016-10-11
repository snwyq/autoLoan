<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%loan_car_check}}".
 *
 * @property integer $id
 * @property integer $loan_id
 * @property integer $car_id
 * @property integer $check_class_id
 * @property integer $check_type_id
 * @property integer $plan_check_manager_by
 * @property integer $plan_check_time
 * @property integer $check_by_id
 * @property integer $check_result
 * @property integer $check_time
 * @property string $check_description
 * @property string $check_longitude
 * @property string $check_latitude
 * @property integer $audit_status
 * @property integer $audit_by
 * @property string $audit_description
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 */
class LoanCarCheck extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%loan_car_check}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['loan_id', 'car_id', 'check_class_id', 'check_type_id', 'plan_check_manager_by', 'check_by_id', 'check_result',  'audit_status', 'audit_by', 'status'], 'integer'],
            [['audit_description'], 'string'],
            [['check_description', 'check_longitude', 'check_latitude'], 'string', 'max' => 100],

            [['check_time', 'plan_check_time'], 'filter', 'filter' => function ($value) {
                return is_numeric($value) ? $value : strtotime($value);
            }, 'skipOnEmpty' => true],

        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '自增ID',
            'loan_id' => '业务票据ID',
            'car_id' => '贷款抵押车辆',
            'check_class_id' => '盘库类别',
            'check_type_id' => '盘库内容',
            'plan_check_manager_by' => '抽检安排人',
            'plan_check_time' => '计划抽检时间',
            'check_by_id' => '车辆盘库员ID',
            'check_result' => '盘查结果',
            'check_time' => '车辆盘查时间',
            'check_description' => '车辆异常情况说明',
            'check_longitude' => '车辆盘点地经度',
            'check_latitude' => '车辆盘点地纬度',
            'audit_status' => '车辆总部确认盘库结果',
            'audit_by' => '后台车辆审核人员ID',
            'audit_description' => '审核备注',
            'status' => '状态  1:正常 0:删除',
            'created_at' => '创建时间',
            'updated_at' => '更新时间',
        ];
    }



    public  function  getLoanCar()
    {
        return $this->hasOne(LoanCar::className(),['id'=>'car_id']);
    }

    /*
     * 得到盘库类型
     * */

    /**
     * @return array
     */
    public static function  getCheckClass()
    {
        return [
            '1' => '日常盘库',
            '2' => "抽检",
        ];
    }

    public static function  getCheckType()
    {
        return [
            '1' => '车辆',
            '2' => "手续",

        ];
    }

    public static function  getCheckResult()
    {
        return [
            '0' => '未盘',
            '1' => '正常',
            '2' => "异常",

        ];
    }


    /**
     * @inheritdoc
     * @return \common\models\query\LoanCarCheckQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\LoanCarCheckQuery(get_called_class());
    }
}
