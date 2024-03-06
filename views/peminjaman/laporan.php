<?php

use app\config\functions;

$this->title = 'Borrow report';
$this->params['breadcrumbs'][] = ['url' => ['index'], 'label' => 'Book borrowing'];
$this->params['breadcrumbs'][] = $this->title;
?>

<!--
    Style Used For Making Sure
    the print out doesn't
    include navbar, footer, and the button
-->
<style>
    @media print {
        .no-print {
            display: none !important;
        }

        .nav_menu {
            display: none !important;
        }

        .page-title {
            display: none !important;
        }

        footer {
            display: none !important;
        }
    }
</style>

<div class="col-md-12">
    <div class="x_panel">
        <div class="x_content">
            <section class="content invoice">
                <div class="row">
                    <div class="invoice-header">
                        <h1>
                            <i class="fa fa-book"></i> Borrow report
                            <small class="pull-right">Date: <?= date('Y/m/d') ?></small>
                        </h1>
                    </div>
                </div>
                <div class="row invoice-info">
                    <div class="col-sm-4 invoice-col">
                        <address>
                            <strong>Pertal</strong>
                            <br>Jl. Soekarno No.569
                            <br>Jakarta, CA 94107
                            <br>Phone: +62 89218027891
                            <br>Email: pertal@gmail.com
                        </address>
                    </div>
                    <div class="col-sm-4 invoice-col">
                        <address>
                            <strong><?= $data->user->nama ?></strong>
                            <br><?= $data->user->alamat ?>
                            <br>Email: <?= $data->user->email ?>
                        </address>
                    </div>
                    <div class="col-sm-4 invoice-col">
                        <b>Report #<?= random_int(100000, 999999) ?></b>
                        <br>
                        <b>Order ID:</b> <?= functions::generateRandomString(6) ?>
                        <br>
                        <b>Borrow date: <?= $data->tanggal_peminjaman ?></b>
                        <br>
                        <b>Return date: <?= $data->tanggal_pengembalian ?></b>
                    </div>
                </div>
                <div class="row">
                    <div class="table">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Book title</th>
                                    <th>Book category</th>
                                    <th>Writer</th>
                                    <th>Publisher</th>
                                    <th>Release date</th>
                                    <th>Borrow status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?= $data->buku->judul ?></td>
                                    <td><?= $data->buku->kategoriBukuRelasis->kategoribuku->namaKategori ?></td>
                                    <td><?= $data->buku->penulis ?></td>
                                    <td><?= $data->buku->penerbit ?></td>
                                    <td><?= $data->buku->tahunTerbit ?></td>
                                    <td><?= $data->status_peminjaman ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row no-print">
                    <div class="">
                        <button class="btn btn-primary" onclick="window.print();"><i class="fa fa-print"></i> Print</button>
                        <!-- <button class="btn btn-primary pull-right" style="margin-right: 5px;"><i class="fa fa-download"></i> Generate PDF</button> -->
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>