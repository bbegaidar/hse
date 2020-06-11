<?php

namespace app\models;

use Yii;
use yii\base\Model;
 
class Password extends Model{
    
    public $password;
    public $confirmpassword;
    
    public function rules() {
        return [
            [ ['password','confirmpassword'],'string'],
           ['confirmpassword', function($attribute, $params, $validator){
                if ( $this->password != $this->$attribute ){
                     $validator->addError($this, $attribute, 'Пароли не совпадают');
                }
            }],
            ['password', function($attribute, $params, $validator){
                if ( $this->confirmpassword != $this->$attribute ){
                     $validator->addError($this, 'confirmpassword', 'Пароли не совпадают');
                }
            }]
        ];
    }
    
    public function attributeLabels() {
        return [
            'password' => Yii::t('static', 'Password'),
            'confirmpassword' => Yii::t('static', 'Repeat password')
        ];
    }
   
    
}
    