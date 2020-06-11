<?php

namespace app\models;

use Yii;
use yii\base\Model;
 
class TrainingsForm extends Model{
    
    public $title;
    public $lecturer;
    public $description;
    public $startDate;
    public $endDate;
    public $startTime;
    public $endTime;
    public $duration;
    public $city;
    public $place;
    public $category;
    public $test;
    public $photo;
    
    public function rules() {
        return [
            [['title', 'lecturer', 'startDate', 'endDate', 'place', 'category', 'test'], 'required'],
            [['title', 'lecturer', 'description', 'city', 'place'], 'string'],
            [['startDate','startTime', 'endDate', 'endTime'], 'safe'],
            [['duration', 'category', 'test'], 'integer'],
            [['photo'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg']
        ];
    }
    
    public function attributeLabels() {
        return [
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
            'photo' => 'Изображение'
        ];
    }
    
     public function photoUrl()
    {
        if ($this->validate()) {
            $time = strtotime(date('Y-m-d H:i:s'));
            $url = 'uploads/trainings/' . $this->photo->baseName . '_' . $time . '.' . $this->photo->extension;
            return $url;
        } else {
            return false;
        }
    }
    
    public function uploadPhoto($url)
    {
        if ($this->photo->saveAs($url)) {
            return true;
        } else {
            return false;
        }
    }
}
    