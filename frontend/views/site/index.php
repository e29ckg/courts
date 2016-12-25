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
                <?php foreach ($judAs as $judA): ?>
                    <a href="http://<?= $_SERVER['HTTP_HOST'].'/scan_system/PDFServer/'.$judA->black_number; ?>/<?= $judA->file_name; ?>" target="_blank">
                        <i class="glyphicon glyphicon-bullhorn"></i>&nbsp;
                        <?php
                        if (!($judA->red_number == '-')) {
                            echo $judA->red_number;
                        } else {
                            echo $judA->file_name;
                        }
                        ?>
                    </a>
                    <br>
                    <div class="text-right">
                        <?php
                        $phpdate = strtotime($judA->create_at);
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
        <div class="panel panel-warning">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="glyphicon glyphicon-book "></i> &nbsp;หนังสือเวียนทราบ (ภายใน)</h3>
            </div>
            <div class="panel-body">
                <?php foreach ($judBs as $judB): ?>
                    <a href="http://<?= $_SERVER['HTTP_HOST'].'/scan_system/PDFServer/'.$judB->black_number; ?>/<?= $judB->file_name; ?>" target="_blank">
                      <i class="glyphicon glyphicon-bullhorn"></i>&nbsp;
                        <?php
                        if (!($judB->red_number == '-')) {
                            echo $judB->red_number;
                        } else {
                            echo $judB->file_name;
                        }
                        ?>
                    </a>
                    <div class="text-right">
                        <?php
                        $phpdate = strtotime($judB->create_at);
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
                <h3 class="panel-title"><i class="glyphicon glyphicon-book "></i> &nbsp;เอกสาร</h3>
            </div>
            <div class="panel-body">
                <?php foreach ($bbss as $bbs): ?>
                    <a href="http://<?= $_SERVER['HTTP_HOST'].'/scan_system/PDFServer/'. $bbs->black_number; ?>/<?= $bbs->file_name; ?>" target="_blank">
                      <i class="glyphicon glyphicon-bullhorn"></i>&nbsp;
                        <?php
                        if (!($bbs->red_number == '-')) {
                            echo $bbs->red_number;
                        } else {
                            echo $bbs->file_name;
                        }
                        ?>
                    </a>
                    <div class="text-right">
                        <?php
                        $phpdate = strtotime($bbs->create_at);
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
                <h3 class="panel-title"><i class="glyphicon glyphicon-book "></i> &nbsp;คำสั่ง ศยจ.ประจวบฯ</h3>
            </div>
            <div class="panel-body">
                <?php foreach ($kpss as $kps): ?>
                    <a href="http://<?= $_SERVER['HTTP_HOST'].'/scan_system/PDFServer/'.$kps->black_number; ?>/<?= $kps->file_name; ?>" target="_blank">
                      <i class="glyphicon glyphicon-bullhorn"></i>&nbsp;
                        <?php
                        if (!($kps->red_number == '-')) {
                            echo $kps->red_number;
                        } else {
                            echo $kps->file_name;
                        }
                        ?>
                    </a>
                    <div class="text-right">
                        <?php
                        $phpdate = strtotime($kps->create_at);
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
                <h3 class="panel-title"><i class="glyphicon glyphicon-book "></i> &nbsp;คำสั่ง สำนักงาน</h3>
            </div>
            <div class="panel-body">
                <?php foreach ($ksos as $kso): ?>
                    <a href="http://<?= $_SERVER['HTTP_HOST'].'/scan_system/PDFServer/'.$kso->black_number; ?>/<?= $kso->file_name; ?>" target="_blank">
                      <i class="glyphicon glyphicon-bullhorn"></i>&nbsp;
                        <?php
                        if (!($kso->red_number == '-')) {
                            echo $kso->red_number;
                        } else {
                            echo $kso->file_name;
                        }
                        ?>
                    </a>
                    <div class="text-right">
                        <?php
                        $phpdate = strtotime($kso->create_at);
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
                <h3 class="panel-title"><i class="glyphicon glyphicon-calendar"></i> &nbsp;ตารางเวร</h3>
            </div>
            <div class="panel-body">
                <?php foreach ($tvbs as $tvb): ?>
                    <a href="http://<?= $_SERVER['HTTP_HOST'].'/scan_system/PDFServer/'.$tvb->black_number; ?>/<?= $tvb->file_name; ?>" target="_blank">
                      <i class="glyphicon glyphicon-calendar"></i>&nbsp;
                        <?php
                        if (!($tvb->red_number == '-')) {
                            echo $tvb->red_number;
                        } else {
                            echo $tvb->file_name;
                        }
                        ?>
                    </a>
                    <div class="text-right">
                        <?php
                        $phpdate = strtotime($tvb->create_at);
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
