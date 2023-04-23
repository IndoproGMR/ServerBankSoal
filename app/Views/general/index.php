<?php
$data['title'] = "Home Page";
?>
<?= view('template/header', $data); ?>

<div class="row">

    <div class="col-sm-6">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Soal Yang Berada di Database <span class="badge bg-secondary"><?= $jumlahSoal ?></span></h5>
                <p class="card-text">Kumpulan Soal-Soal yang dibuat oleh Semua Pengguna</p>
                <?php if (logged_in()) : ?>
                    <a href="<?= base_url('soal/input') ?>/soal" class="btn btn-primary">Input Soal Sekarang</a>
                <?php else : ?>
                    <a href="<?= base_url('login') ?>" class="btn btn-primary">Login Sekarang</a>
                <?php endif ?>


            </div>
        </div>
    </div>


    <div class="col-sm-6">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">SoalSet Yang Berada di Database <span class="badge bg-secondary"><?= $jumlahSoalset ?></span></h5>
                <p class="card-text">Kumpulan Soal Set yang dibuat oleh Semua Pengguna</p>
                <?php if (logged_in()) : ?>
                    <a href="<?= base_url('soal/input') ?>/soalset" class="btn btn-primary">Input Soalset Sekarang</a>
                <?php else : ?>
                    <a href="<?= base_url('login') ?>" class="btn btn-primary">Login Sekarang</a>
                <?php endif ?>
            </div>
        </div>
    </div>



</div>
<br>



<?= view('template/footer'); ?>