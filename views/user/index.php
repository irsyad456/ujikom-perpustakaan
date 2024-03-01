<?php

use app\models\User;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\UserSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">
    <div class="col-md-12 col-sm-12">

        <?php // echo $this->render('_search', ['model' => $searchModel]); 
        ?>

        <?php if (Yii::$app->user->can('Administrator')) : ?>
            <p>
                <?= Html::a('Create User', ['create'], ['class' => 'btn btn-success']) ?>
            </p>
        <?php endif ?>

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