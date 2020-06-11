<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "news".
 *
 * @property int $id
 * @property int $category
 * @property string $date
 *
 * @property NewsCategory $category0
 * @property NewsContent[] $newsContents
 */
class News extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'news';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category', 'date'], 'required'],
            [['category'], 'integer'],
            [['photo'], 'string'],
            [['date'], 'safe'],
            [['category'], 'exist', 'skipOnError' => true, 'targetClass' => NewsCategory::className(), 'targetAttribute' => ['category' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('static', 'ID'),
            'category' => Yii::t('static', 'Category'),
            'date' => Yii::t('static', 'Date'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategoryData()
    {
        return $this->hasOne(NewsCategory::className(), ['id' => 'category']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNewsContents()
    {
        return $this->hasMany(NewsContent::className(), ['news' => 'id']);
    }
    
    public function getContent($lang_id=null)
    {
        $lang_id = ($lang_id === null)? Lang::getCurrent()->id: $lang_id;

        return $this->hasOne(NewsContent::className(), ['news' => 'id'])->where(['lang' => $lang_id]);
    }
    
    public function getRuContent()
    {
        return $this->hasOne(NewsContent::className(), ['news' => 'id'])->where(['lang' => 2]);
    }
    
    public function beforeDelete()
    {
        if (!parent::beforeDelete()) {
            return false;
        }
        NewsContent::deleteAll(['news' => $this->id]);
        return true;
    }
}
