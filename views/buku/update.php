<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Buku $model */

$this->title = 'Update Books: ' . $model->judul;
$this->params['breadcrumbs'][] = ['label' => 'Books', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->judul, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="col-md-12 col-sm-12">
    <div class="x_panel">
        <div class="x_content">

            <?= $this->render('_form', [
                'model' => $model,
                'relasi' => $relasi
            ]) ?>

        </div>
    </div>
</div>