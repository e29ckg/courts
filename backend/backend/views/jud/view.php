<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Jud */

$this->title = $model->black_number;
$this->params['breadcrumbs'][] = ['label' => 'Juds', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jud-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'black_number' => $model->black_number, 'doc_type_id' => $model->doc_type_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'black_number' => $model->black_number, 'doc_type_id' => $model->doc_type_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'black_number',
            'doc_type_id',
            'black_append',
            'red_number',
            'doc_style_id',
            'file_name',
            'file_size',
            'scan_by',
            'scan_datetime',
            'upload_by',
            'upload_datetime',
            'transfer_status',
            'file_page',
            'create_at',
        ],
    ]) ?>

</div>
