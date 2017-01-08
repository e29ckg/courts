<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Profile */

$this->title = $model->fullname ;
$this->params['breadcrumbs'][] = ['label' => 'Profiles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
    <div class="col-xs-12 col-md-8 ">
        <div class="panel panel-info ">
            <div class="panel-heading"><?= Html::encode($this->title) ?></div>
            <div class="panel-body">
                <TABLE class="table table-bordered table-hover table-striped">
                <thead >
                <th class="text-center" >#</th>
                <th class="text-center" >รายละเอียด</th>                
                </thead>
                <tbody>                    
                        <tr>
                            <td class="text-right" > id </td>
                            <td class="text-left" ><?= $model->id ?></td>                            
                        </tr>
                        <tr>
                            <td class="text-right" >user_id</td>
                            <td class="text-left" ><?= $model->user_id ?></td>                            
                        </tr>
                        <tr>
                            <td class="text-right" >ชื่อ-สกุล</td>
                            <td class="text-left" ><?= $model->fullname ?></td>                            
                        </tr>
                        <tr>
                            <td class="text-right" >ตำแหน่ง</td>
                            <td class="text-left" ><?= $model->dep ?></td>                            
                        </tr>
                        <tr>
                            <td class="text-right" >วันเกิด</td>
                            <td class="text-left" ><?= $model->user_id ?></td>                            
                        </tr>
                        <tr>
                            <td class="text-right" >Username</td>
                            <td class="text-left" ><?= $model->username ?></td>                            
                        </tr>
                        <tr>
                            <td class="text-right" >e-mail</td>
                            <td class="text-left" ><?= $model->email?></td>                            
                        </tr>                        
                        <tr>
                            <td class="text-right" >สถานะ</td>
                            <td class="text-left" > <?php if( $model->status == 13){echo ' <span class="label label-danger">ระงับการใช้งาน</span>';}?></td>                            
                        </tr>
                   
                </tbody>
            </TABLE>
                <div class="text-center">
                    <a class="btn btn-primary btn-lg" href="?r=profile/update&id=<?= $model->id ?>" >แก้ไข</a>
                    <?php if( $model->status == 13){echo '<a class="btn btn-primary btn-lg" href="?r=profile/delete&id='.$model->id.'" onclick="return confirm(\'คุณแน่ใจที่จะลบข้อมูล\')" >ลบ</a>';}?>
                </div>
            </div>
        </div>
    </div>
</div>

