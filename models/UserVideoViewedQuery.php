<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[UserVideoViewed]].
 *
 * @see UserVideoViewed
 */
class UserVideoViewedQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return UserVideoViewed[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return UserVideoViewed|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
