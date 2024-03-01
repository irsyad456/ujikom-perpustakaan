<?php

use app\models\User;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\PetugasSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Petugas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="petugas-index">
    <div class="col-md-12 col-sm-12">

        <?php // echo $this->render('_search', ['model' => $searchModel]); 
        ?>

        <p>
            <?= Html::a('Create Petugas', ['create'], ['class' => 'btn btn-success']) ?>
        </p>

        <div class="x_panel">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [

                    'id',
                    'nama',
                    'email:email',
                    'username',
                    'alamat:ntext',
                    [
                        'class' => ActionColumn::class,
                        'urlCreator' => function ($action, User $model, $key, $index, $column) {
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