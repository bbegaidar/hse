<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "video_about_company".
 *
 * @property int $id
 * @property string $video_path
 * @property int $is_active
 * @property int $lang_id
 */
class VideoAboutCompany extends \yii\db\ActiveRecord
{

    public $video;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'video_about_company';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['is_active', 'lang_id'], 'integer'],
            [['lang_id'], 'required'],
            [['video_path'], 'string', 'max' => 255],
            [['video'], 'file', 'skipOnEmpty' => false, 'extensions' => 'mp4']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'video_path' => Yii::t('app', 'Путь к видео'),
            'is_active' => Yii::t('app', 'Активно'),
            'lang_id' => Yii::t('app', 'Выберите Язык'),
            'video' => Yii::t('app', 'Загрузите видео')
        ];
    }

    /**
     * {@inheritdoc}
     * @return VideoAboutCompanyQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new VideoAboutCompanyQuery(get_called_class());
    }

    public function getLang()
    {
        return $this->hasOne(Lang::className(), ['id' => 'lang_id']);
    }

    public function videoUrl()
    {
        if ($this->validate()) {
            $time = strtotime(date('Y-m-d H:i:s'));
            $url = 'uploads/videos/' . $this->video->baseName . '_' . $time . '.' . $this->video->extension;
            return $url;
        } else {
            return false;
        }
    }
    
    public function uploadVideo($url)
    {
        if ($this->video->saveAs($url)) {
            return true;
        } else {
            return false;
        }
    }
}
