<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "reviews".
 *
 * @property int $id
 * @property int $category
 *
 * @property ReviewsCategory $category0
 * @property ReviewsContent[] $reviewsContents
 */
class Reviews extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'reviews';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category'], 'required'],
            [['category'], 'integer'],
            [['category'], 'exist', 'skipOnError' => true, 'targetClass' => ReviewsCategory::className(), 'targetAttribute' => ['category' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'category' => Yii::t('app', 'Category'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategoryData()
    {
        return $this->hasOne(ReviewsCategory::className(), ['id' => 'category']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReviewsContents()
    {
        return $this->hasMany(ReviewsContent::className(), ['reviews' => 'id']);
    }
    
     public function getContent($lang_id=null)
    {
        $lang_id = ($lang_id === null)? Lang::getCurrent()->id: $lang_id;

        return $this->hasOne(ReviewsContent::className(), ['reviews' => 'id'])->where(['lang' => $lang_id]);
    }
    
    public function getRuContent()
    {
        return $this->hasOne(ReviewsContent::className(), ['reviews' => 'id'])->where(['lang' => 2]);
    }
    
    public function beforeDelete()
    {
        if (!parent::beforeDelete()) {
            return false;
        }
        ReviewsContent::deleteAll(['reviews' => $this->id]);
        return true;
    }
}
