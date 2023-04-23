<?= backbutton('admin/input') ?>

<?= $this->extend('template/header'); ?>

<form action="<?= base_url() ?>admin/input/group" method="post">
    <?= csrf_field() ?>
    <input type="text" name="nama_Group" id="nama_Group" placeholder="namagroup">
    <input type="text" name="diskripsi_Group" id="diskripsi_Group" placeholder="diskripsi">
    <input type="submit" class="btn btn-primary" value="submit">
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
                <th scope="col">Diskripsi</th>
                <th scope="col">delete</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($alldata as $alldata_item) : ?>
                <tr>
                    <th scope="row"><?= $num++ ?></th>
                    <td><?= esc($alldata_item['name']) ?></td>
                    <td><?= esc($alldata_item['description']) ?></td>
                    <td>
                        <form action="<?= base_url() ?>admin/delete/group" method="post">
                            <input hidden type="text" name="id_Group" id="id_Group" value="<?= esc($alldata_item['id']) ?>">
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