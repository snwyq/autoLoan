<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%loan_car}}".
 *
 * @property integer $id
 * @property integer $loan_id
 * @property integer $customer_id
 * @property integer $car_brand_id
 * @property integer $car_series_id
 * @property integer $car_model_id
 * @property string $car_displacement
 * @property integer $car_years
 * @property string $car_engine_model_name
 * @property string $car_vin
 * @property integer $car_outprice
 * @property integer $car_start_time
 * @property integer $car_out_time
 * @property string $car_color
 * @property string $car_interior_color
 * @property integer $order
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $emission_standard
 */
class LoanCar extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%loan_car}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['loan_id', 'customer_id', 'car_brand_id', 'car_series_id', 'car_model_id', 'car_years', 'car_outprice', 'car_start_time', 'car_out_time', 'order', 'status'], 'integer'],
            [['car_displacement'], 'string', 'max' => 20],
            [['car_engine_model_name', 'car_vin', 'emission_standard'], 'string', 'max' => 50],
            [['car_color', 'car_interior_color'], 'string', 'max' => 10],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '自动增长ID',
            'loan_id' => '业务单据ID',
            'customer_id' => '借款人ID',
            'car_brand_id' => '品牌ID',
            'car_series_id' => '系列ID',
            'car_model_id' => '车型ID',
            'car_displacement' => '排量 L',
            'car_years' => '车的年份',
            'car_engine_model_name' => '发动机型号',
            'car_vin' => '车架号',
            'car_outprice' => '出售价',
            'car_start_time' => '初登日期(车辆登记销售日期)',
            'car_out_time' => '出厂日期',
            'car_color' => '车身颜色',
            'car_interior_color' => '内饰颜色',
            'order' => '排序',
            'status' => '车辆状态 1:待评估 2:待核价 3:待监管 4:监管中 5：置换中 6：待出库 7：出库',
            'created_at' => '创建时间',
            'updated_at' => '更新时间',
            'emission_standard' => '排放标准',
        ];
    }

    /**
     * @inheritdoc
     * @return \common\models\query\LoanCarQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\LoanCarQuery(get_called_class());
    }
}
