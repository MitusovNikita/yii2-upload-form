<?php
namespace app\models;

use \yii\db\ActiveRecord;

class UploadFormSave extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'files';
    }

    public function saveFileInfo()
    {
        return 1;
    }
}
