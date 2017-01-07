<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ProfileSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Profiles';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="profile-index">

    <h1><?= Html::encode($this->title) ?></h1>

</div>
<div class="col-xs-12 col-md-9 ">
    <div class="panel panel-info ">

        <div class="panel-body">
            <div class="content">
                <p class="pull-left"><a class="btn btn-danger" href="?r=judgement/create"><i class="glyphicon glyphicon-plus"></i> เพิ่ม</a></p>
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
                <th class="text-center" style="width: 100px">profile_id</th>
                <th class="text-center" style="width: 150px">user_id</th>
                <th class="text-center">username</th>
                <th class="text-center" style="width: 150px">fullname</th>
                </thead>
                <tbody>
                    <?php foreach ($models as $profile): ?>
                        <tr>
                            <td class="text-center" ><?= $profile->id ?></td>
                            <td class="text-center" ><?= $profile->user_id ?></td>
                            <td><?= $profile->fullname ?>  </td>
                            <td>
                                <a class="btn btn-primary btn-xs" href="?r=judgement/line_alert&" >Line</a>
                                <a class="btn btn-info btn-xs" href="?r=profile/update&id=<?= $profile->id ?>" >แก้ไข</a>
                                <a class="btn btn-danger btn-xs" href="?r=profile/delete&black_number=" onclick="return confirm('คุณแน่ใจที่จะลบข้อมูล')">ลบ</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </TABLE>
            <div class="pull-right">
            </div>

        </div>
    </div>
</div>