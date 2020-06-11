<?php

namespace app\models;

use Yii;
use yii\base\Model;
 
class TestForm extends Model{
    
    public $name;
    public $passing_point;
    
    public function rules() {
        return [
            [[ 'name', 'passing_point'], 'required', 'message' => 'Заполните поле'],
            [['passing_point'], 'integer', 'min' => 0, 'max' => 100],
            [['name'], 'string'],
        ];
    }
    
    public function attributeLabels() {
        return [
            'name' => 'Название',
            'passing_point' => 'Проходной балл в процентах (0-100)'
        ];
    }
}
    