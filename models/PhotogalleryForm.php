<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;
 
class PhotogalleryForm extends Model{
    
    public $photos;
    public $photo;
    public $title;
    public $active;
    public $title_eng;
    public $title_kaz;
    public $description_rus;
    public $description_eng;
    public $description_kaz;
    public $date;
    public $category_id;
    
    public function rules() {
        return [
            [['title', 'category_id', 'date'], 'required', 'message' => 'Заполните поле'],
            [['title','description_rus', 'description_eng', 'description_kaz', 'title_eng', 'title_kaz'], 'string'],
            [['active', 'category_id'],'integer'],
            [['photos'], 'file', 'skipOnEmpty' => true, 'maxFiles' => 10, 'extensions' => 'png, jpg, jpeg'],
            ['date', 'safe']
        ];
    }
    
    public function attributeLabels() {
        return [
            'photos' => 'Фото',
            'title' => 'Название (ru)',
            'title_eng' => 'Название (en)',
            'title_kaz' => 'Название (kz)',
            'description_rus' => 'Описание (ru)',
            'description_eng' => 'Описание (en)',
            'description_kaz' => 'Описание (kz)',
            'date' => 'Дата',
            'category_id' => 'Категория',
            'active' => 'Активна'
        ];
    }
    
    public function photoUrl()
    {
        if ($this->validate()) {
            $time = strtotime(date('Y-m-d H:i:s'));
            $url = 'uploads/photogallery/' . $this->photo->baseName . '_' . $time . '.' . $this->photo->extension;
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

    public function saveImg()
    {
        if ($this->validate()) {            
            $time = strtotime(date('Y-m-d H:i:s'));
            $photos = array();
            foreach ($this->photos as $file) {
                $path = 'uploads/photogallery/' . $file->baseName .'_'. $time . '.' . $file->extension;
                array_push($photos, $path);
            }
            $this->photo = json_encode($photos);
            return json_encode($photos);
        }
        return false;
    }

    public function upload()
    {        
        $photos = json_decode($this->photo);
        $counter = 0;
        foreach ($this->photos as $file) {                
            $file->saveAs($photos[$counter]);
            $counter++;
        }
        return true;
    }
}
    