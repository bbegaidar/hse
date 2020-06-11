<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_permit".
 *
 * @property int $id
 * @property int $user
 * @property int $training
 * @property int $test
 * @property int $entry
 * @property int $rating
 * @property int $videos_category_id
 * @property int $record_id
 *
 * @property UserTests[] $userTests
 * @property Trainings $training_title
 * @property VideosCategory $video_cat_name
 *
 */
class UserPermit extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_permit';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user', 'test', 'rating'], 'required'],
            [['user', 'training', 'test', 'entry', 'rating', 'videos_category_id', 'record_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'user' => Yii::t('app', 'User'),
            'training' => Yii::t('app', 'Training'),
            'test' => Yii::t('app', 'Test'),
            'entry' => Yii::t('app', 'Entry'),
            'rating' => Yii::t('app', 'Rating'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserTests()
    {
        return $this->hasMany(UserTests::className(), ['permit' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTraining_title()
    {
        return $this->hasOne(Trainings::className(), ['id' => 'training']);
    }


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVideo_cat_name()
    {
        return $this->hasOne(VideosCategory::className(), ['id' => 'videos_category_id']);
    }
    
}
