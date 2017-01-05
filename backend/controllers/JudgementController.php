<?php

namespace backend\controllers;

use Yii;
use backend\models\Judgement;
use backend\models\JudgementSearch;
use backend\models\JudgementSearch_1;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\data\Pagination;

/**
 * JudgementController implements the CRUD actions for Judgement model.
 */
class JudgementController extends Controller {

    /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['GET'],
                ],
            ],
        ];
    }

    /**
     * Lists all Judgement models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new JudgementSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    public function actionIndex1($q = 111) {
        
        $model = new Judgement();

        if (!empty($_GET['q'])) {

            $query = Judgement::find()->where(['LIKE', 'red_number', $_GET['q']]);
//            
        } else {
            $query = Judgement::find();
        }
        $pagination = new Pagination([
            'defaultPageSize' => 10,
            'totalCount' => $query->count(),
        ]);

        $models = $query->orderBy(['create_at' => SORT_DESC])
                ->offset($pagination->offset)
                ->limit($pagination->limit)
                ->all();
        
        return $this->render('index1', [
                    'juds' => $models,
                    'pagination' => $pagination,
        ]);
    }

    /**
     * Displays a single Judgement model.
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
     * Creates a new Judgement model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Judgement();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->black_number = Yii::$app->getSecurity()->generateRandomString(9);
            mkdir(Judgement::getUploadPath() . $model->black_number, 777);
            $model->file_name = $model->upload($model, 'file_name', $model->black_number);
            $model->save();

            return $this->redirect(['index1', 'black_number' => $model->black_number, 'doc_type_id' => $model->doc_type_id]);
        } else {
            return $this->render('create', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Judgement model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $black_number
     * @param string $doc_type_id
     * @return mixed
     */
    public function actionUpdate($black_number, $doc_type_id) {
        $model = $this->findModel($black_number, $doc_type_id);

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {

            $photo = UploadedFile::getInstance($model, 'file_name');

            if ($photo !== null) {
                if (isset($model->file_name)) {
                    $model->deleteallfile($model->black_number);
                }
            }

            $model->file_name = $model->upload($model, 'file_name', $model->black_number);
            $model->save();
            return $this->redirect(['view', 'black_number' => $model->black_number, 'doc_type_id' => $model->doc_type_id]);
        } else {
            return $this->render('update', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Judgement model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $black_number
     * @param string $doc_type_id
     * @return mixed
     */
    public function actionDelete($black_number, $doc_type_id) {
        $model = $this->findModel($black_number, $doc_type_id);
        if ($model->deleteDirFiles($model->black_number)) {
            Yii::$app->session->setFlash($doc_type_id);
        }

        return $this->redirect(['index1']);
    }

    /**
     * Finds the Judgement model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $black_number
     * @param string $doc_type_id
     * @return Judgement the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($black_number, $doc_type_id) {
        if (($model = Judgement::findOne(['black_number' => $black_number, 'doc_type_id' => $doc_type_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
