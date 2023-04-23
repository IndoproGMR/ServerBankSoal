<?php
$data['title'] = "Home Page";
?>
<?= view('template/header', $data); ?>

<?= view('template/navbar'); ?>









<div class="konten">


    <h1>Semua Soal</h1>

    <?php $num = 1 ?>
    <?php if (!empty($alldata) && is_array($alldata)) : ?>

        <?php foreach ($alldata as $alldata_item) : ?>

            <div class="card ">
                <div class="card-body">
                    <h5 class="card-title"><?= esc($alldata_item['Pertanyaan_Soal']) ?></h5>
                    <p class="card-text"><?= esc($alldata_item['Penjelasan_Soal']) ?></p>
                    <p class="card-text">Level Soal: <?= esc($alldata_item['lvlsoal']) ?></p>
                    <a href="<?= base_url('soal/detail/') . esc($alldata_item['idSoalSoal']) ?>" class="btn btn-primary">Detail
                    </a>
                </div>
            </div>
            <br>
        <?php endforeach ?>

    <?php else : ?>
        <h2>Tidak ada Data</h2>
    <?php endif ?>



</div>












<?= view('template/footer'); ?>