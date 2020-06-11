<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "news_content".
 *
 * @property int $id
 * @property int $news
 * @property int $lang
 * @property string $excerpt
 * @property string $content
 *
 * @property News $news0
 * @property Lang $lang0
 */
class NewsContent extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'news_content';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['news', 'lang', 'title', 'excerpt', 'description'], 'required'],
            [['news', 'lang'], 'integer'],
            [['title', 'excerpt', 'description'], 'string'],
            [['news'], 'exist', 'skipOnError' => true, 'targetClass' => News::className(), 'targetAttribute' => ['news' => 'id']],
            [['lang'], 'exist', 'skipOnError' => true, 'targetClass' => Lang::className(), 'targetAttribute' => ['lang' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('static', 'ID'),
            'news' => Yii::t('static', 'News'),
            'lang' => Yii::t('static', 'Lang'),
            'title' => Yii::t('static', 'Title'),
            'excerpt' => Yii::t('static', 'Excerpt'),
            'description' => Yii::t('static', 'Description'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNewsData()
    {
        return $this->hasOne(News::className(), ['id' => 'news']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLangData()
    {
        return $this->hasOne(Lang::className(), ['id' => 'lang']);
    }
}
