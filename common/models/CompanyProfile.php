<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%company_profile}}".
 *
 * @property integer $id
 * @property integer $customer_id
 * @property string $name
 * @property string $nick_name
 * @property string $group_name
 * @property string $actual_controller
 * @property string $actual_controller_idno
 * @property string $actual_controller_mobile
 * @property string $contact
 * @property string $contact_mobile
 * @property string $contact_web_type
 * @property string $telephone
 * @property integer $reg_time
 * @property integer $reg_province_id
 * @property integer $reg_city_id
 * @property integer $reg_area_id
 * @property string $reg_address
 * @property integer $reg_capital
 * @property integer $real_begin_time
 * @property integer $province_id
 * @property integer $city_id
 * @property integer $area_id
 * @property string $trade_address
 * @property string $trade_market
 * @property string $property
 * @property integer $company_type_id
 * @property integer $business_place_type_id
 * @property string $business_licence_no
 * @property string $organization_code
 * @property integer $employees_id
 * @property string $main_business
 * @property integer $business_start_time
 * @property integer $business_end_time
 * @property integer $owned_industry_id
 * @property string $customer_source
 * @property integer $status
 * @property string $description
 * @property string $longitude
 * @property string $latitude
 * @property integer $manager_id
 * @property string $store_area
 * @property integer $updated_by
 * @property integer $created_by
 * @property integer $updated_at
 * @property integer $created_at
 */
class CompanyProfile extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%company_profile}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['customer_id', 'nick_name'], 'required'],
            [['customer_id', 'reg_time', 'reg_province_id', 'reg_city_id', 'reg_area_id', 'reg_capital', 'real_begin_time', 'province_id', 'city_id', 'area_id', 'company_type_id', 'business_place_type_id', 'employees_id', 'business_start_time', 'business_end_time', 'owned_industry_id', 'status', 'manager_id', 'updated_by', 'created_by'], 'integer'],
            [['description'], 'string'],
            [['store_area'], 'number'],
            [['name', 'actual_controller', 'actual_controller_idno', 'actual_controller_mobile', 'contact', 'contact_mobile', 'contact_web_type', 'trade_market', 'longitude', 'latitude'], 'string', 'max' => 50],
            [['nick_name', 'group_name', 'customer_source'], 'string', 'max' => 100],
            [['telephone'], 'string', 'max' => 11],
            [['reg_address', 'trade_address'], 'string', 'max' => 200],
            [['property', 'business_licence_no'], 'string', 'max' => 20],
            [['organization_code'], 'string', 'max' => 30],
            [['main_business'], 'string', 'max' => 500],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '自动增长ID',
            'customer_id' => '借款id',
            'name' => '企业别名（全名）',
            'nick_name' => '企业名称（别名和简称）',
            'group_name' => '所属集团名称',
            'actual_controller' => '实际控制人',
            'actual_controller_idno' => '实际控制人身份证',
            'actual_controller_mobile' => '实际控制人电话',
            'contact' => '联系人',
            'contact_mobile' => '联系人电话',
            'contact_web_type' => '联系人其它联系方式',
            'telephone' => '公司电话',
            'reg_time' => '注册时间',
            'reg_province_id' => '注册省份ID',
            'reg_city_id' => '注册城市ID',
            'reg_area_id' => '注册地区ID',
            'reg_address' => '注册地址',
            'reg_capital' => '注册资本',
            'real_begin_time' => '实际运营时间',
            'province_id' => '省份ID',
            'city_id' => '城市ID',
            'area_id' => '地区ID',
            'trade_address' => '办公地址',
            'trade_market' => '所在区域(所在交易市场)',
            'property' => '企业性质',
            'company_type_id' => '公司类型（JJ:经纪公司/GT:个体经营/4S:4S店/ZH:综合经销商/XX:信息员专用/PT:平台/QT:其他）',
            'business_place_type_id' => '经营场所性质，ZL-展厅租赁 ZY-展厅自有 SC-市场内经营',
            'business_licence_no' => '营业执照号',
            'organization_code' => '组织机构代码',
            'employees_id' => '员工人数',
            'main_business' => '主营业务',
            'business_start_time' => '营业期限开始时间',
            'business_end_time' => '营业期限结束时间',
            'owned_industry_id' => '所属行业',
            'customer_source' => '客户来源',
            'status' => '状态（0：删除 1：正常）',
            'description' => '企业介绍',
            'longitude' => '地址的经度',
            'latitude' => '地址的纬度',
            'manager_id' => '客户经理ID（业务员ID）',
            'store_area' => '门店面积（㎡）',
            'updated_by' => '更新人员ID',
            'created_by' => '操作人ID',
            'updated_at' => '更新时间',
            'created_at' => '创建时间',
        ];
    }

    /**
     * @inheritdoc
     * @return \common\models\query\CompanyProfileQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\CompanyProfileQuery(get_called_class());
    }
}
