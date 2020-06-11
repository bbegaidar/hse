<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "news_category".
 *
 * @property int $id
 * @property string $description
 *
 * @property News[] $news
 */
class NewsCategory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'news_category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['description', 'descriptionRu'], 'required'],
            [['description', 'descriptionRu'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('static', 'ID'),
            'description' => Yii::t('static', 'Description'),
            'descriptionRu' => Yii::t('static', 'Description Ru'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNews()
    {
        return $this->hasMany(News::className(), ['category' => 'id']);
    }
}
