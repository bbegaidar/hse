<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_tests".
 *
 * @property int $id
 * @property int $permit
 * @property string $questions
 * @property string $answers
 * @property string $video
 * @property int $rating
 * @property string $update
 *
 * @property UserPermit $permit0
 */
class UserTests extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_tests';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['permit', 'questions', 'answers', 'video', 'rating'], 'required'],
            [['permit', 'rating'], 'integer'],
            [['questions', 'answers', 'video'], 'string'],
            [['update'], 'safe'],
            [['permit'], 'exist', 'skipOnError' => true, 'targetClass' => UserPermit::className(), 'targetAttribute' => ['permit' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'permit' => Yii::t('app', 'Permit'),
            'questions' => Yii::t('app', 'Questions'),
            'answers' => Yii::t('app', 'Answers'),
            'video' => Yii::t('app', 'Video'),
            'rating' => Yii::t('app', 'Rating'),
            'update' => Yii::t('app', 'Update'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPermitData()
    {
        return $this->hasOne(UserPermit::className(), ['id' => 'permit']);
    }
}
