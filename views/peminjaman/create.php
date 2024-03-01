<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Peminjaman $model */

$this->title = 'Borrow Book';
$this->params['breadcrumbs'][] = ['label' => 'Book List', 'url' => ['buku/book-list']];
$this->params['breadcrumbs'][] = ['label' => $book->judul, 'url' => ['buku/book-details', 'id' => $book->id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="peminjaman-create">
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_content">
                <br>
                <?= $this->render('_form', [
                    'model' => $model,
                ]) ?>
            </div>
        </div>
    </div>


</div>