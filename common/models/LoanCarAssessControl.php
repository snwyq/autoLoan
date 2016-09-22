<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%loan_car_assess_control}}".
 *
 * @property integer $id
 * @property integer $car_id
 * @property integer $loan_id
 * @property integer $put_stor_time
 * @property string $put_stor_reason
 * @property string $tag_code
 * @property string $car_owner
 * @property integer $control_by_id
 * @property integer $control_time
 * @property integer $control_type
 * @property string $car_certificate_number
 * @property string $control_address
 * @property string $transfer_person
 * @property string $transfer_telephone
 * @property string $transfer_card_number
 * @property integer $transfer_time
 * @property string $car_license_number
 * @property string $control_description
 * @property integer $if_all_docment
 * @property string $car_condition
 * @property integer $order
 * @property string $remarks
 * @property integer $status
 * @property integer $created_by
 * @property integer $created_at
 * @property integer $updated_at
 */
class LoanCarAssessControl extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%loan_car_assess_control}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['car_id', 'loan_id', 'put_stor_time', 'control_by_id', 'control_time', 'control_type', 'transfer_time', 'if_all_docment', 'order', 'status', 'created_by'], 'integer'],
            [['put_stor_reason', 'car_certificate_number', 'transfer_person', 'car_condition'], 'string', 'max' => 50],
            [['tag_code', 'control_address'], 'string', 'max' => 200],
            [['car_owner', 'transfer_telephone', 'transfer_card_number', 'car_license_number'], 'string', 'max' => 20],
            [['control_description', 'remarks'], 'string', 'max' => 500],
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
            'loan_id' => '借款单ID',
            'put_stor_time' => '入库日期',
            'put_stor_reason' => '入库原因：1 借款入库 2 置换入库',
            'tag_code' => '盘库黄色标签码',
            'car_owner' => '车辆所有人',
            'control_by_id' => '监管人员ID',
            'control_time' => '监管日期',
            'control_type' => '监管方式 1:质押',
            'car_certificate_number' => '机动车登记证书号',
            'control_address' => '监管地点',
            'transfer_person' => '过户备案人',
            'transfer_telephone' => '过户人联系方式',
            'transfer_card_number' => '过户人身份证号',
            'transfer_time' => '过户时间',
            'car_license_number' => '车牌号',
            'control_description' => '监管理由',
            'if_all_docment' => '车辆资料是否齐全 1:齐全 0:不齐全',
            'car_condition' => '车辆权证是否齐全并具备过户条件',
            'order' => '排序',
            'remarks' => '备注',
            'status' => '状态  1:正常 0:删除',
            'created_by' => '监管操作员ID',
            'created_at' => '创建时间',
            'updated_at' => '更新时间',
        ];
    }

    /**
     * @inheritdoc
     * @return \common\models\query\LoanCarAssessControlQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\LoanCarAssessControlQuery(get_called_class());
    }
}
