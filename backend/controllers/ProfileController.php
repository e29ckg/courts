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

/**
 * ProfileController implements the CRUD actions for Profile model.
 */
class ProfileController extends Controller {

    /**
     * @inheritdoc
     */
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
     * Lists all Profile models.
     * @return mixed
     */
    public function actionIndex() {
        $modelProfile = new \backend\models\profile();
        $modelProfile = \backend\models\profile::find()->joinWith('user')->all();

        return $this->render('index', [
                    'models' => $modelProfile,
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

            $modelUser->password_hash = Yii::$app->security->generatePasswordHash('pass');
//                $modelUser->id = 2;
            $modelUser->save();

            $modelProfile->user_id = $modelUser->id;
            $modelProfile->save();




//                $modelUser->load(Yii::$app->request->post()) &&
//                Model::validateMultiple([$modelProfile, $modelUser])) {
//            if ($modelUser->save()) {
//                $modelProfile->user_id = $modelUser->id;
//                $modelProfile->save();
//            }
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

        if (
                $model->load(Yii::$app->request->post()) &&
                $modelUser->load(Yii::$app->request->post()) &&
                Model::validateMultiple([$model, $modelUser])
        ) {
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
    public function actionDelete($id) {
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
    
    protected function findModelUser($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
