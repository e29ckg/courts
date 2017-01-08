<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
use yii\widgets\LinkPager;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ProfileSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'สมาชิก';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="profile-index">

    <h1><?= Html::encode($this->title) ?></h1>

</div>
<div class="col-xs-12 col-md-9 ">
    <div class="panel panel-info ">

        <div class="panel-body">
            <div class="content">
                <p class="pull-left"><a class="btn btn-danger" href="?r=profile/create"><i class="glyphicon glyphicon-plus"></i> เพิ่ม <?= $this->title; ?></a></p>
                <p class="pull-right">

                    <?php
                    $form = ActiveForm::begin([
                                'action' => ['index'],
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
                <th class="text-center" style="width: 100px">user_id</th>
                <th class="text-center">ชื่อ-สกุล</th>
                <th class="text-center"> Login Username</th>
                <th class="text-center" style="width: 180px">เครื่องมือ</th>
                </thead>
                <tbody>
                    <?php foreach ($models as $profile): ?>
                        <tr>
                            <td class="text-center" ><?= $profile->id ?></td>
                            <td class="text-center" ><?= $profile->user_id ?></td>
                            <td  ><a href="?r=profile/view&id=<?= $profile->id ?>"><?= $profile->fullname ?></a><?php
                                if ($profile->user['status'] == 13) {
                                    echo ' <span class="label label-danger">ระงับ</span>';
                                }
                                ?>  </td>
                            <td class="text-center" ><a href="?r=profile/view&id=<?= $profile->id ?>"><?= $profile->user['username']; ?></a></td>
                            <td>                                
                                <a class="btn btn-primary btn-xs" href="?r=profile/update&id=<?= $profile->id ?>" >แก้ไข</a>
                                <?php if ($profile->user['status'] == 13) { ?>
                                    <a class="btn btn-warning btn-xs" href="?r=profile/enableuser&id=<?= $profile->id ?>" >สั่งเปิดการใช้</a>
                                    <a class="btn btn-danger btn-xs" href="?r=profile/delete&id=<?= $profile->id ?>" onclick="return confirm('คุณแน่ใจที่จะลบข้อมูล')">ลบ</a>
                                <?php } else { ?>
                                    <a class="btn btn-info btn-xs" href="?r=profile/suspend&id=<?= $profile->id ?>" >สั่งระงับ</a>
                        <?php } ?>
                            </td>
                        </tr>
<?php endforeach; ?>
                </tbody>
            </TABLE>
            <div class="pull-right">
<?= LinkPager::widget(['pagination' => $pagination]); ?>
            </div>

        </div>
    </div>

</div>
