<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "reviews_content".
 *
 * @property int $id
 * @property int $reviews
 * @property int $lang
 * @property string $reviewer
 * @property string $review
 *
 * @property Lang $lang0
 * @property Reviews $reviews0
 */
class ReviewsContent extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'reviews_content';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['reviews', 'lang', 'reviewer', 'review'], 'required'],
            [['reviews', 'lang'], 'integer'],
            [['reviewer', 'review','company'], 'string'],
            [['lang'], 'exist', 'skipOnError' => true, 'targetClass' => Lang::className(), 'targetAttribute' => ['lang' => 'id']],
            [['reviews'], 'exist', 'skipOnError' => true, 'targetClass' => Reviews::className(), 'targetAttribute' => ['reviews' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'reviews' => Yii::t('app', 'Reviews'),
            'lang' => Yii::t('app', 'Lang'),
            'reviewer' => Yii::t('app', 'Reviewer'),
            'review' => Yii::t('app', 'Review'),
            'company' => Yii::t('app', 'Company'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLang0()
    {
        return $this->hasOne(Lang::className(), ['id' => 'lang']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReviews0()
    {
        return $this->hasOne(Reviews::className(), ['id' => 'reviews']);
    }
}
