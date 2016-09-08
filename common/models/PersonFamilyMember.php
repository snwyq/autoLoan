<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%person_family_member}}".
 *
 * @property integer $id
 * @property integer $customer_id
 * @property string $name
 * @property string $relation_type
 * @property integer $type
 * @property string $card_number
 * @property string $phone
 * @property string $company
 * @property string $remark
 * @property integer $order
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 */
class PersonFamilyMember extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%person_family_member}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['customer_id', 'type', 'order', 'status'], 'integer'],
            [['remark'], 'string'],
            [['name', 'relation_type', 'card_number', 'phone', 'company'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '自动增长ID',
            'customer_id' => '借款人Id',
            'name' => '姓名',
            'relation_type' => '关系',
            'type' => '类型：1:求学 2:工作 3:自由',
            'card_number' => '身份证号',
            'phone' => '联系电话',
            'company' => '所在单位',
            'remark' => '说明',
            'order' => '排序',
            'status' => '状态 1:正常 0:删除',
            'created_at' => '创建时间',
            'updated_at' => '更新时间',
        ];
    }

    /**
     * @inheritdoc
     * @return \common\models\query\PersonFamilyMemberQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\PersonFamilyMemberQuery(get_called_class());
    }
}
