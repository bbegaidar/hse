<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;
 
class TeamForm extends Model{
    
    public $photo;
    public $nameRu;
    public $descriptionRu;
    public $nameKz;
    public $descriptionKz;
    public $nameEn;
    public $descriptionEn;
    public $email;
    public $phone;
    public $mob_phone;
    
    public function rules() {
        return [
            [['nameRu', 'descriptionRu', 'nameKz', 'descriptionKz', 'nameEn', 'descriptionEn'], 'required', 'message' => 'Заполните поле'],
            [['email', 'phone', 'mob_phone'], 'string'],
            ['email', 'email'],
            [['photo'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg']
        ];
    }
    
    public function attributeLabels() {
        return [
            'photo' => 'Фото',
            'nameRu' => 'Имя (RU)',
            'descriptionRu' => 'Должность (RU)',
            'nameKz' => 'Имя (KZ)',
            'descriptionKz' => 'Должность (KZ)',
            'nameEn' => 'Имя (EN)',
            'descriptionEn' => 'Должность (EN)'
        ];
    }
    
     public function photoUrl()
    {
        if ($this->validate()) {
            $time = strtotime(date('Y-m-d H:i:s'));
            $url = 'uploads/team/' . $this->photo->baseName . '_' . $time . '.' . $this->photo->extension;
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
    