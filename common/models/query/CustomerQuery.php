<?php

namespace common\models\query;
use common\models\Customer;

/**
 * This is the ActiveQuery class for [[\common\models\Customer]].
 *
 * @see \common\models\Customer
 */
class CustomerQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return \common\models\Customer[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \common\models\Customer|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }

    public  function  onlyTrashed(){
        return $this->andWhere(['status'=>0]);
    }


    /*
    * 未被删除的
    * */
    public  function  notTrashed(){

        return $this->andWhere(['>','status','0']);
    }

    /*
     * 个人客户
     * */

    public  function  onlyPerson()
    {

        return $this->notTrashed()->andWhere(['class'=>Customer::CUSTOMER_PERSON]);
    }

    /*企业客户
     * */
    public  function  onlyCompany(){

        return $this->notTrashed()->andWhere(['class'=>Customer::CUSTOMER_COMPANY]);
    }


}
