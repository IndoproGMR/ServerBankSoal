<?php

use App\Models\Bsbahasa;
use App\Models\Bsmapel;
use App\Models\Bssoalset;

$mapel = model(Bsmapel::class);
$bahasa = model(Bsbahasa::class);
$soalset = model(Bssoalset::class);

?>
<?= view('template/navbar'); ?>
<?= $this->extend('template/header'); ?>


<?= backbutton('home') ?>

<div class="konten">


    <h1><?= esc($title) ?></h1>



    <form action="<?= base_url() ?>soal/input/soal" method="post">
        <?= csrf_field() ?>

        <!-- //// ! Soal Start -->
        <div class="mb-3 row">
            <label for="Pertanyaan" class="col-sm-2 col-form-label">Soal Pertanyaan</label>

            <div class="col-sm-10 form-floating">
                <textarea style="height: 100px" class="form-control" name="Pertanyaan" id="Pertanyaan" placeholder="Soal Pertanyaan"></textarea>
                <label for=" Pertanyaan">Soal Pertanyaan</label>
                <?= isset($validation) ? display_error($validation, "Pertanyaan") : '' ?>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="Penjelasan" class="col-sm-2 col-form-label">Penjelasan Soal</label>
            <div class="col-sm-10 form-floating">
                <textarea style="height: 100px" class="form-control" name="Penjelasan" id="Penjelasan" placeholder="Soal Penjelasan"></textarea>
                <label for="Penjelasan">Soal Pertanyaan</label>

                <?= isset($validation) ? display_error($validation, "Penjelasan") : '' ?>

                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" onchange="setnone('Penjelasan')">
                    <label class="form-check-label" for="flexCheckDefault">
                        set ke None
                    </label>
                </div>
            </div>
        </div>
        <!-- //// ! Soal end -->

        <!-- //// ! Jawaban start -->
        <div class="mb-3 row">
            <label for="Benar" class="col-sm-2 col-form-label">jawaban Benar</label>
            <div class="col-sm-10">
                <input name="Benar" type="text" class="form-control" id="Benar" placeholder="jawaban Benar" maxlength="255" oninput="countPertanyaan('Benar')">
                <p>Total Characters: <span id="count_Benar">0</span>/255</p>
                <?= isset($validation) ? display_error($validation, "Benar") : '' ?>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="salah1" class="col-sm-2 col-form-label">jawaban salah 1</label>
            <div class="col-sm-10">
                <input name="salah1" type="text" class="form-control" id="salah1" placeholder="jawaban salah 1" maxlength="255" oninput="countPertanyaan('salah1')">
                <p>Total Characters: <span id="count_salah1">0</span>/255</p>
                <?= isset($validation) ? display_error($validation, "salah1") : '' ?>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="salah2" class="col-sm-2 col-form-label">jawaban salah 2</label>
            <div class="col-sm-10">
                <input name="salah2" type="text" class="form-control" id="salah2" placeholder="jawaban salah 2" maxlength="255" oninput="countPertanyaan('salah2')">
                <p>Total Characters: <span id="count_salah2">0</span>/255</p>
                <?= isset($validation) ? display_error($validation, "salah2") : '' ?>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="salah3" class="col-sm-2 col-form-label">jawaban salah 3</label>
            <div class="col-sm-10">
                <input name="salah3" type="text" class="form-control" id="salah3" placeholder="jawaban salah 3" maxlength="255" oninput="countPertanyaan('salah3')">
                <p>Total Characters: <span id="count_salah3">0</span>/255</p>
                <?= isset($validation) ? display_error($validation, "salah3") : '' ?>
            </div>
        </div>
        <!-- //// ! Jawaban end -->

        <!-- //// ! Detail Start -->
        <div class="mb-3 row">
            <label for="level" class="col-sm-2 col-form-label">level Soal</label>
            <div class="col-sm-10">
                <input name="level" type="number" class="form-control" id="level" placeholder="level Soal" value="1">
                <?= isset($validation) ? display_error($validation, "level") : '' ?>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="mapel" class="col-sm-2 col-form-label">Mata Pelajaran Soal</label>
            <select name="mapel" id="mapel" class="form-select form-select-lg mb-3" aria-label=".form-select-lg">
                <?php foreach ($mapel->seeall() as $item) : ?>
                    <option value="<?= esc($item['idMapel']) ?>">{<?= esc($item['codeMapel']) ?>} - <?= esc($item['description']) ?></option>
                <?php endforeach ?>
            </select>
        </div>

        <div class="mb-3 row">
            <label for="bahasa" class="col-sm-2 col-form-label">Bahasa Soal</label>
            <select name="bahasa" id="bahasa" class="form-select form-select-lg mb-3" aria-label=".form-select-lg">
                <?php foreach ($bahasa->seeall() as $item) : ?>
                    <option value="<?= esc($item['idBahasa']) ?>">{<?= esc($item['NamaBahasa']) ?>} - <?= esc($item['description']) ?></option>
                <?php endforeach ?>
            </select>
        </div>

        <div class="mb-3 row">
            <label for="codesoalset" class="col-sm-2 col-form-label">SoalSet</label>
            <select name="codesoalset" id="codesoalset" class="form-select form-select-lg mb-3" aria-label=".form-select-lg">
                <?php foreach ($soalset->seeallbyuser(user_id()) as $item) : ?>
                    <option value="<?= esc($item['idSoalSet']) ?>">{<?= esc($item['codeSoalSet']) ?>} - <?= esc($item['description']) ?></option>
                <?php endforeach ?>
            </select>
        </div>
        <!-- //// ! Detail end -->


        <input type="submit" class="btn btn-primary" value="Submit">

    </form>

</div>







<script>
    function countPertanyaan(id) {
        var input = document.getElementById(id);
        var count = input.value.length;

        document.getElementById('count_' + id).textContent = count;
    }

    function setnone(id) {
        var input = document.getElementById(id);
        input.textContent = 'none';
    }
</script>













<?= view('template/footer'); ?>