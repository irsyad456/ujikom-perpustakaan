<?php

/** @var yii\web\View $this */
/** @var app\models\KategoriBuku $model */

$this->title = 'Update category: ' . $model->namaKategori;
$this->params['breadcrumbs'][] = ['label' => 'Book category', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="kategori-buku-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>