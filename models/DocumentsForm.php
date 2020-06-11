<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;
 
class DocumentsForm extends Model{
    
    public $name;
    public $alias;
    public $file;
    
    public function rules() {
        return [
            [['name', 'alias'], 'required', 'message' => 'Заполните поле'],
            [['name', 'alias'], 'string'],
            [['file'], 'file', 'skipOnEmpty' => true, 'extensions' => 'zip, pdf']
        ];
    }
    
    public function attributeLabels() {
        return [
            'name' => 'Название',
            'alias' => 'Алиас',
            'file' => 'Файл'
        ];
    }
    
    public function fileUrl()
    {
        if ($this->validate()) {
            $time = strtotime(date('Y-m-d H:i:s'));
            $url = 'uploads/documents/' . $this->file->baseName . '_' . $time . '.' . $this->file->extension;
            return $url;
        } else {
            return false;
        }
    }
    
    public function uploadFile($url)
    {
        if ($this->file->saveAs($url)) {
            return true;
        } else {
            return false;
        }
    }
}
    