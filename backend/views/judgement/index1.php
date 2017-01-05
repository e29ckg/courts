<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
use yii\bootstrap\Modal;
use yii\widgets\LinkPager;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\JudgementSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Judgements1';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
    <div class="col-xs-12 col-md-12 ">
        <div class="panel panel-info ">

            <div class="panel-body">
                <p class="pull-left" ><a class="btn btn-danger" href="?r=judgement/create"><i class=" glyphicon glyphicon-plus"></i> เพิ่ม</a></p>
                <?php
                $form = ActiveForm::begin([
                            'action' => ['index1'],
                            'method' => 'get',
                            'options' => [
                                'data-pjax' => true,
                                'class' => 'form-inline pull-right',
                            ]
                ]);
                ?> 

                <div class="form-group">                       
                    <input type="text" class="form-control" name="q" placeholder="ค้นหา">
                </div>
                <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-search"></i> ค้นหา</button>
                <?php ActiveForm::end(); ?>

                <TABLE class="table table-bordered table-responsive table-striped" >   
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">ประเภทเอกสาร</th>
                            <th class="text-center">เรื่อง</th>
                            <th class="text-center" style="width: 150px">เครื่องมือ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($juds as $jud): ?>
                            <tr>
                                <td class="text-center" style="width: 100px"><?= $jud->create_at ?></td>
                                <td class="text-center" style="width: 100px"><?= $jud->doc_type_id ?></td>
                                <td><a href="http://<?= $_SERVER["HTTP_HOST"] ?>/scan_system/PDFServer/<?= $jud->black_number; ?>/<?= $jud->file_name; ?>" target="_blank">
                                        <i class="glyphicon glyphicon-bullhorn"></i>&nbsp;
                                        <?php
                                        if (!($jud->red_number == '-')) {
                                            echo $jud->red_number;
                                        } else {
                                            echo $jud->file_name;
                                        }
                                        ?>
                                    </a>
                                </td>
                                <td>
                                    <a class="btn btn-info" href="?r=judgement/update&black_number=<?= $jud->black_number ?>&doc_type_id=<?= $jud->doc_type_id ?>" >แก้ไข</a> 
                                    <a class="btn btn-danger" href="?r=judgement/delete&black_number=<?= $jud->black_number ?>&doc_type_id=<?= $jud->doc_type_id ?>" onclick="return confirm('คุณแน่ใจที่จะลบข้อมูล')">ลบ</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </TABLE>
                <?php
                // display pagination
                echo LinkPager::widget([
                    'pagination' => $pagination,
                ]);
                ?>
            </div>
        </div>
    </div>
</div>






