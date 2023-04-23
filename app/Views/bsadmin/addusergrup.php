<?php
$grup = new \App\Models\Authgroup();
$users = new \App\Models\Bsusers();

?>
<?= backbutton('admin/input') ?>

<?= $this->extend('template/header'); ?>

<form action="<?= base_url('admin/input/usergroup') ?>" method="post">
    <?= csrf_field() ?>
    <select name="User" id="User" class="form-select form-select-lg mb-3" aria-label=".form-select-lg">
        <?php foreach ($users->seeall() as $item) : ?>
            <option value="<?= esc($item['id']) ?>"><?= esc($item['username']) ?></option>
        <?php endforeach ?>
    </select>

    <select name="usergrup" id="usergrup" class="form-select form-select-lg mb-3" aria-label=".form-select-lg">
        <?php foreach ($grup->seeall() as $item) : ?>
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
                <th scope="col">UserName</th>
                <th scope="col">Group</th>
                <th scope="col">delete</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($alldata as $alldata_item) : ?>
                <tr>
                    <th scope="row"><?= $num++ ?></th>
                    <td><?= esc($alldata_item->usersname) ?></td>
                    <td><?= esc($alldata_item->grupname) ?></td>
                    <td>
                        <form action="<?= base_url() ?>admin/delete/usergroup" method="post">
                            <input hidden type="text" name="user_id" id="user_id" value="<?= esc($alldata_item->userid) ?>">
                            <input hidden type="text" name="id_Group" id="id_Group" value="<?= esc($alldata_item->grupid) ?>">
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