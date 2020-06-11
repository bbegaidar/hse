<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "test_question".
 *
 * @property int $id
 * @property int $test
 * @property string $question
 * @property int $type
 *
 * @property TestAnswer[] $testAnswers
 * @property Test $test0
 */
class TestQuestion extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'test_question';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['test', 'question'], 'required'],
            [['test', 'type'], 'integer'],
            [['question'], 'string'],
            [['test'], 'exist', 'skipOnError' => true, 'targetClass' => Test::className(), 'targetAttribute' => ['test' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'test' => Yii::t('app', 'Test'),
            'question' => Yii::t('app', 'Question'),
            'type' => Yii::t('app', 'Type'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTestAnswers()
    {
        return $this->hasMany(TestAnswer::className(), ['question' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTestData()
    {
        return $this->hasOne(Test::className(), ['id' => 'test']);
    }
    
    public function beforeDelete()
    {
        if (!parent::beforeDelete()) {
            return false;
        }
        TestAnswer::deleteAll(['question' => $this->id]);
        return true;
    }
}
