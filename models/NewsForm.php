<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;
 
class NewsForm extends Model{
    
    public $photo;
    public $titleRu;
    public $excerptRu;
    public $descriptionRu;
    public $titleKz;
    public $excerptKz;
    public $descriptionKz;
    public $titleEn;
    public $excerptEn;
    public $descriptionEn;
    public $category;
    
    public function rules() {
        return [
            [['titleRu', 'excerptRu', 'descriptionRu', 'titleKz', 'excerptKz', 'descriptionKz', 'titleEn', 'excerptEn', 'descriptionEn', 'category'], 'required', 'message' => 'Заполните поле'],
            [['titleRu', 'excerptRu', 'descriptionRu', 'titleKz', 'excerptKz', 'descriptionKz', 'titleEn', 'excerptEn', 'descriptionEn', 'category'], 'string'],
            [['category'],'integer'],
            [['photo'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg']
        ];
    }
    
    public function attributeLabels() {
        return [
            'photo' => 'Фото',
            'titleRu' => 'Заголовок (RU)',
            'excerptRu' => 'Отрывок (RU)',
            'descriptionRu' => 'Содержание (RU)',
            'titleKz' => 'Заголовок (KZ)',
            'excerptKz' => 'Отрывок (KZ)',
            'descriptionKz' => 'Содержание (KZ)',
            'titleEn' => 'Заголовок (EN)',
            'excerptEn' => 'Отрывок (EN)',
            'descriptionEn' => 'Содержание (EN)',
            'category' => 'Категория'
        ];
    }
    
    public function photoUrl()
    {
        if ($this->validate()) {
            $time = strtotime(date('Y-m-d H:i:s'));
            $url = 'uploads/news/' . $this->photo->baseName . '_' . $time . '.' . $this->photo->extension;
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
    