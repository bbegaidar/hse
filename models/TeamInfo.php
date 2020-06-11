<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "team_info".
 *
 * @property int $id
 * @property int $team
 * @property int $lang
 * @property string $name
 * @property string $description
 *
 * @property Team $team0
 * @property Lang $lang0
 */
class TeamInfo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'team_info';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['team', 'lang', 'name', 'description'], 'required'],
            [['team', 'lang'], 'integer'],
            [['name', 'description'], 'string'],
            [['team'], 'exist', 'skipOnError' => true, 'targetClass' => Team::className(), 'targetAttribute' => ['team' => 'id']],
            [['lang'], 'exist', 'skipOnError' => true, 'targetClass' => Lang::className(), 'targetAttribute' => ['lang' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('static', 'ID'),
            'team' => Yii::t('static', 'Team'),
            'lang' => Yii::t('static', 'Lang'),
            'name' => Yii::t('static', 'Name'),
            'description' => Yii::t('static', 'Description'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTeam0()
    {
        return $this->hasOne(Team::className(), ['id' => 'team']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLang0()
    {
        return $this->hasOne(Lang::className(), ['id' => 'lang']);
    }
}
