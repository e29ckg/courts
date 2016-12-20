<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Jud */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="jud-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'black_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'doc_type_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'black_append')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'red_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'doc_style_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'file_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'file_size')->textInput() ?>

    <?= $form->field($model, 'scan_by')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'scan_datetime')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'upload_by')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'upload_datetime')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'transfer_status')->textInput() ?>

    <?= $form->field($model, 'file_page')->textInput() ?>

    <?= $form->field($model, 'create_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
