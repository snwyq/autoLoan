<?php

namespace common\models\query;

/**
 * This is the ActiveQuery class for [[\common\models\PersonFamilyPay]].
 *
 * @see \common\models\PersonFamilyPay
 */
class PersonFamilyPayQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return \common\models\PersonFamilyPay[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \common\models\PersonFamilyPay|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
