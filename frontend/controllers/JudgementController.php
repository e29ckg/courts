<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Judgement;
use app\models\VbookLog;
use yii\data\Pagination;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\NotFoundHttpException;

class JudgementController extends \yii\web\Controller {

    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup', 'view_download'], //action ทั้งหมดที่มี
                'rules' => [
                    [
                        'actions' => ['signup', 'view_download'],
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
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actionIndex() {
//        $modeljud = new Judgement();
//        $modelvbook = new Judgement();
        if (!(Yii::$app->user->isGuest)) {
            $pageset['link_target'] = '_blank';
        } else {
            $pageset['link_target'] = '_self';
        }

        $modelkps = Judgement::find()->where(['doc_type_id' => 'คำพิพากษา'])->orderBy(['create_at' => SORT_DESC])->limit(10)->all();
        $modelkss = Judgement::find()->where(['doc_type_id' => 'คำสั่ง'])->orderBy(['create_at' => SORT_DESC])->limit(10)->all();
        return $this->render('index', [
                    'pageset' => $pageset,
                    'kps' => $modelkps,
                    'kss' => $modelkss
        ]);
    }

    public function actionJud_a() {
        $title['head'] = 'หนังสือเวียน';
        $title['page'] = 'judgement/jud_a';
        $query = Judgement::find()->where(['doc_type_id' => ['หนังสือเวียนA', 'หนังสือเวียน']]);

        $pagination = new Pagination([
            'defaultPageSize' => 20,
            'totalCount' => $query->count(),
        ]);

        $models = $query->orderBy(['create_at' => SORT_DESC])
                ->offset($pagination->offset)
                ->limit($pagination->limit)
                ->all();

        return $this->render('jud_a', [
                    'title' => $title,
                    'models' => $models,
                    'pagination' => $pagination,
        ]);
    }

    public function actionView($doc_type_id) {
        $black_number = $_GET['black_number'];
        $doc_type_id = $_GET['doc_type_id'];
        $model = Judgement::find()->where(['black_number' => $black_number]);


        return $this->render('view', [
                    'model' => $model,
        ]);
    }

    public function actionJud_b() {
        $title['head'] = 'หนังสือเวียน ภายใน';
        $title['page'] = 'judgement/jud_b';
        $query = Judgement::find()->where(['doc_type_id' => ['หนังสือเวียนB']]);

        $pagination = new Pagination([
            'defaultPageSize' => 20,
            'totalCount' => $query->count(),
        ]);

        $models = $query->orderBy(['create_at' => SORT_DESC])
                ->offset($pagination->offset)
                ->limit($pagination->limit)
                ->all();

        return $this->render('jud_a', [
                    'title' => $title,
                    'models' => $models,
                    'pagination' => $pagination,
        ]);
    }

    public function actionJud_c() {
        $title['head'] = 'คำสัง ศยจ';
        $title['page'] = 'judgement/jud_c';
        $query = Judgement::find()->where(['doc_type_id' => ['คำสั่ง ศยจ']]);

        $pagination = new Pagination([
            'defaultPageSize' => 20,
            'totalCount' => $query->count(),
        ]);

        $models = $query->orderBy(['create_at' => SORT_DESC])
                ->offset($pagination->offset)
                ->limit($pagination->limit)
                ->all();

        return $this->render('jud_a', [
                    'title' => $title,
                    'models' => $models,
                    'pagination' => $pagination,
        ]);
    }

    public function actionJud_d() {
        $title['head'] = 'คำสั่งสนง';
        $title['page'] = 'judgement/jud_d';
        $query = Judgement::find()->where(['doc_type_id' => ['คำสั่งสนง']]);

        $pagination = new Pagination([
            'defaultPageSize' => 20,
            'totalCount' => $query->count(),
        ]);

        $models = $query->orderBy(['create_at' => SORT_DESC])
                ->offset($pagination->offset)
                ->limit($pagination->limit)
                ->all();

        return $this->render('jud_a', [
                    'title' => $title,
                    'models' => $models,
                    'pagination' => $pagination,
        ]);
    }

    public function actionJud_e() {
        $title['head'] = 'ตารางเวร';
        $title['page'] = 'judgement/jud_ำ';
        $query = Judgement::find()->where(['doc_type_id' => ['ตารงเวร']]);

        $pagination = new Pagination([
            'defaultPageSize' => 20,
            'totalCount' => $query->count(),
        ]);

        $models = $query->orderBy(['create_at' => SORT_DESC])
                ->offset($pagination->offset)
                ->limit($pagination->limit)
                ->all();

        return $this->render('jud_a', [
                    'title' => $title,
                    'models' => $models,
                    'pagination' => $pagination,
        ]);
    }

    public function actionJud_f() {
        $title['head'] = 'เอกสาร';
        $title['page'] = 'judgement/jud_f';

        $query = Judgement::find()->where(['doc_type_id' => ['เอกสาร']]);

        $pagination = new Pagination([
            'defaultPageSize' => 20,
            'totalCount' => $query->count(),
        ]);

        $models = $query->orderBy(['create_at' => SORT_DESC])
                ->offset($pagination->offset)
                ->limit($pagination->limit)
                ->all();

        return $this->render('jud_a', [
                    'title' => $title,
                    'models' => $models,
                    'pagination' => $pagination,
        ]);
    }

    public function actionView_download() {
        if (Yii::$app->user->isGuest) {
            return $this->render('site/login');
        }
        $jud = new Judgement();
        $vbooklg = new VbookLog();


        $link = 'http://';
        $link .= $_SERVER['HTTP_HOST'];
        $link .= $jud->urlfiles;
        $link .= $_GET['black_number'] . '/' . $_GET['file_name'];

        $vblg = VbookLog::find()->where(['vbook_id' => $_GET['black_number'],'user_id' => Yii::$app->user->identity->id])->all();
        if(empty($vblg)){       
        $vbooklg->vbook_id = $_GET['black_number'];
        $vbooklg->user_id = Yii::$app->user->identity->id;
        $vbooklg->create_at = date("Y-m-d H:i:s");
        $vbooklg->save(); 
        }

        $jud = Judgement::findOne($_GET['black_number']);
        $jud->transfer_status += $jud->transfer_status;
        $jud->save();

        return $this->redirect($link);
    }

}
