<?php

use app\models\Buku;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\BukuSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Books';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="buku-index">
    <div class="col-md-12 col-sm-12">
        <p>
            <?= Html::a('Add Book', ['create'], ['class' => 'btn btn-success']) ?>
        </p>
        <div class="x_panel">

            <?php // echo $this->render('_search', ['model' => $searchModel]); 
            ?>

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [

                    'id',
                    'judul',
                    'penulis',
                    'penerbit',
                    'tahunTerbit',
                    [
                        'class' => ActionColumn::class,
                        'urlCreator' => function ($action, Buku $model, $key, $index, $column) {
                            return Url::toRoute([$action, 'id' => $model->id]);
                        },
                        'contentOptions' => ['style' => 'width:80px'],
                        'header' => 'Actions'
                    ],
                ],
            ]); ?>
        </div>
    </div>
</div>