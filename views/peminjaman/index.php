<?php

use app\models\Peminjaman;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\PeminjamanSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Peminjaman';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="peminjaman-index">
    <div class="col-md-12 col-sm-12">
        <div class="x_panel">

            <?php // echo $this->render('_search', ['model' => $searchModel]); 
            ?>

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [

                    'id',
                    [
                        'value' => 'user.username',
                        'attribute' => 'user_id'
                    ],
                    [
                        'value' => 'buku.judul',
                        'attribute' => 'buku_id'
                    ],
                    'tanggal_peminjaman',
                    'tanggal_pengembalian',
                    'status_peminjaman',
                    [
                        'class' => ActionColumn::class,
                        'urlCreator' => function ($action, Peminjaman $model, $key, $index, $column) {
                            return Url::toRoute([$action, 'id' => $model->id]);
                        },
                        'contentOptions' => ['style' => 'width:80px'],
                        'header' => 'Actions',
                        'visibleButtons' => [
                            'update' => function ($model) {
                                return in_array($model->status_peminjaman, ['Dipinjam', 'Diperpanjang']);
                            },
                        ],
                    ],

                ],
            ]); ?>
        </div>
    </div>
</div>