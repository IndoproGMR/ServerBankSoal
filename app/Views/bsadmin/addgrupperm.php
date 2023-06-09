<?php
$grup = new \App\Models\Authgroup();
$permi = new \App\Models\Authperm();
?>
<?= backbutton('admin/input') ?>

<?= $this->extend('template/header'); ?>

<form action="<?= base_url('admin/input/groupperm') ?>" method="post">
    <?= csrf_field() ?>
    <select name="grup" id="grup" class="form-select form-select-lg mb-3" aria-label=".form-select-lg">
        <?php foreach ($grup->seeall() as $item) : ?>
            <option value="<?= esc($item['id']) ?>"><?= esc($item['name']) ?></option>
        <?php endforeach ?>
    </select>

    <select name="userpermi" id="userpermi" class="form-select form-select-lg mb-3" aria-label=".form-select-lg">
        <?php foreach ($permi->seeall() as $item) : ?>
            <option value="<?= esc($item['id']) ?>"><?= esc($item['name']) ?></option>
        <?php endforeach ?>
    </select>
    <input type="submit" class="btn btn-primary" value="Submit">
</form>

<?php if (!empty($validerror)) {
    echo $validerror;
};
?>



<?php $num = 1 ?>
<?php if (!empty($alldata) && is_array($alldata)) : ?>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Group name</th>
                <th scope="col">Permission</th>
                <th scope="col">delete</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($alldata as $alldata_item) : ?>
                <tr>
                    <th scope="row"><?= $num++ ?></th>
                    <td><?= esc($alldata_item->grupname) ?></td>
                    <td><?= esc($alldata_item->permname) ?></td>
                    <td>
                        <form action="<?= base_url() ?>admin/delete/groupperm" method="post">
                            <input hidden type="text" name="grup" id="grup" value="<?= esc($alldata_item->grupid) ?>">
                            <input hidden type="text" name="userpermi" id="userpermi" value="<?= esc($alldata_item->permid) ?>">
                            <input type="submit" value="Delete">
                        </form>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
<?php else : ?>
    <h2>Tidak ada Data</h2>
<?php endif ?>



<?= view('template/footer'); ?>