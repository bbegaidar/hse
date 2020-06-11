<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $username
 * @property string $email
 * @property string $phone
 * @property string $name
 * @property string $surname
 * @property string $patronymic
 * @property string $organization
 * @property string $password
 * @property string $authKey
 * @property int $role
 *
 * @property UserRole $role0
 * @property UserPermit $permit
 */
class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'email', 'phone', 'name', 'surname', 'patronymic', 'organization', 'password', 'role', 'idCard'], 'required'],
            [['username', 'email', 'phone', 'name', 'surname', 'patronymic', 'organization', 'password', 'authKey'], 'string'],
            [['role'], 'integer'],
            [['email'], 'unique', 'targetClass' => self::className(),  'message' => 'Эта почта уже зарегистрированна'],
            [['phone'], 'unique', 'targetClass' => self::className(),  'message' => 'Этот телефон уже зарегистрирован'],
            [['role'], 'exist', 'skipOnError' => true, 'targetClass' => UserRole::className(), 'targetAttribute' => ['role' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('static', 'ID'),
            'username' => Yii::t('static', 'Username'),
            'email' => Yii::t('static', 'Email'),
            'phone' => Yii::t('static', 'Phone'),
            'name' => Yii::t('static', 'Name'),
            'surname' => Yii::t('static', 'Surname'),
            'patronymic' => Yii::t('static', 'Patronymic'),
            'organization' => Yii::t('static', 'Organization'),
            'password' => Yii::t('static', 'Password'),
            'authKey' => Yii::t('static', 'Auth Key'),
            'role' => Yii::t('static', 'Role'),
            'idCard' => Yii::t('static', 'ID Card')
        ];
    }
    
    
    
    
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }
    
    public static function findIdentityByAccessToken($token, $type = null)
    {
        foreach (self::$users as $user) {
            if ($user['accessToken'] === $token) {
                return new static($user);
            }
        }

        return null;
    }
    
    public static function findByLogin($email)
    {
        return static::findOne(['email' => $email]);
    }
    
    public static function findByRole($role)
    {
        return static::findAll(['role' => $role]);
    }
    
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }
    
    public function validatePassword($pass)    {  
        return Yii::$app->security->validatePassword($pass, $this->password);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRoleData()
    {
        return $this->hasOne(UserRole::className(), ['id' => 'role']);
    }

    public function getPermit()
    {
        return $this->hasMany(UserPermit::className(), ['user' => 'id']);
    }
}
