<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Book List';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="col-md-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>List of book</h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content" style="display: block;">
            <div class="row">
                <?php foreach ($books as $book) : ?>
                    <div class="col-md-55">
                        <div class="thumbnail">
                            <div class="image view view-first">
                                <img style="width: 100%; display: block;" src="default.jpg" alt="image">
                                <div class="mask">
                                    <?= Html::a('<p>' . $book->penulis . '</p>', ['buku/book-details', 'id' => $book->id]) ?>
                                    <div class="tools tools-bottom">
                                        <?= Html::a(
                                            '<i class="fa fa-book"></i>',
                                            ['peminjaman/create', 'id' => $book->id],
                                            ['data-toggle' => 'tooltip', 'data-placement' => 'bottom', 'data-original-title' => 'Borrow Book']
                                        ) ?>
                                        <?= Html::a(
                                            '<i class="fa fa-plus"></i>',
                                            ['koleksi-pribadi/create', 'id' => $book->id],
                                            ['data-toggle' => 'tooltip', 'data-placement' => 'bottom', 'data-original-title' => 'Add To Collection']
                                        ) ?>
                                        <span data-toggle="tooltip" data-placement="bottom" data-original-title="Rate Book">
                                            <a type="button" data-toggle="modal" data-target=".rate-book"><i class="fa fa-pencil"></i></a>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="caption">
                                <p><strong><?= $book->judul ?></strong></p>
                                <p><?= $book->tahunTerbit ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade rate-book" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-sm">
                            <div class="modal-content">

                                <div class="modal-header">
                                    <h4 class="modal-title" id="myModalLabel">Rate Book</h4>
                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form method="post" id="rating-form" action=<?= Yii::$app->urlManager->createUrl(['ulasan-buku/create']) ?>>
                                        <input type="hidden" name="<?= Yii::$app->request->csrfParam ?>" value="<?= Yii::$app->request->csrfToken ?>">
                                        <div class="form-group">
                                            <label class="control-label">Ulasan</label>
                                            <input class="form-control" type="area" name="ulasan">
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Rating</label>
                                            <input class="form-control" type="number" name="rating" min="1" max="5">
                                        </div>
                                        <?= Html::hiddenInput('buku_id', $book->id) ?>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    </div>
</div>