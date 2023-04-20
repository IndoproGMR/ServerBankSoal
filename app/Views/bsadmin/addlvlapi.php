<?php
$data['title'] = "admin panel";
?>
<?= view('template/header', $data); ?>
<form action="<?= base_url() ?>admin/input/lvlapi" method="post">
    <?= csrf_field() ?>
    <input type="text" name="lvlapi" id="lvlapi" placeholder="nama lvlapi">
    <input type="text" name="diskripsi_lvlapi" id="diskripsi_lvlapi" placeholder="diskripsi">
    <input type="submit" value="submit">
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
                <th scope="col">Name LVLAPI</th>
                <th scope="col">Diskripsi</th>
                <th scope="col">delete</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($alldata as $alldata_item) : ?>
                <tr>
                    <th scope="row"><?= $num++ ?></th>
                    <td><?= esc($alldata_item['lvlApi']) ?></td>
                    <td><?= esc($alldata_item['description']) ?></td>
                    <td>
                        <form action="<?= base_url() ?>admin/delete/lvlapi" method="post">
                            <input hidden type="text" name="idlvlapi" id="idlvlapi" value="<?= esc($alldata_item['idlvlApi']) ?>">
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