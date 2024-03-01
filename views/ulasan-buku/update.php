<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\UlasanBuku $model */

$this->title = 'Update Ulasan Buku: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Ulasan Buku', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ulasan-buku-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>