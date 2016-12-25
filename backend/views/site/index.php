<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';

?>
<?php
/* @var $this yii\web\View */

?>
<h1>dashboard</h1>

<div class="row">
    <div class="col-xs-12 col-md-4 ">
        <div class="panel panel-info ">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="glyphicon glyphicon-book "></i> &nbsp;หนังสือเวียนทราบ</h3>
            </div>
            <div class="panel-body">
                <?php foreach ($juds as $jud): ?>
                    <a href="<?=$_SERVER["HTTP_HOST"]?>/scan_system/PDFServer/<?= $jud->black_number; ?>/<?= $jud->file_name; ?>" target="_blank">
                        <i class="glyphicon glyphicon-bullhorn"></i>&nbsp;
                        <?php
                        if (!($jud->red_number == '-')) {
                            echo $jud->red_number;
                        } else {
                            echo $jud->file_name;
                        }
                        ?>
                    </a>
                    <br>
                    <div class="text-right">
                        <?php
                        $phpdate = strtotime($jud->create_at);
                        echo "<i class=\"glyphicon glyphicon-time\"></i>&nbsp;" . date("d/m/Y", $phpdate);
                        ?>
                    </div>
                    <hr>
                <?php endforeach; ?>
                <div class="btn pull-right">
                    <a href="#" target="_blank">
                        <i class="glyphicon glyphicon-list"></i>
                        ดูทั้งหมด
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xs-12 col-md-4">
        <div class="panel panel-default ">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="glyphicon glyphicon-book "></i> &nbsp;หนังสือเวียนทราบ2</h3>
            </div>
            <div class="panel-body">
                <?php foreach ($vbooks as $vbook): ?>
                    <a href="http://127.0.0.1/courts/PDFServer/<?= $vbook->black_number; ?>/<?= $vbook->file_name; ?>" target="_blank">
                        <?php
                        if (!($vbook->red_number == '-')) {
                            echo $vbook->red_number;
                        } else {
                            echo $vbook->file_name;
                        }
                        ?>
                    </a>
                    <hr>
                <?php endforeach; ?>
                <div class="btn pull-right">
                    <a href="#" target="_blank">
                        <i class="glyphicon glyphicon-list"></i>
                        ดูทั้งหมด
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-md-4">
        <div class="panel panel-default ">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="glyphicon glyphicon-book "></i> &nbsp;คำสั่ง</h3>
            </div>
            <div class="panel-body">
                <?php foreach ($kss as $ks): ?>
                    <a href="http://10.37.64.1/scan_system/PDFServer/<?= $ks->black_number; ?>/<?= $ks->file_name; ?>" target="_blank">
                        <?php
                        if (!($ks->red_number == '-')) {
                            echo $ks->red_number;
                        } else {
                            echo $ks->file_name;
                        }
                        ?>
                    </a>
                    <hr>
                <?php endforeach; ?>
                <div class="btn pull-right">
                    <a href="#" target="_blank">
                        <i class="glyphicon glyphicon-list"></i>
                        ดูทั้งหมด
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xs-12 col-md-4">
        <div class="panel panel-default ">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="glyphicon glyphicon-book "></i> &nbsp;คำพิพากษา</h3>
            </div>
            <div class="panel-body">
                <?php foreach ($kps as $kp): ?>
                    <a href="http://<?=$_SERVER["HTTP_HOST"]?>/scan_system/PDFServer/<?= $kp->black_number; ?>/<?= $kp->file_name; ?> " target="_blank"> <?= $kp->black_number; ?>.<?= $kp->file_name; ?>.' '.<?= $kp->create_at; ?> </a>
                    <hr>
                <?php endforeach; ?>
                <div class="btn pull-right">
                    <a href="#" target="_blank">
                        <i class="glyphicon glyphicon-list"></i>
                        ดูทั้งหมด
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xs-12 col-md-4 ">
        <div class="panel panel-info ">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="glyphicon glyphicon-book "></i> &nbsp;เอกสาร</h3>
            </div>
            <div class="panel-body">
                <?php foreach ($vbooks as $vbook): ?>
                    <a href="http://<?=$_SERVER["HTTP_HOST"]?>/scan_system/PDFServer/<?= $vbook->black_number; ?>/<?= $vbook->file_name; ?>" target="_blank">
                        <i class="glyphicon glyphicon-bullhorn"></i>&nbsp;
                        <?php
                        if (!($vbook->red_number == '-')) {
                            echo $vbook->red_number;
                        } else {
                            echo $vbook->file_name;
                        }
                        ?>
                    </a>
                    <br>
                    <div class="text-right">
                        <?php
                        $phpdate = strtotime($vbook->create_at);
                        echo "<i class=\"glyphicon glyphicon-time\"></i>&nbsp;" . date("d/m/Y", $phpdate);
                        ?>
                    </div>
                    <hr>
                <?php endforeach; ?>
                <div class="btn pull-right">
                    <a href="#" target="_blank">
                        <i class="glyphicon glyphicon-list"></i>
                        ดูทั้งหมด
                    </a>
                </div>
            </div>
        </div>
    </div>


</div>
