<?php

use App\Models\Bsbahasa;
use App\Models\Bsmapel;
use App\Models\Bssoalset;
use App\Models\Bsusers;

$data['title'] = "Home Page";
$modeluser = model(Bsusers::class);
$modelmapel = model(Bsmapel::class);
$modelbahasa = model(Bsbahasa::class);
$modelsoalset = model(Bssoalset::class);



// d($modelmapel->seemapelbyid($alldata[0]['Mapel_id'])[0]['NamaMapel'])
?>
<?= view('template/header', $data); ?>

<?= view('template/navbar'); ?>






<div class="konten">


    <h1>Detail Soal</h1>

    <h4>pertanyaan</h4>
    <div class="mb-3 row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Pertanyaan:</label>
        <div class="col-sm-10">
            <textarea readonly class="form-control" cols="3" rows="4"><?= esc($alldata[0]['Pertanyaan_Soal']) ?></textarea>
        </div>
    </div>


    <div class="mb-3 row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Pertanyaan:</label>
        <div class="col-sm-10">
            <textarea readonly class="form-control" cols="3" rows="4"><?= esc($alldata[0]['Penjelasan_Soal']) ?></textarea>
        </div>
    </div>

    <?php if (has_permission('R_JawabanOrang') || $alldata[0]['user_id'] == user_id()) : ?>

        <h4>Jawaban</h4>
        <div class="mb-3 row">
            <label for="staticEmail" class="col-sm-2 col-form-label">Jawaban_Benar:</label>
            <div class="col-sm-10">
                <textarea readonly class="form-control" cols="3" rows="4"><?= esc($alldata[0]['Jawaban_Benar']) ?></textarea>

            </div>
        </div>


        <div class="mb-3 row">
            <label for="staticEmail" class="col-sm-2 col-form-label">Jawaban_salah1:</label>
            <div class="col-sm-10">
                <textarea readonly class="form-control" cols="3" rows="4"><?= esc($alldata[0]['Jawaban_salah1']) ?></textarea>
            </div>
        </div>



        <div class="mb-3 row">
            <label for="staticEmail" class="col-sm-2 col-form-label">Jawaban_salah2:</label>
            <div class="col-sm-10">
                <textarea readonly class="form-control" cols="3" rows="4"><?= esc($alldata[0]['Jawaban_salah2']) ?></textarea>
            </div>
        </div>


        <div class="mb-3 row">
            <label for="staticEmail" class="col-sm-2 col-form-label">Jawaban_salah3:</label>
            <div class="col-sm-10">
                <textarea readonly class="form-control" cols="3" rows="4"><?= esc($alldata[0]['Jawaban_salah3']) ?></textarea>
            </div>
        </div>

    <?php endif ?>


    <h4>Detail</h4>
    <div class="mb-3 row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Level Soal:</label>
        <div class="col-sm-10">
            <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= esc($alldata[0]['lvlsoal']) ?>">
        </div>
    </div>


    <div class="mb-3 row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Di buat Oleh:</label>
        <div class="col-sm-10">
            <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= $modeluser->seename($alldata[0]['user_id']) ?>">
        </div>
    </div>



    <div class="mb-3 row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Mata Pelajaran:</label>
        <div class="col-sm-10">
            <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{<?= $modelmapel->seemapelbyid($alldata[0]['Mapel_id'])[0]['NamaMapel'] ?>} - <?= $modelmapel->seemapelbyid($alldata[0]['Mapel_id'])[0]['description'] ?>">
        </div>
    </div>


    <div class="mb-3 row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Bahasa Soal:</label>
        <div class="col-sm-10">
            <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{<?= $modelbahasa->seebahasabyid($alldata[0]['Bahasa_id'])[0]['NamaBahasa']  ?>} - <?= $modelbahasa->seebahasabyid($alldata[0]['Bahasa_id'])[0]['description']  ?>">
        </div>
    </div>


    <div class="mb-3 row">
        <label for="staticEmail" class="col-sm-2 col-form-label">SoalSet_id:</label>
        <div class="col-sm-10">
            <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{<?= $modelsoalset->seesoalsetbydi($alldata[0]['SoalSet_id'])[0]['codeSoalSet'] ?>} - <?= $modelsoalset->seesoalsetbydi($alldata[0]['SoalSet_id'])[0]['description'] ?>">
        </div>
    </div>


    <div class="mb-3 row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Waktu Pembuatan:</label>
        <div class="col-sm-10">
            <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= date('D, d M Y  s:i:G', $alldata[0]['TimeStamp']) ?>">
        </div>
    </div>





    <?php if (!$alldata[0]['valid'] == 1) : ?>
        <h4 style="color:red ;">Soal Belum Di Validated</h4>

    <?php elseif ($alldata[0]['valid'] == 1) : ?>
        <h4 style="color:green ;">Soal Sudah Di Validated</h4>

    <?php endif ?>

    <?php if (has_permission('Validasi_Soal') && !$alldata[0]['valid'] == 1) : ?>
        <form action="<?= base_url('soal/validated') ?>" method="post">
            <?= csrf_field() ?>
            <input hidden type="text" name="idSoalSoal" id="idSoalSoal" value="<?= esc($alldata[0]['idSoalSoal']) ?>">
            <input type="submit" value="Validated">

        </form>
    <?php endif ?>




    <br>
    <br>






</div>












<?= view('template/footer'); ?>