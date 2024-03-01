<?php

/** @var yii\web\View $this */

use yii\helpers\Html;
use dosamigos\chartjs\ChartJs;

$this->title = 'Pertal';
?>
<div class="col-md-12 col-sm-12">

    <?php if (Yii::$app->user->can('Administrator') || Yii::$app->user->can('Petugas')) : ?>
        <div class="top_tiles">
            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 ">
                <div class="tile-stats">
                    <div class="icon"><i class="fa fa-book"></i></div>
                    <div class="count"><?= $books ?></div>
                    <h3>Total Books</h3>
                </div>
            </div>
            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 ">
                <div class="tile-stats">
                    <div class="icon"><i class="fa fa-book"></i></div>
                    <div class="count"><?= $borrow ?></div>
                    <h3>Books Borrowed</h3>
                </div>
            </div>
            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 ">
                <div class="tile-stats">
                    <div class="icon"><i class="fa fa-users"></i></div>
                    <div class="count"><?= $users ?></div>
                    <h3>Total Users</h3>
                </div>
            </div>
            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 ">
                <div class="tile-stats">
                    <h3>The Most Borrowed Book</h3>
                    <h3><b><?= $mostBorrow ?></b></h3>
                </div>
            </div>
        </div>
    <?php else : ?>
        <div class="jumbotron text-center bg-transparent mt-5 mb-5">
            <h1 class="display-4">Welcome!</h1>

            <p class="lead">This Is The Web For Borrow The Books Online</p>

        </div>

        <div class="body-content">

            <p class="lead text-center">
                Getting Started
            </p>

            <div class="row">
                <div class="col-lg-4 mb-3">
                    <h2>List Of Books</h2>

                    <p>Explore a diverse collection of books from various publishers and writers.
                        Browse through an extensive catalog to discover your next read.
                        Each book comes with detailed information about the author, and publisher.
                        You have the option to borrow a book for your reading pleasure and,
                        after reading, share your thoughts by providing a rating.
                    </p>

                    <p><?= Html::a('List Of Books &raquo;', ['buku/book-list'], ['class' => 'btn btn-outline-secondary']) ?></p>
                </div>
                <div class="col-lg-4 mb-3">
                    <h2>Borrowed Books</h2>

                    <p>Track your reading journey with the Borrowed Books feature.
                        It provides a comprehensive history of books you've borrowed
                        in the past and those you currently have on borrow. Easily manage
                        your borrowed books, check their due dates, and stay organized.
                        Whether you're a voracious reader or simply enjoy a good story,
                        this feature keeps you informed about your borrowing history.
                    </p>

                    <p><?= Html::a('Borrowed Books &raquo;', ['peminjaman/borrowed-book'], ['class' => 'btn btn-outline-secondary']) ?></p>
                </div>
                <div class="col-lg-4">
                    <h2>Collections</h2>

                    <p>Create your own personal library with the Collections feature.
                        Curate a list of your favorite books, making it easy to find
                        and borrow them again in the future. Whether it's a book you loved,
                        want to read again, or simply want to keep track of,
                        Collections allows you to organize and personalize your reading experience.
                        Assign multiple books to different collections and tailor your virtual bookshelf
                        to suit your preferences.
                    </p>

                    <p><?= Html::a('Collections &raquo;', ['koleksi-pribadi/index'], ['class' => 'btn btn-outline-secondary']) ?></p>
                </div>
            </div>

        </div>
    <?php endif ?>
</div>