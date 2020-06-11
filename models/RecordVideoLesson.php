<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "record_video_lesson".
 *
 * @property int $id
 * @property int $user_id
 * @property int $video_category_id
 * @property int $confirm
 * @property int $viewed
 *
 * @property VideosCategory $videoCategory
 * @property VideosCategory $videoCategory0
 * @property User $user
 * @property VideosCategory $videoCategory1
 * @property User $user0
 */
class RecordVideoLesson extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'record_video_lesson';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'video_category_id'], 'required'],
            [['user_id', 'video_category_id', 'confirm', 'viewed'], 'integer'],
            [['video_category_id'], 'exist', 'skipOnError' => true, 'targetClass' => VideosCategory::className(), 'targetAttribute' => ['video_category_id' => 'id']],            
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],                        
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
            'video_category_id' => Yii::t('app', 'Video Category ID'),
            'confirm' => Yii::t('app', 'Confirm'),
            'viewed' => Yii::t('app', 'Viewed'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVideoCategory()
    {
        return $this->hasOne(VideosCategory::className(), ['id' => 'video_category_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
    
    /**
     * {@inheritdoc}
     * @return RecordVideoLessonQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new RecordVideoLessonQuery(get_called_class());
    }
}
