<?php

namespace app\models;

use Yii;
/**
 * This is the ActiveQuery class for [[VideoAboutCompany]].
 *
 * @see VideoAboutCompany
 */
class VideoAboutCompanyQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return VideoAboutCompany[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return VideoAboutCompany|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }

    public function byLang()
    {
        $current = Yii::$app->language;
        $lang = Lang::find()->select('id')->andWhere(['local' => $current])->one();
        return $this->andWhere(['lang_id' => $lang]);
    }
}
