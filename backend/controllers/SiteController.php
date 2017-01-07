<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use backend\models\Judgement;

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
        $modeljudA = Judgement::find()->where(['doc_type_id' => ['หนังสือเวียนA','หนังสือเวียน']])->orderBy(['create_at' => SORT_DESC])->limit(10)->all();
        $modeljudB = Judgement::find()->where(['doc_type_id' => 'หนังสือเวียนB'])->orderBy(['create_at' => SORT_DESC])->limit(9)->all();
        $modelkps = Judgement::find()->where(['doc_type_id' => 'คำสั่งศยจ'])->orderBy(['create_at' => SORT_DESC])->limit(9)->all();
        $modelkso = Judgement::find()->where(['doc_type_id' => 'คำสั่งสนง'])->orderBy(['create_at' => SORT_DESC])->limit(9)->all();
        $modeltbvs = Judgement::find()->where(['doc_type_id' => 'ตารางเวร'])->orderBy(['create_at' => SORT_DESC])->limit(9)->all();
        $modelbbs = Judgement::find()->where(['doc_type_id' => 'เอกสาร'])->orderBy(['create_at' => SORT_DESC])->limit(9)->all();
        return $this->render('index', [
                    'judAs' => $modeljudA,
                    'judBs' => $modeljudB,
                    'kpss' => $modelkps,
                    'ksos' => $modelkso,
                    'tvbs' => $modeltbvs,
                    'bbss' => $modelbbs
                ]);
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
