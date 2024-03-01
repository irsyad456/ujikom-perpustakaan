<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\LinkPager;

$this->title = 'Book Details';
$this->params['breadcrumbs'][] = ['label' => 'Book List', 'url' => ['buku/book-list']];
$this->params['breadcrumbs'][] = $book->judul

?>

<div class="col-md-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>Book Details</h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <div class="col-md-9 col-sm-9  ">
                <div>
                    <h4>Recent Ratings</h4>

                    <ul class="messages">
                        <?php if ($book_rating) : ?>
                            <?php foreach ($book_rating as $user_rating) : ?>
                                <li>
                                    <img src="profile.jpg" class="avatar" alt="Avatar">
                                    <div class="message_date">
                                        <h3 class="date text-info"><?= Yii::$app->formatter->asRelativeTime($user_rating->created_at) ?></h3>
                                    </div>
                                    <div class="message_wrapper">
                                        <h4 class="heading"><?= $user_rating->user->username ?></h4>
                                        <blockquote class="message"><?= $user_rating->ulasan ?></blockquote>
                                        <br>
                                        <p class="url">
                                            <?php
                                            $ratings = $user_rating->rating; // Assuming $user_rating->rating is the user's rating (e.g., 1, 2, 3, 4, 5)

                                            if ($ratings !== null) {
                                                $fullStars = floor($ratings);

                                                // Output full stars
                                                for ($i = 0; $i < $fullStars; $i++) {
                                                    echo '<i class="fa fa-star"></i>';
                                                }

                                                // Output half star if applicable
                                                $halfStar = $ratings - $fullStars;
                                                if ($halfStar > 0) {
                                                    echo '<i class="fa fa-star-half"></i>';
                                                }

                                                // Output empty stars
                                                for ($i = ceil($ratings); $i < 5; $i++) {
                                                    echo '<i class="fa fa-star-o"></i>';
                                                }
                                            } else {
                                                // Handle the case when $ratings is null
                                                echo 'Rating not available';
                                            }
                                            ?>

                                        </p>
                                    </div>
                                </li>
                            <?php endforeach ?>
                        <?php else : ?>
                            <li>No Rating</li>
                        <?php endif ?>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="dataTables_paginate paging_simple_numbers" id="example_paginate">
                                    <?= LinkPager::widget([
                                        'pagination' => $pagination,
                                        'options' => ['class' => 'pagination'],
                                        'prevPageLabel' => '&laquo;',
                                        'nextPageLabel' => '&raquo;',
                                        'maxButtonCount' => 5, // Adjust as needed
                                    ]) ?>
                                </div>
                            </div>
                        </div>
                    </ul>

                </div>
            </div>

            <div class="col-md-3 col-sm-3  ">
                <section class="panel">
                    <div class="panel-body">
                        <h3 class="green"><?= $book->judul ?></h3>
                        <br>
                        <div class="project_detail">
                            <p class="title">Writer</p>
                            <p><?= $book->penulis ?></p>
                            <p class="title">Publisher</p>
                            <p><?= $book->penerbit ?></p>
                            <p class="title">Published At</p>
                            <p><?= $book->tahunTerbit ?></p>
                        </div>
                        <br>
                        <br>
                        <div class="text-center mtop20">
                            <?= Html::a('<i class="fa fa-plus"></i> Add To Collection', ['koleksi-pribadi/create', 'id' => $book->id], ['class' => 'btn btn-sm btn-primary']) ?>
                            <?= Html::a('<i class="fa fa-book"></i> Borrow', ['peminjaman/create', 'id' => $book->id], ['class' => 'btn btn-sm btn-warning']) ?>
                            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target=".rate-book"><i class="fa fa-pencil"></i> Rate Book</button>
                            <div class="modal fade rate-book" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-sm">
                                    <div class="modal-content">

                                        <div class="modal-header">
                                            <h4 class="modal-title" id="myModalLabel">Rate Book</h4>
                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <?php $form = ActiveForm::begin(['id' => 'rating-form']) ?>

                                            <?= $form->field($rating, 'ulasan')->textarea() ?>
                                            <?= $form->field($rating, 'rating')->textInput() ?>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'submit-button']) ?>
                                            <?php $form->end() ?>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

        </div>
    </div>
</div>

<?php

$this->registerJs('
$("#submit-button").on("click", function() {
    var $btn = $(this);

    // Check if the button is already disabled
    if ($btn.prop("disabled")) {
        // If disabled, do not allow another click
        return false;
    }

    // Disable the button to prevent double-click
    $btn.prop("disabled", true);

    // Optionally, set a timeout to re-enable the button after a certain period
    setTimeout(function() {
        $btn.prop("disabled", false);
    }, 5000); // 5000 milliseconds (adjust as needed)

    // Continue with form submission or other actions
    return true;
});
', \yii\web\View::POS_READY) ?>