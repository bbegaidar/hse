<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_video_permit".
 *
 * @property int $id
 * @property int $video_cat_id
 * @property int $user_id
 * @property int $record_id
 * @property int $test_id
 * @property int $rating
 * 
 * @property UserTests[] $userTests
 */
class UserVideoPermit extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_video_permit';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['video_cat_id', 'user_id', 'record_id', 'test_id', 'rating'], 'required'],
            [['video_cat_id', 'user_id', 'record_id', 'test_id', 'rating'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'video_cat_id' => Yii::t('app', 'Video Cat ID'),
            'user_id' => Yii::t('app', 'User ID'),
            'record_id' => Yii::t('app', 'Record ID'),
            'test_id' => Yii::t('app', 'Test ID'),
            'rating' => Yii::t('app', 'Rating'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return UserVideoPermitQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UserVideoPermitQuery(get_called_class());
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserTests()
    {
        return $this->hasMany(UserTests::className(), ['permit' => 'id']);
    }
}
