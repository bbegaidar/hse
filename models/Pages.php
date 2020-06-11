<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pages".
 *
 * @property int $id
 * @property string $name
 * @property string $images
 * @property string $url
 *
 * @property PagesContent[] $pagesContents
 */
class Pages extends \yii\db\ActiveRecord
{
    public $photos;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pages';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'url'], 'required'],
            [['name', 'url'], 'string'],
            [['photos'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg, jpeg, gif', 'maxFiles' => 5, 'on' => 'create'],
            [['photos'], 'file', 'extensions' => 'png, jpg, jpeg, gif', 'maxFiles' => 5, 'on' => 'update'],
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
            'url' => Yii::t('app', 'Url'),
            'photos' => 'Загрузите Картинки'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPagesContents()
    {
        return $this->hasMany(PagesContent::className(), ['pages' => 'id']);
    }
    
    public function getContent($lang_id=null)
    {
        $lang_id = ($lang_id === null)? Lang::getCurrent()->id: $lang_id;

        return $this->hasOne(PagesContent::className(), ['pages' => 'id'])->where(['lang' => $lang_id]);
    }
    
    public function getRuContent()
    {
        return $this->hasOne(PagesContent::className(), ['pages' => 'id'])->where(['lang' => 2]);
    }
    
    public function beforeDelete()
    {
        if (!parent::beforeDelete()) {
            return false;
        }
        PagesContent::deleteAll(['pages' => $this->id]);
        return true;
    }    
}
