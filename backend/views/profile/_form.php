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
            <div class="panel-heading"><?= Html::encode($this->title) ?></div>
            <div class="panel-body">
                <?php $form = ActiveForm::begin(); ?>
                <TABLE class="table table-borderless table-hover ">
                    <thead >
                    <th class="text-center" >#</th>
                    <th class="text-center" >รายละเอียด</th>                
                    </thead>
                    <tbody>                    
<!--                        <tr>
                            <td class="text-right" > id </td>
                            <td class="text-left" ><?= $model->id ?></td>                            
                        </tr>
                        <tr>
                            <td class="text-right" >user_id</td>
                            <td class="text-left" ><?= $model->user_id ?></td>                            
                        </tr>-->
                        <tr>
                            <td class="text-right" >Username</td>
                            <td class="text-left" ><?= $form->field($modelUser, 'username')->textInput()->label(FALSE) ?></td>                            
                        </tr>
                        <tr>
                            <td class="text-right" >password</td>
                            <td class="text-left" ><?= $form->field($modelUser, 'password_hash')->passwordInput()->label(FALSE) ?></td>                            
                        </tr>
                        <tr>
                            <td class="text-right" >ชื่อ-สกุล</td>
                            <td class="text-left" ><?= $form->field($model, 'fullname')->textInput(['maxlength' => true])->label(FALSE) ?></td>                            
                        </tr>
                        <tr>
                            <td class="text-right" >ตำแหน่ง</td>
                            <td class="text-left" ><?= $form->field($model, 'dep')->textInput()->label(FALSE) ?></td>                            
                        </tr>
                        <tr>
                            <td class="text-right" >เลขบัตรประชาชน</td>
                            <td class="text-left" ><?= $form->field($model, 'id_card')->textInput(['maxlength' => 13])->label(FALSE) ?></td>                            
                        </tr>
                        <tr>
                            <td class="text-right" >วันเกิด</td>
                            <td class="text-left" ><?= $form->field($model, 'birthday')->textInput()->label(FALSE) ?></td>                            
                        </tr>
                        <tr>
                            <td class="text-right" >E-mail</td>
                            <td class="text-left" ><?= $form->field($modelUser, 'email')->textInput()->label(FALSE) ?></td>                            
                        </tr>
                        <tr>
                            <td class="text-right" >รูป</td>
                            <td class="text-left" ><?= $form->field($model, 'img')->fileInput()->label(FALSE) ?></td>                            
                        </tr>                        
                        <tr>
                            <td class="text-right" >สถานะ</td>
                            <td class="text-left" > 
                                
                            </td>                            
                        </tr>
                        <tr>
                            <td class="text-right" ></td>
                            <td class="text-left" > 
                                <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                    
                            </td>                            
                        </tr>

                    </tbody>
                </TABLE>
                <?php ActiveForm::end(); ?>
                
            </div>
        </div>
    </div>
</div>
