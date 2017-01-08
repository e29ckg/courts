<?php

namespace backend\controllers;

use Yii;
use backend\models\Profile;
use backend\models\ProfileSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\models\User;
use yii\base\Model;
use yii\data\Pagination;
use yii\filters\AccessControl;

/**
 * ProfileController implements the CRUD actions for Profile model.
 */
class ProfileController extends Controller {

    /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'view', 'create', 'update', 'delete', 'suspend', 'enableuser' ], //action ทั้งหมดที่มี
                'rules' => [
                    [
                        'actions' => ['index', 'view', 'create', 'update', 'delete', 'suspend', 'enableuser'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => [''],
                        'allow' => true,
                        'roles' => ['?', '@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
//                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Profile models.
     * @return mixed
     */
    public function actionIndex() {
        $query = Profile::find();
        
       
//        $modelUser = User::find()->all();
        if (!empty($_GET['q'])) {

            $query = $query->where(['LIKE', 'fullname', $_GET['q']]);
        } else {
            $query = Profile::find();
        }

        $pagination = new Pagination([
            'defaultPageSize' => 20,
            'totalCount' => $query->count(),
        ]);

        $models = $query->orderBy(['create_at' => SORT_DESC])
                ->offset($pagination->offset)
                ->limit($pagination->limit)
                ->all();

        return $this->render('index', [
                    'models' => $models,
//                    'modelUser' => $modelUser,
                    'pagination' => $pagination,
        ]);
    }

    /**
     * Displays a single Profile model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {

        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Profile model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $modelProfile = new Profile();
        $modelUser = new User();

        if ($modelProfile->load(Yii::$app->request->post()) &&
                $modelUser->load(Yii::$app->request->post()) &&
                Model::validateMultiple([$modelProfile, $modelUser])) {

            $modelUser->password_hash = Yii::$app->security->generatePasswordHash($modelUser->password_hash);
            $modelUser->auth_key = Yii::$app->security->generateRandomString();
//            $modelUser->email = 'user@pkkjc.com';
//            $modelUser->updated_at = Yii::$app->formatter->asTimestamp(date('Y-d-m h:i:s'));
            $modelUser->save();

            $modelProfile->user_id = $modelUser->id;
            $modelProfile->save();

            return $this->redirect(['index', 'id' => $modelProfile->id]);
        } else {
            return $this->render('create', [
                        'model' => $modelProfile,
                        'modelUser' => $modelUser,
            ]);
        }
    }

    /**
     * Updates an existing Profile model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {

        $model = $this->findModel($id);
        $modelUser = $this->findModelUser($model->user_id);
        $oldPass = $modelUser->password_hash;

        if ($model->load(Yii::$app->request->post()) &&
                $modelUser->load(Yii::$app->request->post()) &&
                Model::validateMultiple([$model, $modelUser])) {
            if (!($modelUser->password_hash == $oldPass)) {
                $modelUser->password_hash = Yii::$app->security->generatePasswordHash($modelUser->password_hash);
            }
            if ($modelUser->save()) {
                $model->save();
            }
            return $this->redirect(['index', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                        'model' => $model,
                        'modelUser' => $modelUser,
            ]);
        }
    }

    /**
     * Deletes an existing Profile model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionSuspend($id) {
        $modelProfile = $this->findModel($id);
        $modelUser = $this->findModelUser($modelProfile->user_id);
        $modelUser->status = 13;
        $modelUser->save();

        return $this->redirect(['index']);
    }

    public function actionEnableuser($id) {
        $modelProfile = $this->findModel($id);
        $modelUser = $this->findModelUser($modelProfile->user_id);
        $modelUser->status = 10;
        $modelUser->save();
        return $this->redirect(['index']);
    }

    public function actionDelete($id) {
        $modelUser = $this->findModel($id);
        $this->findModelUser($modelUser->user_id)->delete();
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Profile model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Profile the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Profile::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    protected function findModelUser($id) {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
