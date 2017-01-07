<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\TypeDoc */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="type-doc-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_type')->textInput() ?>

    <?= $form->field($model, 'type_doc_name')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
