<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;
 
class ReviewsForm extends Model{
    
    public $reviewerRu;
    public $reviewRu;
    public $companyRu;
    public $reviewerKz;
    public $reviewKz;
    public $companyKz;
    public $reviewerEn;
    public $reviewEn;
    public $companyEn;
    public $category;
    
    public function rules() {
        return [
            [['reviewerRu', 'reviewRu', 'reviewerKz', 'reviewKz',  'reviewerEn', 'reviewEn',  'category'], 'required', 'message' => 'Заполните поле'],
            [['reviewerRu', 'reviewRu', 'reviewerKz', 'reviewKz',  'reviewerEn', 'reviewEn',  'category', 'companyRu', 'companyKz', 'companyEn'], 'string'],
            [['category'],'integer']
        ];
    }
    
    public function attributeLabels() {
        return [
            'reviewerRu' => 'ФИО (RU)',
            'reviewRu' => 'Отзыв (RU)',
            'companyRu' => 'Компания (RU)',
            'reviewerKz' => 'ФИО (KZ)',
            'reviewKz' => 'Отзыв (KZ)',
            'companyKz' => 'Компания (KZ)',
            'reviewerEn' => 'ФИО (EN)',
            'reviewEn' => 'Отзыв (EN)',
            'companyEn' => 'Компания (EN)',
            'category' => 'Категория'
        ];
    }
}
    