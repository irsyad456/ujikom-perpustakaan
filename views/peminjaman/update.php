<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Peminjaman $model */

$this->title = 'Update Book borrowing ';
$this->params['breadcrumbs'][] = ['label' => 'Book borrowing', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="peminjaman-update">
    <div class="col-md-12 col-sm-12">
        <div class="x_panel">
            <div class="x_title">
                <h2><b>Buku:</b> <?= $model->buku->judul ?>, <b>User:</b> <?= $model->user->username ?></h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br>
                <?= $this->render('_form', [
                    'model' => $model,
                ]) ?>
            </div>
        </div>
    </div>
</div>