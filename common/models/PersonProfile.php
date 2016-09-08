<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%person_profile}}".
 *
 * @property integer $id
 * @property integer $customer_id
 * @property string $name
 * @property integer $sex_id
 * @property string $nation
 * @property integer $card_type_id
 * @property string $card_number
 * @property integer $card_province_id
 * @property integer $card_city_id
 * @property integer $card_area_id
 * @property string $card_address
 * @property integer $province_id
 * @property integer $city_id
 * @property integer $area_id
 * @property string $address
 * @property integer $educational_id
 * @property integer $marriage_type_id
 * @property integer $houseflag
 * @property integer $carflag
 * @property string $email
 * @property integer $birth
 * @property string $mobile
 * @property string $work_years
 * @property integer $auto_work_year_id
 * @property integer $work_position_id
 * @property integer $income
 * @property integer $company_id
 * @property string $company_name
 * @property string $company_address
 * @property string $phone
 * @property string $other_contact
 * @property string $other_phone
 * @property string $description
 * @property integer $manager_id
 * @property integer $status
 * @property integer $order
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $created_by
 * @property integer $updated_by
 */
class PersonProfile extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%person_profile}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['customer_id', 'sex_id', 'card_type_id', 'card_province_id', 'card_city_id', 'card_area_id', 'province_id', 'city_id', 'area_id', 'educational_id', 'marriage_type_id', 'houseflag', 'carflag', 'birth', 'auto_work_year_id', 'work_position_id', 'income', 'company_id', 'manager_id', 'status', 'order', 'created_by', 'updated_by'], 'integer'],
            [['description'], 'string'],
            [['name', 'nation', 'card_number', 'mobile', 'phone', 'other_contact', 'other_phone'], 'string', 'max' => 20],
            [['card_address', 'address', 'company_address'], 'string', 'max' => 100],
            [['email'], 'string', 'max' => 40],
            [['work_years'], 'string', 'max' => 10],
            [['company_name'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '自动增长ID',
            'customer_id' => '客户编号',
            'name' => '姓名',
            'sex_id' => '性别 0:男 1:女 ID',
            'nation' => '民族',
            'card_type_id' => '证件类型（身份证，军官证）',
            'card_number' => '身份证号',
            'card_province_id' => '户籍所在省份',
            'card_city_id' => '户籍所在城市',
            'card_area_id' => '户籍所在区县',
            'card_address' => '户籍所在地',
            'province_id' => '目前居住省份ID',
            'city_id' => '目前居住城市ID',
            'area_id' => '目前居住地区ID',
            'address' => '目前居住住址',
            'educational_id' => '学历ID',
            'marriage_type_id' => '婚姻状况ID 1:已婚  0:未婚',
            'houseflag' => '是否有房',
            'carflag' => '是否有车',
            'email' => '个人邮箱',
            'birth' => '出生日期',
            'mobile' => '联系电话',
            'work_years' => '工作年限',
            'auto_work_year_id' => '行业经验ID',
            'work_position_id' => '职务(1 高级管理 2 法人 3 股东 4 职员 5 主管 6 经理 7 总监 8顾问9 其它）',
            'income' => '个人收入',
            'company_id' => '企业ID',
            'company_name' => '所在企业名称',
            'company_address' => '单位地址',
            'phone' => '办公电话',
            'other_contact' => '其它联系人',
            'other_phone' => '其它联系人电话',
            'description' => '个户情况介绍',
            'manager_id' => '客户经理ID',
            'status' => '状态 1:正常 0:删除',
            'order' => '排序',
            'created_at' => '创建时间',
            'updated_at' => '更新时间',
            'created_by' => '后台管理员|业务员',
            'updated_by' => '更新人员',
        ];
    }

    /**
     * @inheritdoc
     * @return \common\models\query\PersonProfileQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\PersonProfileQuery(get_called_class());
    }
}
