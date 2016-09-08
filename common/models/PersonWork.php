<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%person_work}}".
 *
 * @property integer $id
 * @property integer $customer_id
 * @property integer $start_time
 * @property integer $end_time
 * @property string $company
 * @property string $position
 * @property string $phone
 * @property string $detail
 * @property integer $status
 * @property integer $order
 * @property integer $created_at
 * @property integer $updated_at
 */
class PersonWork extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%person_work}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['customer_id', 'start_time', 'end_time', 'status', 'order'], 'integer'],
            [['company', 'phone'], 'string', 'max' => 20],
            [['position'], 'string', 'max' => 10],
            [['detail'], 'string', 'max' => 500],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '自动增长ID',
            'customer_id' => '用户ID',
            'start_time' => '开始时间',
            'end_time' => '结束时间',
            'company' => '工作单位',
            'position' => '岗位',
            'phone' => '电话',
            'detail' => '工作说明',
            'status' => '状态 1:正常 0:删除',
            'order' => '排序',
            'created_at' => '创建时间',
            'updated_at' => '更新时间',
        ];
    }

    /**
     * @inheritdoc
     * @return \common\models\query\PersonWorkQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\PersonWorkQuery(get_called_class());
    }
}
