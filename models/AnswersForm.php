<?php

namespace app\models;

use Yii;
use yii\base\Model;
 
class AnswersForm extends Model{
    
    public $questionRu;
    public $answerRu;
    public $questionKz;
    public $answerKz;
    public $questionEn;
    public $answerEn;
    
    public function rules() {
        return [
            [['questionRu', 'answerRu', 'questionKz', 'answerKz', 'questionEn', 'answerEn'], 'required', 'message' => 'Заполните поле'],
            [['questionRu', 'answerRu', 'questionKz', 'answerKz', 'questionEn', 'answerEn'], 'string'],
        ];
    }
    
    public function attributeLabels() {
        return [
            'questionRu' => 'Вопрос (RU)',
            'answerRu' => 'Ответ (RU)',
            'questionKz' => 'Вопрос (KZ)',
            'answerKz' => 'Ответ (KZ)',
            'questionEn' => 'Вопрос (EN)',
            'answerEn' => 'Ответ (EN)',
        ];
    }
}
    