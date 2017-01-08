<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\TypeDocSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'ประเภทเอกสาร';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="col-xs-12 col-md-9 ">
    <div class="panel panel-info ">
        <div class="panel-heading"><?= $this->title ?></div>
        <div class="panel-body">
            <p class="pull-left">
            <a class="btn btn-info" href="?r=typedoc/create"><i class="glyphicon glyphicon-plus"></i> เพิ่มประเภทเอกสาร</a>
            </p>
            <TABLE class="table table-bordered table-hover table-striped">
                <thead >
                <th class="text-center" style="width: 100px">ID</th>
                <th class="text-center" style="width: 150px">ประเภทหนังสือ</th>

                <th class="text-center" style="width: 150px">เครื่องมือ</th>
                </thead>
                <tbody>
<?php foreach ($model as $jud): ?>
                        <tr>
                            <td class="text-center" ><?= $jud->id_type ?></td>
                            <td class="text-center" ><?= $jud->type_doc_name ?></td>                        
                            <td>
                                <a class="btn btn-info btn-xs" href="?r=typedoc/update&id=<?= $jud->id_type ?>" >แก้ไข</a>
                                <a class="btn btn-danger btn-xs" href="?r=typedoc/delete&id=<?= $jud->id_type ?>" onclick="return confirm('คุณแน่ใจที่จะลบข้อมูล')">ลบ</a>
                            </td>
                        </tr>
<?php endforeach; ?>
                </tbody>
            </TABLE>


        </div>
    </div>
</div>
