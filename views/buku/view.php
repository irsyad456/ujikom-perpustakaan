<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Buku $model */

$this->title = $model->judul;
$this->params['breadcrumbs'][] = ['label' => 'Books', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="buku-view">
    <div class="row">
        <div class="col-md-12 col-sm-12">

            <p>
                <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                <?= Html::a('Delete', ['delete', 'id' => $model->id], [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => 'Are you sure you want to delete this item?',
                        'method' => 'post',
                    ],
                ]) ?>
            </p>
            <div class="x_panel">
                <h2>ID: </h2><?= $model->id ?><br>
                <h2>Judul: </h2><?= $model->judul ?><br>
                <h2>Kategori: </h2><?= $data ?><br>
                <h2>Penulis: </h2><?= $model->penulis ?><br>
                <h2>Penerbit: </h2><?= $model->penerbit ?><br>
                <h2>Tahun Terbit: </h2><?= $model->tahunTerbit ?><br>
            </div>
        </div>
    </div>
</div>