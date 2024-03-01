<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\UlasanBuku $model */

$this->title = 'Create Ulasan Buku';
$this->params['breadcrumbs'][] = ['label' => 'Ulasan Buku', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ulasan-buku-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>