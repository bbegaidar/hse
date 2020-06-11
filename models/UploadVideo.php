<?php 
namespace app\models;

use yii\base\Model;
use yii\web\UploadedFile;

class UploadVideo extends Model
{
    /**
     * @var UploadedFile
     */
    public $file;

    public function rules()
    {
        return [
            [['file'], 'file', 'skipOnEmpty' => false, 'extensions' => 'mp4'],
        ];
    }
    
     public function fileUrl($user,$fileName)
    {
        $dir = 'uploads/videos/'.$user->id.'_Email:'.$user->email.'/'; 
        $file = $fileName . '.' . $this->file->extension;
        if (!file_exists($dir)) {
            mkdir($dir);
        }
        $url = $dir.$file;
        return $url;
    }
    
    public function uploadFile($url)
    {
        if ($this->file->saveAs($url)) {
            return true;
        } else {
            return false;
        }
    }
}