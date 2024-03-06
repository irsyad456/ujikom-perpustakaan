<?php

use app\models\Peminjaman;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\PeminjamanSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Book borrowing';
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
                        'value' => function ($model) {
                            return Html::a($model->user->username, ['user/view', 'id' => $model->user_id]);
                        },
                        'format' => 'raw',
                        'attribute' => 'user_id'
                    ],
                    [
                        'value' => function ($model) {
                            return Html::a($model->buku->judul, ['buku/view', 'id' => $model->buku_id]);
                        },
                        'format' => 'raw',
                        'attribute' => 'buku_id'
                    ],
                    'tanggal_peminjaman',
                    'tanggal_pengembalian',
                    [
                        'value' => 'status_peminjaman',
                        'attribute' => 'status_peminjaman',
                        'filter' => array(
                            'Dipinjam' => 'Dipinjam', 'Diperpanjang' => 'Diperpanjang',
                            'Dikembalikan' => 'Dikembalikan', 'terlambat' => 'Terlambat',
                            'Hilang' => 'Hilang', 'Rusak' => 'Rusak'
                        ),
                        'contentOptions' => ['style' => 'width:170px']
                    ],
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
                    [
                        'header' => 'Generate',
                        'class' => ActionColumn::class,
                        'template' => '{generate}',
                        'buttons' => [
                            'generate' => function ($action, Peminjaman $model) {
                                return Html::a('Generate Report', ['generate-laporan', 'id' => $model->id], ['class' => 'btn btn-sm btn-info']);
                            }
                        ]
                    ]

                ],
            ]); ?>
        </div>
    </div>
</div>