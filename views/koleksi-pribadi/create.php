<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\KoleksiPribadi $model */

$this->title = 'Create Koleksi Pribadi';
$this->params['breadcrumbs'][] = ['label' => 'Koleksi Pribadis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="koleksi-pribadi-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
