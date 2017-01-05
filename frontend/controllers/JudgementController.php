<?php

namespace frontend\controllers;

use frontend\models\Judgement;
use yii\data\Pagination;

class JudgementController extends \yii\web\Controller {

    public function actionIndex() {
//        $modeljud = new Judgement();
//        $modelvbook = new Judgement();

        $modelkps = Judgement::find()->where(['doc_type_id' => 'คำพิพากษา'])->orderBy(['upload_datetime' => SORT_DESC])->limit(10)->all();
        return $this->render('index', [
                    'kps' => $modelkps
        ]);
    }

    public function actionJud_a() {
        $title['head'] = 'หนังสือเวียน';
        $title['page'] = 'judgement/jud_a';
        $query = Judgement::find()->where(['doc_type_id' => ['หนังสือเวียนA', 'หนังสือเวียน']]);
        
        if (!empty($_GET['q'])) {
            $query = $query->where(['LIKE', 'red_number', $_GET['q']]);//            
        } else {
//            $query = Judgement::find();
        }

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

    public function actionJud_b() {
        $title['head'] = 'หนังสือเวียน';
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
        $title['head'] = 'หนังสือเวียน';
        $title['page'] = 'judgement/jud_c';
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
    
    public function actionJud_d() {
        $title = 'หนังสือเวียน';
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
public function actionJud_e() {
        $title = 'หนังสือเวียน';
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
    
    public function actionJud_f() {
        $title = 'หนังสือเวียน';
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



    public function actionView_download() {
        $jud = new Judgement();
        $link = $jud->urlfiles;
        $link .= $_GET['black_number'] . '/' . $_GET['file_name'];
        return $this->redirect($link);
    }

}
