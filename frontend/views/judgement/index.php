<?php
/* @var $this yii\web\View */
?>
<h1>dashboard</h1>

<div class="row">
    <div class="col-xs-12 col-md-6 ">
        <div class="panel panel-info ">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="glyphicon glyphicon-book "></i> &nbsp;คำพิพากษา</h3>
            </div>
            <div class="panel-body">
                <?php foreach ($kps as $kp): ?>
                    <a href="?r=judgement/view_download&black_number=<?= $kp->black_number; ?>&file_name=<?= $kp->file_name; ?>" target="_blank">
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
                    <a href="?r=judgement/jud_a" target="_blank">
                        <i class="glyphicon glyphicon-list"></i>
                        ดูทั้งหมด
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xs-12 col-md-6 ">
        <div class="panel panel-info ">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="glyphicon glyphicon-book "></i> &nbsp;คำสั่ง</h3>
            </div>
            <div class="panel-body">
                <?php foreach ($kss as $ks): ?>
                    <a href="?r=judgement/view_download&black_number=<?= $ks->black_number; ?>&file_name=<?= $ks->file_name; ?>" target="_blank">
                        <i class="glyphicon glyphicon-bullhorn"></i>&nbsp;
                        <?php
                        if (!($ks->red_number == '-')) {
                            echo $ks->red_number;
                        } else {
                            echo $ks->file_name;
                        }
                        ?>
                    </a>
                    <br>
                    <div class="text-right">
                        <?php
                        $phpdate = strtotime($ks->create_at);
                        echo "<i class=\"glyphicon glyphicon-time\"></i>&nbsp;" . date("d/m/Y", $phpdate);
                        ?>
                    </div>
                    <hr>
                <?php endforeach; ?>
                <div class="btn pull-right">
                    <a href="r=judgement/judA" target="_blank">
                        <i class="glyphicon glyphicon-list"></i>
                        ดูทั้งหมด
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
