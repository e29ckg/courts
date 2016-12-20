<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Jud */

$this->title = 'Create Jud';
$this->params['breadcrumbs'][] = ['label' => 'Juds', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jud-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
