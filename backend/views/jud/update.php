<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Jud */

$this->title = 'Update Jud: ' . $model->black_number;
$this->params['breadcrumbs'][] = ['label' => 'Juds', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->black_number, 'url' => ['view', 'black_number' => $model->black_number, 'doc_type_id' => $model->doc_type_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="jud-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
