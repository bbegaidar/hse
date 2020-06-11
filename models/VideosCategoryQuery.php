<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[VideosCategory]].
 *
 * @see VideosCategory
 */
class VideosCategoryQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return VideosCategory[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return VideosCategory|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
