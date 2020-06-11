<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "test".
 *
 * @property int $id
 * @property string $name
 * @property int $passing_point
 *
 * @property TestQuestion[] $testQuestions
 * @property Trainings[] $trainings
 */
class Test extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'test';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'passing_point'], 'required'],
            [['passing_point'], 'integer', 'min' => 0, 'max' => 100],
            [['name'], 'string'],
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
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTestQuestions()
    {
        return $this->hasMany(TestQuestion::className(), ['test' => 'id']);
    }
     
    public function getTestQuestionsCount()
    {
        return $this->hasMany(TestQuestion::className(), ['test' => 'id'])->count();
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTrainings()
    {
        return $this->hasMany(Trainings::className(), ['test' => 'id']);
    }
    
     public function beforeDelete()
    {
        if (!parent::beforeDelete()) {
            return false;
        }
        $testQuestions = TestQuestion::find()->where(['test' => $this->id])->all();
        foreach ($testQuestions as $testQuestion) {
            TestAnswer::deleteAll(['question' => $testQuestion->id]);
        }
        TestQuestion::deleteAll(['test' => $this->id]);
        return true;
    }
}
