<?php

namespace frontend\controllers;

use frontend\models\Judgement;

class JudgementController extends \yii\web\Controller {

    public function actionIndex() {
//        $modeljud = new Judgement();
//        $modelvbook = new Judgement();

        $modelkps = Judgement::find()->where(['doc_type_id' => 'คำพิพากษา'])->orderBy(['upload_datetime' => SORT_DESC])->limit(10)->all();
        return $this->render('index', [
                    'kps' => $modelkps
        ]);
    }

}
