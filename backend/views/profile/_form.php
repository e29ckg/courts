<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Profile */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="row">
    <div class="col-xs-12 col-md-8 ">
        <div class="panel panel-info ">
            <div class="panel-heading">เพิ่มเอกสาร </div>
            <div class="panel-body">
                <div class="judgement-form">

                    <?php $form = ActiveForm::begin(); ?>


                    <?= $form->field($model, 'fullname')->textInput(['maxlength' => true]) ?>


                    <?= $form->field($modelUser, 'username')->textInput() ?>

                    <div class="form-group">
                        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                    </div>

                    <?php ActiveForm::end(); ?>

                </div>
            </div>
        </div>
    </div>
</div>

