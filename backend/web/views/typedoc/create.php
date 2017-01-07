<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\TypeDoc */

$this->title = 'Create Type Doc';
$this->params['breadcrumbs'][] = ['label' => 'Type Docs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="type-doc-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
