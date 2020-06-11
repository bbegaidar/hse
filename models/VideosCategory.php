<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "videos_category".
 *
 * @property int $id
 * @property string $name
 * @property string $description
 *
 * @property RecordVideoLesson[] $recordVideoLessons
 * @property RecordVideoLesson[] $recordVideoLessons0
 * @property RecordVideoLesson[] $recordVideoLessons1
 * @property Videos[] $videos
 * @property Test $test
 */
class VideosCategory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'videos_category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255],
            [['test_id'], 'exist', 'skipOnError' => true, 'targetClass' => Test::className(), 'targetAttribute' => ['test_id' => 'id']],
            [['description'], 'string']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'test_id' => Yii::t('app', 'Test ID'),
            'description' => Yii::t('app', 'Description'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRecordVideoLessons()
    {
        return $this->hasMany(RecordVideoLesson::className(), ['video_category_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRecordVideoLessons0()
    {
        return $this->hasMany(RecordVideoLesson::className(), ['video_category_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRecordVideoLessons1()
    {
        return $this->hasMany(RecordVideoLesson::className(), ['video_category_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVideos()
    {
        return $this->hasMany(Videos::className(), ['category_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTest()
    {
        return $this->hasOne(Test::className(), ['id' => 'test_id']);
    }

    /**
     * {@inheritdoc}
     * @return VideosCategoryQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new VideosCategoryQuery(get_called_class());
    }
}
