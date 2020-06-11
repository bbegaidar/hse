<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "reviews_category".
 *
 * @property int $id
 * @property string $description
 * @property string $descriptionRu
 *
 * @property Reviews[] $reviews
 */
class ReviewsCategory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'reviews_category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['description', 'descriptionRu'], 'required'],
            [['description', 'descriptionRu'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'description' => Yii::t('app', 'Description'),
            'descriptionRu' => Yii::t('app', 'Description Ru'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReviews()
    {
        return $this->hasMany(Reviews::className(), ['category' => 'id']);
    }
}
