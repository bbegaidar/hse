<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[UserVideoPermit]].
 *
 * @see UserVideoPermit
 */
class UserVideoPermitQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return UserVideoPermit[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return UserVideoPermit|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
