<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Judgement */

$this->title = 'Create Judgement';
$this->params['breadcrumbs'][] = ['label' => 'Judgements', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="judgement-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
