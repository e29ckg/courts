<?php
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\BaseFileHelper;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\JudSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Juds';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jud-index">
    <?php
    if (Yii::$app->session->getFlash('success')){
        echo Yii::$app->session->getFlash('success');
    }
//    echo __DIR__;
//    echo __FILE__;
    echo $_SERVER['DOCUMENT_ROOT'].'/courts/PDFServer/';
    echo $_SERVER["HTTP_HOST"].'</br>';
    echo Yii::$app->request->userIP;
    echo Yii::$app->request->baseUrl;
//    dir('C:/xampp/htdocs/courts/PDFServer/12345', 777);
//    echo $a = iconv('UTF-8', 'TIS-620', 'C:/xampp/htdocs/courts/PDFServer/อ.182_2559');
    
//    chmod("C:\\xampp\htdocs\courts",777);    
    // get all file names
//    $files = glob($a.'/*');
//// loop through files
//    foreach ($files as $file) {
//        if (is_file($file)) {
//            // delete file
//            unlink($file);
//        }
//    }
//    rmdir($a);
// A better alternative is to use the array_map function in conjunction with the glob function
//    array_map('unlink', glob("path/to/folder/*"));
    ?>

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Jud', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
            'black_number',
            'doc_type_id',
            //'black_append',
            //'red_number',
            'doc_style_id',
             'file_name',
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
    ]);
    ?>
</div>
