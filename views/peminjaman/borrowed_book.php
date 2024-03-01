<?php

$this->title = 'Borrowed Book';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="col-md-12 col-sm-12">
    <div class="x_panel">
        <div class="x_content">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card-box table-responsive">
                        <?php if ($model) : ?>
                            <table id="datatable-fixed-header" class="table table-striped table-bordered" style="width:100%;">
                                <thead>
                                    <tr>
                                        <th>Buku</th>
                                        <th>Tanggal Peminjaman</th>
                                        <th>Tanggal Pengembalian</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($model as $borrowed) : ?>
                                        <tr>
                                            <td><?= $borrowed->buku->judul ?></td>
                                            <td><?= $borrowed->tanggal_peminjaman ?></td>
                                            <td><?= $borrowed->tanggal_pengembalian ?></td>
                                            <td><?= $borrowed->status_peminjaman ?></td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        <?php else : ?>
                            You Have Not Borrowed Any Book
                        <?php endif ?>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>