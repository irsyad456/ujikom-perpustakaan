<?php

/** @var \yii\web\View $this */
/** @var string $content */

use app\assets\MainAsset;
use common\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;

MainAsset::register($this);
$errorMessage = Yii::$app->session->getFlash('error');
$successMessage = Yii::$app->session->getFlash('success');
$warningMessage = Yii::$app->session->getFlash('warning');

// Output flash messages as JavaScript variables
$this->registerJs(
    "
    var flashError = " . json_encode($errorMessage) . ";
    var flashSuccess = " . json_encode($successMessage) . ";
    var flashWarning = " . json_encode($warningMessage) . ";
    "
);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">

<head>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>

<?php $this->beginBody() ?>

<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <?= $this->render('_sidebar') ?>
            <?= $this->render('_topnav'); ?>
            <div class="right_col" role="main">
                <div class="">
                    <div class="page-title">
                        <div class="title_left">
                            <h3>
                                <?= $this->title ?>
                            </h3>
                        </div>

                        <div class="title_right">
                            <div class="pull-right top_search">
                                <?= Breadcrumbs::widget([
                                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                                ]) ?>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>

                    <div class="row">
                        <?= $content ?>
                    </div>
                </div>
            </div>

            <footer>
                <div class="pull-right">
                    <p>Copyright @2024 Pertal All Rights Reserved.</p>
                </div>
                <div class="clearfix"></div>
            </footer>
        </div>
    </div>
    <?php
    // Use JavaScript to display PNotify notifications based on flash messages
    $this->registerJs(
        "
    $(document).ready(function () {
        if (flashError) {
            showPNotifyNotification('Error', flashError, 'error');
        }
        if (flashSuccess) {
            showPNotifyNotification('Success', flashSuccess, 'success');
        }
        if (flashWarning) {
            showPNotifyNotification('Warning', flashWarning, 'warning');
        }
    });

    function showPNotifyNotification(title, text, type) {
        new PNotify({
            title: title,
            text: text,
            type: type,
            styling: 'bootstrap3',
            addClass: 'stack-bottomup',
            stack: { 'dir1': 'up', 'dir2': 'left', 'push': 'bottom' },
            delay: 3000
        });
    }
    ",
        \yii\web\View::POS_READY
    );
    ?>


</body>
<?php $this->endBody() ?>

</html>
<?php $this->endPage();
