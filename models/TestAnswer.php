<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "test_answer".
 *
 * @property int $id
 * @property int $question
 * @property string $answer
 * @property int $result
 *
 * @property TestQuestion $question0
 */
class TestAnswer extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'test_answer';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['question', 'answer', 'result'], 'required'],
            [['question', 'result'], 'integer'],
            [['answer'], 'string'],
            [['question'], 'exist', 'skipOnError' => true, 'targetClass' => TestQuestion::className(), 'targetAttribute' => ['question' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'question' => 'Вопрос',
            'answer' => 'Ответ',
            'result' => 'Верный',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getQuestion0()
    {
        return $this->hasOne(TestQuestion::className(), ['id' => 'question']);
    }
}
