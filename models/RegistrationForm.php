<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;
 
class RegistrationForm extends Model{
    
    public $name;
    public $surname;
    public $patronymic;
    public $email;
    public $phone;
    public $organization;
    public $password;
    public $idCard;
    
    public function rules() {
        return [
            [['email', 'phone', 'name', 'surname', 'patronymic', 'organization', 'password', 'idCard'], 'required', 'message' => 'Заполните поле'],
            [['idCard'], 'required', 'message' => 'Выберите файл'],
            [['idCard'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg, pdf'],
            ['email', 'unique', 'targetClass' => User::className(),  'message' => 'Эта почта уже используется'],
            ['email','email','message' => 'Укажите вашу почту'],
            ['phone', 'unique', 'targetClass' => User::className(),  'message' => 'Этот номер телефона уже используется'],
        ];
    }
    
    public function attributeLabels() {
        return [
            'email' => Yii::t('static', 'Email'),
            'phone' => Yii::t('static', 'Phone'),
            'name' => Yii::t('static', 'Name'),
            'surname' => Yii::t('static', 'Surname'),
            'patronymic' => Yii::t('static', 'Patronymic'),
            'organization' => Yii::t('static', 'Organization'),
            'password' => Yii::t('static', 'Password'),
            'idCard' => Yii::t('static', 'ID Card'),
        ];
    }
    
    public function uploadCard()
    {
        if ($this->validate()) {
            $time = strtotime(date('Y-m-d H:i:s'));
            $url = 'uploads/idcards/' . $time . '.' . $this->idCard->extension;
            $this->idCard->saveAs($url);
            return $url;
        } else {
            return false;
        }
    }
}
    
