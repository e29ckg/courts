<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\JudgementSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Judgements';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="judgement-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    echo $_SERVER["DOCUMENT_ROOT"];
    echo '</br>'.'\\\10.37.64.1\PDFServer\\';
    echo '</br>'.dirname(__FILE__);
    ?>

    <p>
        <?= Html::a('Create Judgement', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'black_number',
            'doc_type_id',
            'black_append',
            'red_number',
            //'doc_style_id',
            // 'file_name',
            // 'file_name1',
            // 'file_size',
            // 'scan_by',
            // 'scan_datetime',
            // 'upload_by',
            // 'upload_datetime',
            // 'transfer_status',
            // 'file_page',
            // 'create_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
