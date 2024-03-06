<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\KategoriBuku $model */

$this->title = 'Create new category';
$this->params['breadcrumbs'][] = ['label' => 'Book category', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kategori-buku-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>