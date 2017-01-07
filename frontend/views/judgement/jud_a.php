<?php

use yii\bootstrap\ActiveForm;
use yii\widgets\LinkPager;

$this->title = $title['head'];
?>

<h3><?= $title['head']; ?></h3>

<div class="row">
    <div class="col-xs-12 col-md-12 ">
        
        <div class="panel panel-info ">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="glyphicon glyphicon-book "></i> &nbsp;<?= $title['head']; ?></h3>

            </div>
            <div class="panel-body">

                <?php foreach ($models as $model): ?>
                    <a href="?r=judgement/view_download&black_number=<?= $model->black_number; ?>&file_name=<?= $model->file_name; ?>" target="_blank">                       
                        <i class="glyphicon glyphicon-bullhorn"></i>&nbsp;
                        <?php
                        if (!($model->red_number == '-')) {
                            echo $model->red_number;
                        } else {
                            echo $model->file_name;
                        }
                        ?>
                    </a>
                    <?php
                    $phpdate = strtotime($model->create_at);
                    echo "<i class=\"glyphicon glyphicon-time\"></i>&nbsp;" . date("d/m/Y", $phpdate);
                    ?>


                    <hr>
                <?php endforeach; ?>
                <div class="btn pull-right">
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
</div>