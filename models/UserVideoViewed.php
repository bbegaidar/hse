<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_video_viewed".
 *
 * @property int $id
 * @property int $user_id
 * @property int $video_id
 * @property string $video_url
 *
 * @property User $user
 * @property Videos $video
 */
class UserVideoViewed extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_video_viewed';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'video_id'], 'required'],
            [['user_id', 'video_id'], 'integer'],
            [['video_url'], 'string'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
            [['video_id'], 'exist', 'skipOnError' => true, 'targetClass' => Videos::className(), 'targetAttribute' => ['video_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'user_id' => Yii::t('app', 'User ID'),
            'video_id' => Yii::t('app', 'Video ID'),
            'video_url' => Yii::t('app', 'Video url'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVideo()
    {
        return $this->hasOne(Videos::className(), ['id' => 'video_id']);
    }

    /**
     * {@inheritdoc}
     * @return UserVideoViewedQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UserVideoViewedQuery(get_called_class());
    }
}
