<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "team".
 *
 * @property int $id
 * @property string $photo
 * @property string $email
 * @property string $phone
 * @property string $mob_phone
 *
 * @property TeamInfo $teamInfo
 */
class Team extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'team';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['photo', 'email', 'phone', 'mob_phone'], 'string'],
            ['email', 'email']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('static', 'ID'),
            'photo' => Yii::t('static', 'Photo'),
            'email' => Yii::t('static', 'Email'),
            'phone' => Yii::t('static', 'Phone'),
            'mob_phone' => Yii::t('static', 'mob phone'),
        ];
    }

     /**
     * @return \yii\db\ActiveQuery
     */
    public function getTeamInfos()
    {
        return $this->hasMany(TeamInfo::className(), ['team' => 'id']);
    }
    
    public function getContent($lang_id=null)
    {
        $lang_id = ($lang_id === null)? Lang::getCurrent()->id: $lang_id;

        return $this->hasOne(TeamInfo::className(), ['team' => 'id'])->where(['lang' => $lang_id]);
    }
    
    public function getRuContent()
    {
        return $this->hasOne(TeamInfo::className(), ['team' => 'id'])->where(['lang' => 2]);
    }
    
    public function beforeDelete()
    {
        if (!parent::beforeDelete()) {
            return false;
        }
        TeamInfo::deleteAll(['team' => $this->id]);
        return true;
    }
}
