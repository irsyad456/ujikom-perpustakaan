<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Peminjaman $model */

$this->title = 'Detail Peminjaman: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Peminjaman', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="peminjaman-view">
    <div class="col-md-12 col-sm-12">
        <div class="x_panel">
            <p>
                <?php if ($model->status_peminjaman == 'Dipinjam' || $model->status_peminjaman == 'Diperpanjang') : ?>
                    <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                <?php endif ?>
                <?= Html::a('Delete', ['delete', 'id' => $model->id], [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => 'Are you sure you want to delete this item?',
                        'method' => 'post',
                    ],
                ]) ?>
            </p>

            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'id',
                    [
                        'attribute' => 'user_id',
                        'value' => function ($model) {
                            return Html::a($model->user->username, ['user/view', 'id' => $model->user_id]);
                        },
                        'format' => 'raw',
                    ],
                    [
                        'attribute' => 'buku_id',
                        'value' => function ($model) {
                            return Html::a($model->buku->judul, ['buku/view', 'id' => $model->buku_id]);
                        },
                        'format' => 'raw',
                    ],
                    'tanggal_peminjaman',
                    'tanggal_pengembalian',
                    'status_peminjaman',
                ],
            ]) ?>


        </div>
    </div>
</div>