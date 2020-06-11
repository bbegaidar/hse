<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "logo".
 *
 * @property int $id
 * @property string $img
 * @property string $img_name
 * @property string $img_mime
 * @property string $img_size
 * @property string $img_type
 * @property int $is_active
 */
class Logo extends \yii\db\ActiveRecord
{
    public $images;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'logo';
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
            'images' => 'Загрузите лого'
        ];
    }

    // public function saveImg()
    // {
    //     if ($this->validate()) {            
    //         $time = strtotime(date('Y-m-d H:i:s'));
    //         $photos = array();
    //         foreach ($this->images as $file) {
    //             $path = 'uploads/photogallery/' . $file->baseName .'_'. $time . '.' . $file->extension;
    //             array_push($photos, $path);
    //         }
    //         $this->img = json_encode($photos);
    //         return true;
    //     }
    //     return false;
    // }

    // public function upload()
    // {        
    //     $photos = json_decode($this->img);
    //     $counter = 0;
    //     foreach ($this->images as $file) {                
    //         $file->saveAs($photos[$counter]);
    //         $counter++;
    //     }
    //     return true;
    // }
}
