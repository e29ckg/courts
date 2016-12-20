<?php

namespace frontend\controllers;

use frontend\models\Judgement;

class JudgementController extends \yii\web\Controller {

    public function actionIndex() {
//        $modeljud = new Judgement();
//        $modelvbook = new Judgement();
        $modeljud = Judgement::find()->where(['doc_type_id' => 'หนังสือเวียน'])->orderBy(['upload_datetime' => SORT_DESC])->limit(10)->all();
        $modelvbook = Judgement::find()->where(['doc_type_id' => 'เอกสาร'])->orderBy(['upload_datetime' => SORT_DESC])->limit(10)->all();
        $modelks = Judgement::find()->where(['doc_type_id' => 'คำสั่ง'])->orderBy(['upload_datetime' => SORT_DESC])->limit(10)->all();
        $modelkps = Judgement::find()->where(['doc_type_id' => 'คำพิพากษา'])->orderBy(['upload_datetime' => SORT_DESC])->limit(10)->all();
        return $this->render('index', [
                    'juds' => $modeljud,
                    'vbooks' => $modelvbook,
                    'kss' => $modelks,
                    'kps' => $modelkps
        ]);
    }

}
