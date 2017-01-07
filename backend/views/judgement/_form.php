<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model backend\models\Judgement */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="row">
    <div class="col-xs-12 col-md-8 ">
        <div class="panel panel-info ">
          <div class="panel-heading">เพิ่มเอกสาร </div>
            <div class="panel-body">
              <div class="judgement-form">

                  <?php $form = ActiveForm::begin([ 'options' => ['enctype' => 'multipart/form-data']]); ?>

                  <?= $form->field($model, 'black_number')->hiddenInput()->label(false) ?>

                  <?=
                  $form->field($model, 'doc_type_id')->dropDownList(
                          ArrayHelper::map(\backend\models\TypeDoc::find()->orderBy(['id_type' => SORT_ASC])->all(), 'type_doc_name', 'type_doc_name'), ['prompt' => 'Select..']
                  )
                  ?>

                  <?= $form->field($model, 'black_append')->hiddenInput()->label(false) ?>

                  <?= $form->field($model, 'red_number')->textInput(['maxlength' => true]) ?>

                  <?= $form->field($model, 'doc_style_id')->hiddenInput()->label(false) ?>

                  <?= $form->field($model, 'file_name')->fileInput() ?>

                  <?= $form->field($model, 'file_size')->hiddenInput()->label(false) ?>

                  <?= $form->field($model, 'scan_by')->hiddenInput()->label(false) ?>

                  <?= $form->field($model, 'scan_datetime')->hiddenInput()->label(false) ?>

                  <?= $form->field($model, 'upload_by')->hiddenInput(['value' => 'web'])->label(false) ?>

                  <?= $form->field($model, 'upload_datetime')->hiddenInput()->label(false) ?>

                  <?= $form->field($model, 'transfer_status')->hiddenInput(['value' => '1'])->label(false) ?>

                  <?= $form->field($model, 'file_page')->hiddenInput(['value' => '1'])->label(false) ?>

                  <?= $form->field($model, 'create_at')->hiddenInput()->label(false)?>

                  <div class="form-group">
                      <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                  </div>

                  <?php ActiveForm::end(); ?>

              </div>

            </div>
        </div>
    </div>
</div>
