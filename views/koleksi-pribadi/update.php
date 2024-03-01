<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\KoleksiPribadi $model */

$this->title = 'Update Koleksi Pribadi: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Koleksi Pribadis', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="koleksi-pribadi-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
