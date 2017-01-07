<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';

?>
<?php
/* @var $this yii\web\View */

?>
<h1>dashboard</h1>

<div class="row">
    <div class="col-xs-12 col-md-12 ">
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

</div>
