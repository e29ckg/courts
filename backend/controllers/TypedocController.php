<?php

namespace backend\controllers;

use Yii;
use backend\models\TypeDoc;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * JudController implements the CRUD actions for Jud model.
 */
class TypedocController extends Controller {

    public function behaviors() {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Jud models.
     * @return mixed
     */
    public function actionIndex() {
$model = TypeDoc::find()->all();
        return $this->render('index', [
                    'models' => $model,
        ]);
    }

    /**
     * Displays a single Jud model.
     * @param string $black_number
     * @param string $doc_type_id
     * @return mixed
     */
    public function actionView($black_number, $doc_type_id) {
        return $this->render('view', [
                    'model' => $this->findModel($black_number, $doc_type_id),
        ]);
    }

    /**
     * Creates a new Jud model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {

        $model = new Jud();

        if ($model->load(Yii::$app->request->Post())) {

            $fn = $randomString = Yii::$app->getSecurity()->generateRandomString(9);
            $model->file = UploadedFile::getInstance($model, 'file');
            mkdir(Jud::getUploadPath() . $fn, 777);
            $model->file->saveAs(Jud::getUploadPath() . $fn . '/' . $fn . '.' . $model->file->extension);
            $model->file_name = $fn . '.' . $model->file->extension;
            $model->black_number = $fn;
            $model->save();
            Yii::$app->session->setFlash('success', 'บันทึกเรียบร้อย');
            return $this->redirect(['view', 'black_number' => $model->black_number, 'doc_type_id' => $model->doc_type_id]);
//        
        }

        return $this->render('create', [
                    'model' => $model,
        ]);
    }

    /**
     * Updates an existing Jud model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $black_number
     * @param string $doc_type_id
     * @return mixed
     */
    public function actionUpdate($black_number, $doc_type_id) {
        $model = $this->findModel($black_number, $doc_type_id);

        if ($model->load(Yii::$app->request->post())) {
            $a = Jud::getUploadPath();
            $a .= iconv('UTF-8', 'TIS-620', $black_number);
//        $a = iconv('TIS-620', 'UTF-8', 'C:/xampp/htdocs/courts/PDFServer/' . $black_number);
            $files = glob($a . '/*');
// loop through files
            foreach ($files as $file) {
                if (is_file($file)) {
                    // delete file
                    unlink($file);
                }
            }
            rmdir($a);
            
            $fn = $randomString = Yii::$app->getSecurity()->generateRandomString(9);
            $model->file = UploadedFile::getInstance($model, 'file');
            mkdir(Jud::getUploadPath() . $fn, 777);
            $model->file->saveAs(Jud::getUploadPath() . $fn . '/' . $fn . '.' . $model->file->extension);
            $model->file_name = $fn . '.' . $model->file->extension;
            $model->black_number = $fn;
            
            $model->save();
            return $this->redirect(['view', 'black_number' => $model->black_number, 'doc_type_id' => $model->doc_type_id]);
        } else {
            return $this->render('update', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Jud model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $black_number
     * @param string $doc_type_id
     * @return mixed
     */
    public function actionDelete($black_number, $doc_type_id) {

        $a = Jud::getUploadPath();

        $a .= iconv('UTF-8', 'TIS-620', $black_number);
//        $a = iconv('TIS-620', 'UTF-8', 'C:/xampp/htdocs/courts/PDFServer/' . $black_number);
        $files = glob($a . '/*');
// loop through files
        foreach ($files as $file) {
            if (is_file($file)) {
                // delete file
                unlink($file);
            }
        }
        rmdir($a);

        $this->findModel($black_number, $doc_type_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Jud model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $black_number
     * @param string $doc_type_id
     * @return Jud the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($black_number, $doc_type_id) {
        if (($model = Jud::findOne(['black_number' => $black_number, 'doc_type_id' => $doc_type_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    private function uploadSingleFile($model, $tempFile = null) {
        $file = [];
        $json = '';
        try {
            $UploadedFile = UploadedFile::getInstance($model, 'covenant');
            if ($UploadedFile !== null) {
                $oldFileName = $UploadedFile->basename . '.' . $UploadedFile->extension;
                $newFileName = md5($UploadedFile->basename . time()) . '.' . $UploadedFile->extension;
                $UploadedFile->saveAs(Freelance::UPLOAD_FOLDER . '/' . $model->ref . '/' . $newFileName);
                $file[$newFileName] = $oldFileName;
                $json = Json::encode($file);
            } else {
                $json = $tempFile;
            }
        } catch (Exception $e) {
            $json = $tempFile;
        }
        return $json;
    }

    private function uploadMultipleFile($model, $tempFile = null) {
        $files = [];
        $json = '';
        $tempFile = Json::decode($tempFile);
        $UploadedFiles = UploadedFile::getInstances($model, 'docs');
        if ($UploadedFiles !== null) {
            foreach ($UploadedFiles as $file) {
                try {
                    $oldFileName = $file->basename . '.' . $file->extension;
                    $newFileName = md5($file->basename . time()) . '.' . $file->extension;
                    $file->saveAs(Freelance::UPLOAD_FOLDER . '/' . $model->ref . '/' . $newFileName);
                    $files[$newFileName] = $oldFileName;
                } catch (Exception $e) {
                    
                }
            }
            $json = json::encode(ArrayHelper::merge($tempFile, $files));
        } else {
            $json = $tempFile;
        }
        return $json;
    }

    private function CreateDir($folderName) {
        if ($folderName != NULL) {
            $basePath = Jud::getUploadPath();
            if (BaseFileHelper::createDirectory($basePath . $folderName, 0777)) {
                BaseFileHelper::createDirectory($basePath . $folderName . '/thumbnail', 0777);
            }
        }
        return;
    }

}
