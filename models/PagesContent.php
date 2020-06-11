<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pages_content".
 *
 * @property int $id
 * @property int $pages
 * @property int $lang
 * @property string $title
 * @property string $subtitle
 * @property string $description
 *
 * @property Pages $pages0
 * @property Lang $lang0
 */
class PagesContent extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pages_content';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pages', 'lang'], 'required'],
            [['pages', 'lang'], 'integer'],
            [['title', 'subtitle', 'description'], 'string'],
            [['pages'], 'exist', 'skipOnError' => true, 'targetClass' => Pages::className(), 'targetAttribute' => ['pages' => 'id']],
            [['lang'], 'exist', 'skipOnError' => true, 'targetClass' => Lang::className(), 'targetAttribute' => ['lang' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'pages' => Yii::t('app', 'Pages'),
            'lang' => Yii::t('app', 'Lang'),
            'title' => Yii::t('app', 'Title'),
            'subtitle' => Yii::t('app', 'Subtitle'),
            'description' => Yii::t('app', 'Description'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPages0()
    {
        return $this->hasOne(Pages::className(), ['id' => 'pages']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLang0()
    {
        return $this->hasOne(Lang::className(), ['id' => 'lang']);
    }
}
