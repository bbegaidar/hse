<?php

namespace app\models;

use Yii;
use yii\base\Model;
 
class PagesForm extends Model{
    
    public $name;
    public $titleRu;
    public $subtitleRu;
    public $descriptionRu;
    public $titleKz;
    public $subtitleKz;
    public $descriptionKz;
    public $titleEn;
    public $subtitleEn;
    public $descriptionEn;
    public $url;
    public $photos;
    public $images;
    
    public function rules() {
        return [
            [['titleRu', 'subtitleRu', 'descriptionRu', 'url', 'name'], 'required', 'message' => 'Заполните поле'],
            [['titleRu', 'subtitleRu', 'descriptionRu', 'titleKz', 'subtitleKz', 'descriptionKz', 'titleEn', 'subtitleEn', 'descriptionEn', 'url', 'name'], 'string'],
            [['photos'], 'file', 'extensions' => 'png, jpg, jpeg, gif', 'maxFiles' => 5, 'on' => 'create'],
            [['photos'], 'file', 'extensions' => 'png, jpg, jpeg, gif', 'maxFiles' => 5, 'on' => 'update'],
        ];
    }
    
    public function attributeLabels() {
        return [
            'name' => 'Название',
            'titleRu' => 'Заголовок (RU)',
            'subtitleRu' => 'Подзаголовок (RU)',
            'descriptionRu' => 'Содержание (RU)',
            'titleKz' => 'Заголовок (KZ)',
            'subtitleKz' => 'Подзаголовок (KZ)',
            'descriptionKz' => 'Содержание (KZ)',
            'titleEn' => 'Заголовок (EN)',
            'subtitleEn' => 'Подзаголовок (EN)',
            'descriptionEn' => 'Содержание (EN)',
            'url' => 'URL',
            'photos' => 'Картинки'
        ];
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
            $this->images = json_encode($photos);
            return true;
        }
        return false;
    }

    public function upload()
    {        
        $photos = json_decode($this->images);
        $counter = 0;
        foreach ($this->photos as $file) {                
            $file->saveAs($photos[$counter]);
            $counter++;
        }
        return true;
    }
}
    