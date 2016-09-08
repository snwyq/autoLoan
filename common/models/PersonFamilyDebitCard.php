<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%person_family_debit_card}}".
 *
 * @property integer $id
 * @property integer $customer_id
 * @property string $name
 * @property string $bank
 * @property integer $credit_amount
 * @property integer $used_amount
 * @property integer $half_year_amount
 * @property integer $overdue_num
 * @property integer $guaranty_flag
 * @property string $remark
 * @property integer $order
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property Customer $customer
 */
class PersonFamilyDebitCard extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%person_family_debit_card}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['customer_id', 'credit_amount', 'used_amount', 'half_year_amount', 'overdue_num', 'guaranty_flag', 'order', 'status'], 'integer'],
            [['remark'], 'string'],
            [['name', 'bank'], 'string', 'max' => 20],
            [['customer_id'], 'exist', 'skipOnError' => true, 'targetClass' => Customer::className(), 'targetAttribute' => ['customer_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '自动增长ID',
            'customer_id' => '借款人ID',
            'name' => '名字',
            'bank' => '发行机构',
            'credit_amount' => '授信额度',
            'used_amount' => '已用额度',
            'half_year_amount' => '半年额度',
            'overdue_num' => '逾期次数',
            'guaranty_flag' => '对外担保 1:是对外担保 0:否',
            'remark' => '说明',
            'order' => '排序',
            'status' => '状态 1:正常 0:删除',
            'created_at' => '创建时间',
            'updated_at' => '更新时间',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCustomer()
    {
        return $this->hasOne(Customer::className(), ['id' => 'customer_id']);
    }

    /**
     * @inheritdoc
     * @return \common\models\query\PersonFamilyDebitCardQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\PersonFamilyDebitCardQuery(get_called_class());
    }
}
