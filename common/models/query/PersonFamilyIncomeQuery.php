<?php

namespace common\models\query;

/**
 * This is the ActiveQuery class for [[\common\models\PersonFamilyIncome]].
 *
 * @see \common\models\PersonFamilyIncome
 */
class PersonFamilyIncomeQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return \common\models\PersonFamilyIncome[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \common\models\PersonFamilyIncome|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
