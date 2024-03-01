<?php

use app\models\KoleksiPribadi;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\KoleksiPribadiSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Collections';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="col-md-12">
    <div class="x_panel">
        <div class="x_content" style="display: block;">
            <div class="row">
                <?php if ($model) : ?>
                    <?php foreach ($model as $collections) : ?>
                        <div class="col-md-55">
                            <div class="thumbnail">
                                <div class="image view view-first">
                                    <img src="default.jpg" style="width:100%; display:block;" alt="image">
                                    <div class="mask">
                                        <?= Html::a('<p>' . $collections->buku->penulis . '</p>', ['buku/book-details', 'id' => $collections->buku_id]) ?>
                                        <div class="tools tools-bottom">
                                            <?= Html::a(
                                                '<i class="fa fa-book"></i>',
                                                ['peminjaman/create', 'id' => $collections->buku_id],
                                                ['data-toggle' => 'tooltip', 'data-placement' => 'bottom', 'data-original-title' => 'Borrow Book']
                                            ) ?>
                                            <span data-toggle="tooltip" data-placement="bottom" data-original-title="Remove From Collection">
                                                <a type="button" data-toggle="modal" data-target=".remove-collection"><i class="fa fa-minus"></i></a>
                                            </span>
                                            <span data-toggle="tooltip" data-placement="bottom" data-original-title="Rate Book">
                                                <a type="button" data-toggle="modal" data-target=".rate-book"><i class="fa fa-pencil"></i></a>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="caption">
                                    <p><strong><?= $collections->buku->judul ?></strong></p>
                                    <p><?= $collections->buku->tahunTerbit ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade remove-collection" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-sm">
                                <div class="modal-content">

                                    <div class="modal-header">
                                        <h4 class="modal-title" id="myModalLabel">Warning</h4>
                                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="post" id="rating-form" action=<?= Yii::$app->urlManager->createUrl(['koleksi-pribadi/delete']) ?>>
                                            <input type="hidden" name="<?= Yii::$app->request->csrfParam ?>" value="<?= Yii::$app->request->csrfToken ?>">
                                            <?= Html::hiddenInput('id', $collections->id) ?>
                                            Remove <b><?= $collections->buku->judul ?></b> From Collections ?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-danger">Remove</button>
                                        </form>
                                    </div>

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
                                            <?= Html::hiddenInput('buku_id', $collections->buku_id) ?>
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
                <?php else : ?>
                    You Have No Collections
                <?php endif ?>
            </div>
        </div>
    </div>
</div>