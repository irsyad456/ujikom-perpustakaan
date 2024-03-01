<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Buku $model */

$this->title = 'Add Book';
$this->params['breadcrumbs'][] = ['label' => 'Books', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="col-md-12 col-sm-12">
    <div class="x_panel">
        <div class="x_content">

            <?= $this->render('_form', [
                'model' => $model,
                'relasi' => $relasi
            ]) ?>

        </div>
    </div>
</div>