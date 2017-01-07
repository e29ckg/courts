<?php
/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
        <script src="dist/sweetalert.min.js"></script>
        <link rel="stylesheet" type="text/css" href="dist/sweetalert.css">
    </head>
    <body>
        <?php $this->beginBody() ?>

        <div class="wrap">
            <?php
            NavBar::begin([
                'brandLabel' => 'My Company',
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar-inverse navbar-fixed-top',
                ],
            ]);
            $menuItems = [
                ['label' => 'Home', 'url' => ['/site/index']],
                [
                    'label' => 'APP',
                    'items' => [
                        ['label' => 'โปรแกรมหนังสือเวียน', 'url' => '?r=judgement/index1',
                            'items' => [
                                ['label' => 'เพิ่มหนังสือเวียน', 'url' => '?r=judgement/create'],
                                ['label' => 'ประเภทเอกสาร', 'url' => '?r=typedoc/index'],
                            ]
                        ],
//                        '<li class="divider"></li>',
//                        ['label' => 'Level 1 - Dropdown A', 'url' => '#'],
//                        '<li class="divider"></li>',
//                        '<li class="dropdown-header">Dropdown Header</li>',
//                        ['label' => 'Level 1 - Dropdown B', 'url' => '#'],
//                        ['label' => 'Level 1 - Dropdown B',
//                            'items' => [
//                                ['label' => 'Level 1 - Dropdown A', 'url' => '#'],
//                                ['label' => 'Level 1 - Dropdown A', 'url' => '#'],
//                                ['label' => 'Level 1 - Dropdown A', 'url' => '#'],
//                            ]
//                        ],                        
                    ],
                ],
                ['label' => 'จัดการสมาชิก', 'url' => ['/profile/index'],
                    'items' => [
                        ['label' => 'สมาชิก', 'url' => '?r=profile/index'],
                        ['label' => 'Level 1 - Dropdown A', 'url' => '#'],
                        ['label' => 'Level 1 - Dropdown A', 'url' => '#'],
                    ]
                ],
//                ['label' => 'judgement1', 'url' => ['/judgement/index1']],
//                ['label' => 'ประเภทเอกสาร', 'url' => ['/typedoc/index']],
            ];
            if (Yii::$app->user->isGuest) {
                $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
            } else {
                $menuItems[] = '<li>'
                        . Html::beginForm(['/site/logout'], 'post')
                        . Html::submitButton(
                                'Logout (' . Yii::$app->user->identity->username . ')', ['class' => 'btn btn-link logout']
                        )
                        . Html::endForm()
                        . '</li>';
            }
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => $menuItems,
            ]);
            NavBar::end();
            ?>

            <div class="container">

                <?=
                Breadcrumbs::widget([
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ])
                ?>


                <div class="list-group visible-lg col-lg-3">
                    <li href="#" class="list-group-item active text-center">   MENU     </li>
                    <a href="?r=judgement/index1" class="list-group-item">โปรแกรมหนังสือเวียน</a>
                    <a href="#" class="list-group-item">Morbi leo risus</a>
                    <a href="#" class="list-group-item">Porta ac consectetur ac</a>
                    <a href="#" class="list-group-item">Vestibulum at eros</a>
                </div>


                <?= Alert::widget() ?>
                <?= $content ?>
            </div>
        </div>

        <footer class="footer">
            <div class="container">
                <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

                <p class="pull-right"><?= Yii::powered() ?></p>
            </div>
        </footer>

        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>