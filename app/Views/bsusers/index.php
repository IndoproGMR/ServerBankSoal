<?php
$data['title'] = "Home Page";
?>
<?= view('template/header', $data); ?>

<?= view('template/navbar'); ?>









<div class="konten">




    <div class="row">

        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Soal Yang Berada di Database <span class="badge bg-secondary"><?= $jumlahSoal ?></span></h5>
                    <p class="card-text">Kumpulan Soal-Soal yang dibuat oleh Semua Pengguna</p>
                    <a href="<?= base_url('soal/input') ?>/soal" class="btn btn-primary">Input Soal Sekarang</a>
                    <a href="<?= base_url('soal/show') ?>" class="btn btn-primary">Semua Soal-Soal</a>
                </div>
            </div>
        </div>


        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Soal Yang Telah Dibuat <span class="badge bg-secondary"><?= $jumlahSoaluser ?></span></h5>
                    <p class="card-text">Kumpulan Soal-Soal yang dibuat oleh <?= $namauser ?> </p>
                    <a href="<?= base_url('soal/input') ?>/soal" class="btn btn-primary">Input Soal Sekarang</a>
                    <a href="<?= base_url('soal/show') ?>/user" class="btn btn-primary">Semua Soal yang di buat</a>
                </div>
            </div>
        </div>



    </div>
    <br>
    <div class="row">

        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">SoalSet Yang Berada di Database <span class="badge bg-secondary"><?= $jumlahSoalset ?></span></h5>
                    <p class="card-text">Kumpulan Soal Set yang dibuat oleh Semua Pengguna</p>
                    <a href="<?= base_url('soal/input') ?>/soalset" class="btn btn-primary">Input Soalset Sekarang</a>
                </div>
            </div>
        </div>


        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">SoalSet Yang Telah Dibuat <span class="badge bg-secondary"><?= $jumlahSoalsetuser ?></span></h5>
                    <p class="card-text">Kumpulan Soal Set yang dibuat oleh <?= $namauser ?> </p>
                    <a href="<?= base_url('soal/input') ?>/soalset" class="btn btn-primary">Input Soalset Sekarang</a>
                </div>
            </div>
        </div>



    </div>



</div>












<?= view('template/footer'); ?>