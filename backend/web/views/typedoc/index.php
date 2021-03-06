<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\TypeDocSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Type Docs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="type-doc-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Type Doc', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_type',
            'type_doc_name',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
