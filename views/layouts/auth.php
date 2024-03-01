<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\LoginAsset;
use yii\helpers\Html;

LoginAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">

<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>

<?php $this->beginBody() ?>

<body class="login">
    <div>
        <div class="login_wrapper">
            <div class="login_content">
                <div class="animate form login_form">
                    <section class="login_content">

                        <?= $content ?>
                    </section>
                </div>
            </div>
        </div>
    </div>
</body>

<?php $this->endBody(); ?>

</html>
<?php $this->endPage(); ?>