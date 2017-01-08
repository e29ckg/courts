<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\LinkPager;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\JudgementSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'การจัดการหนังสือเวียน';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="col-xs-12 col-md-9 ">
    <div class="panel panel-primary ">
        <div class="panel-heading"><?= $this->title ?></div>
        <div class="panel-body">
            <!--<div class="content">-->
            <p class="pull-left"><a class="btn btn-danger" href="?r=judgement/create"><i class="glyphicon glyphicon-plus"></i> เพิ่มหนังสือ/เอกสาร</a>
                <a class="btn btn-info" href="?r=typedoc/index"><i class="glyphicon glyphicon-plus"></i> เพิ่ม/แก้ไขประเภทเอกสาร</a>
            </p>
            <p class="pull-right">

                <?php
                $form = ActiveForm::begin([
                            'action' => ['index1'],
                            'method' => 'get',
                            'options' => [
                                'data-pjax' => true,
                                'class' => 'form-inline pull-right'
                            ]
                ]);
                ?>
            <div class="form-group">
                <input type="text" class="form-control " name="q" id="q"  placeholder="ค้นหา" autocomplete="off">
                <button type="submit" class="btn btn-primary" id="btnSearch"><span class="glyphicon glyphicon-search"></span>
                    ค้นหา
                </button>
            </div>

            <?php ActiveForm::end(); ?>
            </p>
        </div>
        <TABLE class="table table-bordered table-hover table-striped">
            <thead >
            <th class="text-center" style="width: 100px">#</th>
            <th class="text-center" style="width: 150px">ประเภทหนังสือ</th>
            <th class="text-center">เรื่อง</th>
            <th class="text-center" style="width: 150px">เครื่องมือ</th>
            </thead>
            <tbody>
                <?php foreach ($juds as $jud): ?>
                    <tr>
                        <td class="text-center" ><?= $jud->create_at ?></td>
                        <td class="text-center" ><?= $jud->doc_type_id ?></td>
                        <td><a href="?r=judgement/view_download&black_number=<?= $jud->black_number; ?>&file_name=<?= $jud->file_name; ?>" target="_blank">
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
                            <a class="btn btn-primary btn-xs" href="?r=judgement/line_alert&black_number=<?= $jud->black_number ?>&doc_type_id=<?= $jud->doc_type_id ?>" >Line</a>
                            <a class="btn btn-info btn-xs" href="?r=judgement/update&black_number=<?= $jud->black_number ?>&doc_type_id=<?= $jud->doc_type_id ?>" >แก้ไข</a>
                            <a class="btn btn-danger btn-xs" href="?r=judgement/delete&black_number=<?= $jud->black_number ?>&doc_type_id=<?= $jud->doc_type_id ?>" onclick="return confirm('คุณแน่ใจที่จะลบข้อมูล')">ลบ</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </TABLE>
        <div class="pull-right">
            <?= LinkPager::widget(['pagination' => $pagination]); ?>
        </div>

        <!--</div>-->
    </div>
</div>

