<?php
/* @var $this yii\web\View */
?>
<h1>dashboard</h1>

<div class="row">
    <div class="col-xs-12 col-md-12 ">
        <div class="panel panel-info ">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="glyphicon glyphicon-book "></i> &nbsp;คำพิพากษา</h3>
            </div>
            <div class="panel-body">
                <?php foreach ($kps as $kp): ?>
                    <a href="http://<?= $_SERVER['HTTP_HOST'].'/scan_system/PDFServer/'.$kp->black_number; ?>/<?= $kp->file_name; ?>" target="_blank">
                        <i class="glyphicon glyphicon-bullhorn"></i>&nbsp;
                        <?php
                        if (!($kp->red_number == '-')) {
                            echo $kp->red_number;
                        } else {
                            echo $kp->file_name;
                        }
                        ?>
                    </a>
                    <br>
                    <div class="text-right">
                        <?php
                        $phpdate = strtotime($kp->create_at);
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
