<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use backend\models\Jud;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $modeljud = Jud::find()->where(['doc_type_id' => 'หนังสือเวียน'])->orderBy(['upload_datetime' => SORT_DESC])->limit(10)->all();
        $modelvbook = Jud::find()->where(['doc_type_id' => 'เอกสาร'])->orderBy(['upload_datetime' => SORT_DESC])->limit(10)->all();
        $modelks = Jud::find()->where(['doc_type_id' => 'คำสั่ง'])->orderBy(['upload_datetime' => SORT_DESC])->limit(10)->all();
        $modelkps = Jud::find()->where(['doc_type_id' => 'คำพิพากษา'])->orderBy(['create_at' => SORT_DESC])->limit(10)->all();
        return $this->render('index', [
                    'juds' => $modeljud,
                    'vbooks' => $modelvbook,
                    'kss' => $modelks,
                    'kps' => $modelkps
        ]);
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
}
