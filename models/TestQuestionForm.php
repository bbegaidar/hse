<?php

namespace app\models;

use Yii;
use yii\base\Model;
 
class TestQuestionForm extends Model{
    
    public $question;
    public $test;
    public $type;
    
    public function rules() {
        return [
            [[ 'question','test','type'], 'required', 'message' => 'Заполните поле'],
            [['question'], 'string'],
            [['type','test'], 'integer'],
        ];
    }
    
    public function attributeLabels() {
        return [
            'question' => 'Вопрос',
            'type' => 'ИТР',
            'test' => 'Категория',
        ];
    }
}
    