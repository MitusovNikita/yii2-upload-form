<?php
namespace app\models;

use yii\base\Model;
use yii\helpers\Inflector;

class UploadForm extends Model
{
    /**
     * @var UploadedFile|Null file attribute
     */
    public $file;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['file'], 'file', 'maxFiles' => 5, 'extensions' => ''],
        ];
    }

    public function editFileName($fileName, $fileExtension)
    {
        $lowerFileName = mb_strtolower($fileName);

        $translatedFilemName = Inflector::transliterate($lowerFileName);

        $cnt = 1;
        while (file_exists('uploads/' . $translatedFilemName . '.' . $fileExtension)) {
            $translatedFilemName =  $translatedFilemName . '_' . $cnt;
            $cnt++;
        }

        return $translatedFilemName;
    }
}
