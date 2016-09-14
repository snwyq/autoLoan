<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%company_member}}".
 *
 * @property integer $id
 * @property integer $customer_id
 * @property string $name
 * @property string $card_number
 * @property string $telephone
 * @property string $other_link_type
 * @property integer $role_type
 * @property integer $sex_id
 * @property integer $educational_id
 * @property string $work_position
 * @property integer $is_work_contacts
 * @property string $address
 * @property string $remark
 * @property integer $order
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 */
class CompanyMember extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%company_member}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['customer_id', 'role_type', 'sex_id', 'educational_id', 'is_work_contacts', 'order', 'status'], 'integer'],
            [['name', 'role_type'], 'required'],
            [['remark'], 'string'],
            [['name', 'card_number', 'work_position'], 'string', 'max' => 20],
            [['telephone'], 'string', 'max' => 11],
            [['other_link_type'], 'string', 'max' => 30],
            [['address'], 'string', 'max' => 120],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '自动增长ID',
            'customer_id' => '企业ID',
            'name' => '姓名',
            'card_number' => '身份证号',
            'telephone' => '联系方式',
            'other_link_type' => '其它联系方式',
            'role_type' => '主要人员类别',
            'sex_id' => '性别（1：男  2：女）',
            'educational_id' => '学历',
            'work_position' => '职务',
            'is_work_contacts' => '是否业务联系人（1：是  0：不是）',
            'address' => '通讯地址',
            'remark' => '备注',
            'order' => '排序',
            'status' => '状态（0：删除 1：正常）',
            'created_at' => '创建时间',
            'updated_at' => '更新时间',
        ];
    }

    /**
     * @inheritdoc
     * @return \common\models\query\CompanyMemberQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\CompanyMemberQuery(get_called_class());
    }
}
