<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "photogallery".
 *
 * @property int $id
 * @property string $title
 * @property string $photo
 * @property int $active
 * @property string $title_eng
 * @property string $title_kaz
 * @property string $description_rus
 * @property string $description_kaz
 * @property string $description_eng
 * @property int $date
 * @property int $category_id
 * @property int $year
 * @property int $month
 */
class Photogallery extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'photogallery';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'photo', 'category_id', 'date', 'active'], 'required'],
            [['title', 'title_eng', 'title_kaz', 'description_rus', 'description_eng', 'description_kaz', 'photo'], 'string'],
            [['active', 'date', 'category_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'Title'),
            'photo' => Yii::t('app', 'Photo'),
            'active' => Yii::t('app', 'Active'),
        ];
    }

    public function getDescription()
    {
        $lang = Yii::$app->language;
        if ($lang == 'en-EN') {
            return $this->description_eng;
        }
        else if ($lang == 'kk-KZ') {
            return $this->description_kaz;
        }
        else {
            return $this->description_rus;
        }
    }

    public function getTitle()
    {
        $lang = Yii::$app->language;
        if ($lang == 'en-EN') {
            return $this->title_eng;
        }
        else if ($lang == 'kk-KZ') {
            return $this->title_kaz;
        }
        else {
            return $this->title;
        }
    }
}
