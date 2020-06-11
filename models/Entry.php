<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "entry".
 *
 * @property int $id
 * @property int $user
 * @property int $training
 * @property int $confirm
 * @property int $visited
 *
 * @property User $user0
 * @property Trainings $training0
 */
class Entry extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'entry';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user', 'training'], 'required'],
            [['user', 'training', 'confirm', 'visited'], 'integer'],
            [['user', 'training'], 'unique', 'targetAttribute' => ['user', 'training']],
            [['user'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user' => 'id']],
            [['training'], 'exist', 'skipOnError' => true, 'targetClass' => Trainings::className(), 'targetAttribute' => ['training' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'user' => Yii::t('app', 'User'),
            'training' => Yii::t('app', 'Training'),
            'confirm' => Yii::t('app', 'Confirm'),
            'visited' => Yii::t('app', 'Visited'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserData()
    {
        return $this->hasOne(User::className(), ['id' => 'user']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTrainingData()
    {
        return $this->hasOne(Trainings::className(), ['id' => 'training']);
    }
}
