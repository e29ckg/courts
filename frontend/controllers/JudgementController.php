<?php

namespace frontend\controllers;

use frontend\models\Judgement;
use yii\data\Pagination;


class JudgementController extends \yii\web\Controller {

    public function actionIndex() {
//        $modeljud = new Judgement();
//        $modelvbook = new Judgement();

        $modelkps = Judgement::find()->where(['doc_type_id' => 'คำพิพากษา'])->orderBy(['create_at' => SORT_DESC])->limit(10)->all();
        $modelkss = Judgement::find()->where(['doc_type_id' => 'คำสั่ง'])->orderBy(['create_at' => SORT_DESC])->limit(10)->all();
        return $this->render('index', [
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
    public function actionView($doc_type_id){
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
        $jud = new Judgement();
        $link = 'http://';
        $link .= $_SERVER['HTTP_HOST'];
        $link .= $jud->urlfiles;
        $link .= $_GET['black_number'] . '/' . $_GET['file_name'];
        return $this->redirect($link);
    }


}
