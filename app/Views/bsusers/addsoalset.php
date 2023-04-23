<?php

use App\Models\Bssoalset;

$model = model(Bssoalset::class); ?>
<?= $this->extend('template/header'); ?>



<?= backbutton('home') ?>

<h1>soal set</h1>


<form action="<?= base_url() ?>soal/input/soalset" method="post">
    <?= csrf_field() ?>
    <div class="mb-3 row">
        <label for="codesoalset" class="col-sm-2 col-form-label">Code</label>
        <div class="col-sm-10">
            <input name="codesoalset" type="text" readonly class="form-control-plaintext" id="codesoalset" value="<?= $randomcode ?>">
            <?= isset($validation) ? display_error($validation, "codesoalset") : '' ?>

        </div>
    </div>
    <div class="mb-3 row">
        <label for="Diskripsi" class="col-sm-2 col-form-label">Diskripsi</label>
        <div class="col-sm-10">
            <input name="Diskripsi" type="text" class="form-control" id="Diskripsi">
            <?= isset($validation) ? display_error($validation, "Diskripsi") : '' ?>

        </div>
    </div>
    <input type="submit" class="btn btn-primary" value="Submit">

</form>




<?php $num = 1 ?>
<?php if (!empty($alldata) && is_array($alldata)) : ?>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Code</th>
                <th scope="col">Diskripsi</th>
                <?php if (has_permission('D_SoalSet')) echo '<th scope="col">delete</th>';  ?>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($alldata as $alldata_item) : ?>
                <tr>
                    <th scope="row"><?= $num++ ?></th>
                    <td>
                        <?= esc($alldata_item['codeSoalSet']) ?>
                        <span class="badge bg-secondary">
                            <?= count($model->countSoalbySoalSet(user_id(), esc($alldata_item['idSoalSet']))) ?>
                        </span>
                    </td>


                    <td><?= esc($alldata_item['description']) ?></td>
                    <?php if (has_permission('D_SoalSet')) : ?>
                        <td>
                            <form action="<?= base_url() ?>soal/delete/soalset" method="post">
                                <input hidden type="text" name="idSoalSet" id="idSoalSet" value="<?= esc($alldata_item['idSoalSet']) ?>">
                                <input type="submit" value="Delete">
                            </form>
                        </td>
                    <?php endif ?>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
<?php else : ?>
    <h2>Tidak ada Data</h2>
<?php endif ?>














<?= view('template/footer'); ?>