<?php
$users = new \App\Models\Bsusers();
$permi = new \App\Models\Authperm();
$data['title'] = "admin panel";
?>
<?= view('template/header', $data); ?>

<form action="<?= base_url('admin/input/userperm') ?>" method="post">
    <select name="User" id="User">
        <?php foreach ($users->seeall() as $item) : ?>
            <option value="<?= esc($item['id']) ?>"><?= esc($item['username']) ?></option>
        <?php endforeach ?>
    </select>

    <select name="userpermi" id="userpermi">
        <?php foreach ($permi->seeall() as $item) : ?>
            <option value="<?= esc($item['id']) ?>"><?= esc($item['name']) ?></option>
        <?php endforeach ?>
    </select>
    <input type="submit" value="Submit">
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
                    <td><?= esc($alldata_item->usersname) ?></td>
                    <td><?= esc($alldata_item->permname) ?></td>
                    <td>
                        <form action="<?= base_url() ?>admin/delete/userperm" method="post">
                            <input type="text" name="User" id="User" value="<?= esc($alldata_item->userid) ?>">
                            <input type="text" name="userpermi" id="userpermi" value="<?= esc($alldata_item->permid) ?>">
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