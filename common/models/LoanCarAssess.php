<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%loan_car_assess}}".
 *
 * @property integer $id
 * @property integer $car_id
 * @property integer $loan_id
 * @property integer $customer_id
 * @property string $car_displacement
 * @property integer $car_change_num
 * @property integer $first_plate_date
 * @property integer $car_mileage
 * @property integer $car_yearly_check_due_time
 * @property integer $car_insurance_due_time
 * @property string $fire_car_flag
 * @property string $car_water_flag
 * @property string $car_insurance_due_description
 * @property string $car_surface
 * @property string $car_interior
 * @property string $car_engine
 * @property string $car_malfunction
 * @property string $car_condition
 * @property integer $audit_assess_money
 * @property integer $audit_discount
 * @property string $audit_money
 * @property integer $aduit_at
 * @property integer $audit_by
 * @property string $audit_remark
 * @property string $car_use
 * @property string $car_owner
 * @property string $car_checking_grade
 * @property integer $assess_by
 * @property integer $assess_at
 * @property string $assess_discount
 * @property string $assess_money
 * @property string $car_description
 * @property string $new_auto_price
 * @property string $bigdata_price_1
 * @property string $bigdata_price_2
 * @property string $bigdata_price_3
 * @property string $remark
 * @property integer $order
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 */
class LoanCarAssess extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%loan_car_assess}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['car_id', 'loan_id', 'customer_id', 'car_change_num', 'first_plate_date', 'car_mileage', 'car_yearly_check_due_time', 'car_insurance_due_time', 'audit_assess_money', 'audit_discount', 'aduit_at', 'audit_by', 'assess_by', 'assess_at', 'order', 'status'], 'integer'],
            [['audit_money', 'assess_discount', 'assess_money', 'new_auto_price', 'bigdata_price_1', 'bigdata_price_2', 'bigdata_price_3'], 'number'],
            [['audit_remark', 'car_description', 'remark'], 'string'],
            [['car_displacement', 'car_owner'], 'string', 'max' => 20],
            [['fire_car_flag', 'car_water_flag', 'car_surface', 'car_engine', 'car_malfunction', 'car_condition'], 'string', 'max' => 100],
            [['car_insurance_due_description'], 'string', 'max' => 500],
            [['car_interior'], 'string', 'max' => 200],
            [['car_use'], 'string', 'max' => 50],
            [['car_checking_grade'], 'string', 'max' => 30],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '自动增长ID',
            'car_id' => '车辆ID',
            'loan_id' => '业务单据ID',
            'customer_id' => '借款人ID',
            'car_displacement' => '排量 L',
            'car_change_num' => '过户次数',
            'first_plate_date' => '车辆上牌日期',
            'car_mileage' => '行驶里程(公里)',
            'car_yearly_check_due_time' => '年检到期时间',
            'car_insurance_due_time' => '交强险 到期时间',
            'fire_car_flag' => '是否火烧车',
            'car_water_flag' => '是否水泡车',
            'car_insurance_due_description' => '保险情况',
            'car_surface' => '外观钣金结构评估（良好/正常/较差）',
            'car_interior' => '车辆内饰及配备评估（良好/正常/较差）',
            'car_engine' => '车辆机械状况评估（良好/正常/较差）',
            'car_malfunction' => '严重事故车（是/否）',
            'car_condition' => '车辆权证是否齐全并具备过户条件',
            'audit_assess_money' => '总部评估定价',
            'audit_discount' => '最终折扣率(1-100)',
            'audit_money' => '最终放款额',
            'aduit_at' => '审核时间',
            'audit_by' => '审核人',
            'audit_remark' => '审核说明',
            'car_use' => '原车用途（非营运 营运 其它）',
            'car_owner' => '车主姓名',
            'car_checking_grade' => '车辆质检等级',
            'assess_by' => '评估师ID',
            'assess_at' => '评估时间',
            'assess_discount' => '折扣率',
            'assess_money' => '评估价',
            'car_description' => '车况描述',
            'new_auto_price' => '新车指导价',
            'bigdata_price_1' => '评估网站评估价1',
            'bigdata_price_2' => '评估网站评估价2',
            'bigdata_price_3' => '评估网站评估价3',
            'remark' => '备注说明',
            'order' => '排序',
            'status' => '状态  1:正常 0:删除',
            'created_at' => '创建时间',
            'updated_at' => '更新时间',
        ];
    }

    /**
     * @inheritdoc
     * @return \common\models\query\LoanCarAssessQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\LoanCarAssessQuery(get_called_class());
    }
}
