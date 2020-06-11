<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "trainings".
 *
 * @property int $id
 * @property string $title
 * @property string $lecturer
 * @property string $description
 * @property string $startDate
 * @property string $endDate
 * @property int $duration
 * @property string $place
 * @property int $category
 * @property int $test
 *
 * @property TrainingsCategory $category0
 * @property Test $test0
 */
class Trainings extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'trainings';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'lecturer', 'startDate', 'endDate', 'place', 'category', 'test'], 'required'],
            [['title', 'lecturer', 'description', 'city', 'place', 'photo'], 'string'],
            [['startDate','startTime', 'endDate', 'endTime'], 'safe'],
            [['duration', 'category', 'test'], 'integer'],
            [['category'], 'exist', 'skipOnError' => true, 'targetClass' => TrainingsCategory::className(), 'targetAttribute' => ['category' => 'id']],
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
            'title' => 'Название',
            'lecturer' => 'Преподаватель',
            'description' => 'Описание',
            'startDate' => 'Дата начала',
            'endDate' => 'Дата окончания',
             'startTime' => 'Время начала',
            'endTime' => 'Время окончания',
            'duration' => 'Длительность',
            'city' => 'Город',
            'place' => 'Место/Ссылка',
            'category' => 'Вид тренинга',
            'test' => 'Тема тестирования',
            'photo' => 'Изображение',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategoryData()
    {
        return $this->hasOne(TrainingsCategory::className(), ['id' => 'category']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTestData()
    {
        return $this->hasOne(Test::className(), ['id' => 'test']);
    }
}
