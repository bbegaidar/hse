<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "answers".
 *
 * @property int $id
 * @property int $type
 *
 * @property AnswersContent[] $answersContents
 */
class Answers extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'answers';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type'], 'required'],
            [['type'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'type' => Yii::t('app', 'Type'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAnswersContents()
    {
        return $this->hasMany(AnswersContent::className(), ['answers' => 'id']);
    }
    
    public function getContent($lang_id=null)
    {
        $lang_id = ($lang_id === null)? Lang::getCurrent()->id: $lang_id;

        return $this->hasOne(AnswersContent::className(), ['answers' => 'id'])->where(['lang' => $lang_id]);
    }
    
    public function getRuContent()
    {
        return $this->hasOne(AnswersContent::className(), ['answers' => 'id'])->where(['lang' => 2]);
    }
    
    public function beforeDelete()
    {
        if (!parent::beforeDelete()) {
            return false;
        }
        AnswersContent::deleteAll(['answers' => $this->id]);
        return true;
    }
}
