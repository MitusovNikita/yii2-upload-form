<?php
namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\UploadForm;
use app\models\UploadFormSave;
use yii\web\UploadedFile;

class FileFieldController extends Controller
{
    public function actionUpload()
    {
        $model = new UploadForm();

        if (Yii::$app->request->isPost) {
            $model->file = UploadedFile::getInstances($model, 'file');

            if ($model->file && $model->validate()) {
                foreach ($model->file as $file) {
                    // translate,lower and unique file name
                    $newFileName = $model->editFileName($file->baseName,$file->extension);
                    // upload file
                    $file->saveAs('uploads/' . $newFileName . '.' . $file->extension);
                    // seve data to db
                    $save = new UploadFormSave();
                    $save->name = $newFileName;
                    $save->date = date("Y-m-d H:i:s");
                    $save->save();
                }
            }
        }
        return $this->render('files', ['model' => $model]);
    }

    public function actionView()
    {
        $categoryList = UploadFormSave::find()->select('name, date')->orderBy('id')->all();

        return $this->render('view', ['categoryList' => $categoryList]);

    }
}
