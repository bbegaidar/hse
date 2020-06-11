<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "answers_content".
 *
 * @property int $id
 * @property int $answers
 * @property int $lang
 * @property int $question
 * @property int $answer
 *
 * @property Lang $lang0
 * @property Answers $answers0
 */
class AnswersContent extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'answers_content';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['answers', 'lang', 'question', 'answer'], 'required'],
            [['question', 'answer'], 'string'],
            [['answers', 'lang'], 'integer'],
            [['lang'], 'exist', 'skipOnError' => true, 'targetClass' => Lang::className(), 'targetAttribute' => ['lang' => 'id']],
            [['answers'], 'exist', 'skipOnError' => true, 'targetClass' => Answers::className(), 'targetAttribute' => ['answers' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'answers' => Yii::t('app', 'Answers'),
            'lang' => Yii::t('app', 'Lang'),
            'question' => Yii::t('app', 'Question'),
            'answer' => Yii::t('app', 'Answer'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLang0()
    {
        return $this->hasOne(Lang::className(), ['id' => 'lang']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAnswers0()
    {
        return $this->hasOne(Answers::className(), ['id' => 'answers']);
    }
}
