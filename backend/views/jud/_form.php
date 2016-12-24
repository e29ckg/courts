<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model backend\models\Jud */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="jud-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>


    <?= $form->field($model, 'doc_type_id')->dropDownList(
         ArrayHelper::map(\backend\models\TypeDoc::find()->all(),'type_doc_name','type_doc_name'),
        ['prompt' => 'Select..']
) ?>

    <?= $form->field($model, 'doc_style_id')->textInput() ?>

    <?= $form->field($model, 'file')->fileInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
