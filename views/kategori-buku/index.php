<?php

use app\models\KategoriBuku;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\KategoriBukuSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Kategori Buku';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kategori-buku-index">
    <div class="col-md-12 col-sm-12">

        <p>
            <?= Html::a('Create Kategori Buku', ['create'], ['class' => 'btn btn-success']) ?>
        </p>

        <?php // echo $this->render('_search', ['model' => $searchModel]); 
        ?>

        <div class="x_panel">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [

                    'id',
                    'namaKategori',
                    [
                        'class' => ActionColumn::class,
                        'urlCreator' => function ($action, KategoriBuku $model, $key, $index, $column) {
                            return Url::toRoute([$action, 'id' => $model->id]);
                        },
                        'header' => 'Actions'
                    ],
                ],
            ]); ?>
        </div>
    </div>
</div>