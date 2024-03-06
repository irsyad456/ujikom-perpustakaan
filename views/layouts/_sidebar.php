<?php

use yii\helpers\Html;
use yii\helpers\Url;

?>
<div class="col-md-3 left_col menu_fixed">
    <div class="left_col scroll-view">

        <div class="navbar nav_title" style="border: 0;">
            <?= Html::a('<i class="fa fa-circle"></i> <span>Pertal</span>', ['site/index'], ['class' => 'site_title']) ?>
        </div>
        <div class="clearfix"></div>

        <div class="profile clearfix"><!--img_2 -->
            <div class="profile_pic">
                <img src=<?= Url::base(true) . '/profile.jpg' ?> class="img-circle profile_img">
            </div>

            <div class="profile_info">
                <span>Welcome,</span>
                <h2><?= Yii::$app->user->identity->username ?></h2>
            </div>
        </div>

        <br>
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

            <div class="menu_section">
                <ul class="nav side-menu">
                    <li><?= Html::a('<i class="fa fa-home"></i> Dashboard', ['site/index']) ?></li>
                    <?php if (Yii::$app->user->can('Peminjam')) : ?>
                        <li><?= Html::a('<i class="fa fa-book"></i> List Of Books', ['buku/book-list']) ?></li>
                        <li><?= Html::a('<i class="fa fa-book"></i> Borrowed Books', ['peminjaman/borrowed-book']) ?></li>
                        <li><?= Html::a('<i class="fa fa-book"></i> Collections', ['koleksi-pribadi/index']) ?></li>
                    <?php else : ?>
                        <li><a><i class="fa fa-user"></i> Admin <span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                <li><?= Html::a('Books', ['buku/index']) ?></li>
                                <li><?= Html::a('Book Category', ['kategori-buku/index']) ?></li>
                                <li><?= Html::a('Book borrowing', ['peminjaman/index']) ?></li>
                                <li><?= Html::a('User', ['user/index']) ?></li>
                                <?php if (Yii::$app->user->can('Administrator'))
                                    echo '<li>' . Html::a('Officer', ['user/petugas-index']) . '</li>'
                                ?>
                            </ul>
                        </li>
                    <?php endif ?>
                </ul>
            </div>

        </div>
        <!-- 
        <div class="sidebar-footer hidden-small">
            <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Logout">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
            </a>
        </div> -->
    </div>
</div>