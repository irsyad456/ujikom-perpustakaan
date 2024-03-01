<?php

use app\models\UlasanBuku;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\UlasanBukuSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Ulasan Buku';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ulasan-buku-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Ulasan Buku', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'id',
            [
                'value' => 'user.nama',
                'attribute' => 'user_id'
            ],
            [
                'value' => 'buku.judul',
                'attribute' => 'buku_id'
            ],
            'ulasan:ntext',
            'rating',
        ],
    ]); ?>


</div>