<?php
$data['title'] = "admin panel";
?>
<?= view('template/header', $data); ?>
<form action="<?= base_url() ?>admin/input/mapel" method="post">
    <?= csrf_field() ?>
    <input type="text" name="nama_mapel" id="nama_mapel" placeholder="nama mapel">
    <input type="text" name="diskripsi_mapel" id="diskripsi_mapel" placeholder="diskripsi">
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
                <th scope="col">Nama Mata Pelajaran</th>
                <th scope="col">Diskripsi</th>
                <th scope="col">delete</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($alldata as $alldata_item) : ?>
                <tr>
                    <th scope="row"><?= $num++ ?></th>
                    <td><?= esc($alldata_item['NamaMapel']) ?></td>
                    <td><?= esc($alldata_item['description']) ?></td>
                    <td>
                        <form action="<?= base_url() ?>admin/delete/mapel" method="post">
                            <input hidden type="text" name="id_mapel" id="id_mapel" value="<?= esc($alldata_item['idMapel']) ?>">
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