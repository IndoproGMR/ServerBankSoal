<?php
$grup = new \App\Models\Authgroup();
$permi = new \App\Models\Authperm();
$data['title'] = "admin panel";
?>
<?= view('template/header', $data); ?>
<form action="<?= base_url('admin/input/grouperm') ?>" method="post">
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
            </tr>
        </thead>
        <tbody>
            <?php foreach ($alldata as $alldata_item) : ?>
                <tr>
                    <th scope="row"><?= $num++ ?></th>
                    <td><?= esc($alldata_item->grupname) ?></td>
                    <td><?= esc($alldata_item->permname) ?></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
<?php else : ?>
    <h2>Tidak ada Data</h2>
<?php endif ?>