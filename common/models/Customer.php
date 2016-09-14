<?php

namespace common\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use common\models\query\CustomerQuery;

/**
 * This is the model class for table "{{%customer}}".
 *
 * @property integer $id
 * @property string $code
 * @property string $class
 * @property string $name
 * @property string $company_name
 * @property string $link_name
 * @property string $card_number
 * @property string $card_address
 * @property integer $province_id
 * @property integer $city_id
 * @property integer $city_proper_id
 * @property string $address
 * @property string $email
 * @property string $mobile
 * @property integer $status
 * @property integer $src_id
 * @property integer $manager_id
 * @property string $description
 * @property string $remarks
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $created_by
 * @property integer $update_by
 * @property integer $block_at
 * @property integer $confirmed_at
 */
class Customer extends \yii\db\ActiveRecord
{



    const CUSTOMER_PERSON  = '10';
    const CUSTOMER_COMPANY = '20';
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%customer}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['code','class','name','mobile'],'required'],
            [['province_id', 'city_id', 'city_proper_id', 'status', 'src_id', 'manager_id', 'created_at', 'updated_at', 'created_by', 'updated_by', 'block_at', 'confirmed_at'], 'integer'],
            [['description', 'remarks'], 'string'],
            [['mobile'], 'unique','message'=>'{attribute}已经被占用了'],
            ['mobile','match','pattern'=>'/^1[0-9]{10}$/','message'=>'{attribute}必须为1开头的11位纯数字'],

            [['code'], 'string', 'max' => 50],
            [['mobile'], 'string', 'max' => 11],
            [['name', 'company_name'], 'string', 'max' => 200],
            [['link_name', 'card_number', 'mobile'], 'string', 'max' => 20],
            [['card_address', 'address', 'email'], 'string', 'max' => 40],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '自动增长ID',
            'code' => '客户代码',
            'class' => '客户类别',
            'name' => '名称',
            'company_name' => '所属企业',
            'link_name' => '联系人',
            'card_number' => '身份证号/企业号',
            'card_address' => '户籍所在地/登记所在地',
            'province_id' => '省份ID',
            'city_id' => '城市ID',
            'city_proper_id' => '地区ID',
            'address' => '现住址（等同于经营地址）',
            'email' => '邮箱',
            'mobile' => '联系电话',
            'status' => '状态 1:正常 0:删除',
            'src_id' => '信息来源ID',
            'manager_id' => '客户经理ID',
            'description' => '补充说明',
            'remarks' => '客户说明',
            'created_at' => '创建时间',
            'updated_at' => '更新时间',
            'created_by' => '后台管理员|业务员',
            'updated_by' => '更新人员',
            'block_at' => '冻结日期',
            'confirmed_at' => '审核日期',
        ];
    }



    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
            BlameableBehavior::className(),
        ];
    }



    public static  function  getCustomerClass()
    {
        return [
            self::CUSTOMER_PERSON=>"个人",
            self::CUSTOMER_COMPANY=>"企业",
        ];
    }

    //客户是否通过确认

    public function getIsConfirmed()
    {
        return $this->confirmed_at!=null;
    }

    //客户是否黑名单

    public function  getIsBlocked()
    {
        return $this->block_at!=null;
    }


    //取得客户名称和id

    public  static  function  getCustomerList()
    {

        return static::find()->select('name')->indexBy('id')->column();
//        $list = static::find()->select('username')->indexby('id')->column();
//        return $list;


    }



    /**
     * @inheritdoc
     * @return \common\models\query\CustomerQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CustomerQuery(get_called_class());
    }

}
