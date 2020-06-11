<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "licences".
 *
 * @property int $id
 * @property string $img
 * @property string $img_name
 * @property string $img_mime
 * @property string $img_size
 * @property string $img_type
 * @property int $is_active
 */
class Licences extends \yii\db\ActiveRecord
{
    public $images;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'licences';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['is_active'], 'integer'],
            [['img', 'img_name', 'img_mime', 'img_size', 'img_type'], 'string', 'max' => 255],
            [['images'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg, jpeg, gif', 'on' => 'create'],
            [['images'], 'file', 'extensions' => 'png, jpg, jpeg, gif', 'on' => 'update'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'img' => 'Img',
            'is_active' => 'Это активно',
            'images' => 'Загрузите лицензию'
        ];
    }    
}
