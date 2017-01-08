<?php

namespace backend\controllers;

use Yii;
use backend\models\Judgement;
use backend\models\JudgementSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\data\Pagination;
use yii\filters\AccessControl;

/**
 * JudgementController implements the CRUD actions for Judgement model.
 */
class JudgementController extends Controller {

    /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'index1', 'view', 'create', 'update', 'line_alert', 'delete', 'search', 'view_download'], //action ทั้งหมดที่มี
                'rules' => [
                    [
                        'actions' => ['view', 'create', 'update', 'line_alert', 'delete', 'search', 'view_download'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['index'],
                        'allow' => true,
                        'roles' => ['?', '@'],
                    ],
                ],
            ],
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

    public function actionIndex1($q = null) {

        $query = Judgement::find();

        if (!empty($_GET['q'])) {

            $query = $query->where(['LIKE', 'red_number', $_GET['q']]);
        } else {
            $query = Judgement::find();
        }

        $pagination = new Pagination([
            'defaultPageSize' => 20,
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

            // แจ้งทาง Line
            $message = 'มีการแก้ไข ' . $model->doc_type_id . ' เรื่อง ' . $model->red_number;
            $message .= ' เรียบร้อยแล้ว สามารถดูได้ที่ เว็บภายใน';
            $message .= 'http://';
            $message .= $_SERVER['HTTP_HOST'];
            $message .= ' หัวข้อ ';
            $message .= $model->doc_type_id;
            $res = $this->notify_message($message);
            // แจ้งทาง Line

            return $this->redirect(['index1', 'black_number' => $model->black_number, 'doc_type_id' => $model->doc_type_id]);
        } else {
            return $this->render('update', [
                        'model' => $model,
            ]);
        }
    }

    public function actionLine_alert() {
        $black_number = $_GET['black_number'];
        $doc_type_id = $_GET['doc_type_id'];
        $model = $this->findModel($black_number, $doc_type_id);

        $message = 'แจ้งทราบ! เรื่อง ' . $model->red_number;
        $message .= ' ดูรายละเอียดได้ที่ pkkjcเว็บภายใน ';
        $message .= 'http://';
        $message .= $_SERVER['HTTP_HOST'] . ' หัวข้อ' . $model->doc_type_id;
//            $message .= '/scan_system/frontend/web/index.php?r=judgement/view&black_number=';
//            $message .= $model->black_number.'&doc_type_id='.$model->black_number;
        $res = $this->notify_message($message);

        return $this->redirect(['index1']);
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

    public function actionSearch($q) {
        $query = Judgement::find()->where(['LIKE', 'red_number', $q]);

        $pagination = new Pagination([
            'defaultPageSize' => 20,
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

    //ส่งข้อความผ่าน line Notify
    public function notify_message($message) {
        $line_api = 'https://notify-api.line.me/api/notify';
        $line_token = '6zhU4Wx7zWLw3HpUKFVBhDKnm9BKCcX2q48Y1NXkYTJ';
        $queryData = array('message' => $message);
        $queryData = http_build_query($queryData, '', '&');
        $headerOptions = array(
            'http' => array(
                'method' => 'POST',
                'header' => "Content-Type: application/x-www-form-urlencoded\r\n"
                . "Authorization: Bearer " . $line_token . "\r\n" . "Content-Length: "
                . strlen($queryData) . "\r\n",
                'content' => $queryData
            )
        );
        $context = stream_context_create($headerOptions);
        $result = file_get_contents($line_api, FALSE, $context);
        $res = json_decode($result);
        return $res;
    }

    public function actionView_download() {
        $jud = new Judgement();
        $link = 'http://';
        $link .= $_SERVER['HTTP_HOST'];
        $link .= $jud->urlfiles;
        $link .= $_GET['black_number'] . '/' . $_GET['file_name'];
        return $this->redirect($link);
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
