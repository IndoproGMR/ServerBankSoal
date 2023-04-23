<?php
$data['title'] = "admin panel";
?>
<?= backbutton('admin') ?>

<?= view('template/header', $data); ?>
<div class="btn-group-vertical" style="margin-left: 20px;margin-top: 20px;">
    <a class="btn btn-primary" role="button" href="<?= base_url('admin') ?>/input/group">group</a>
    <a class="btn btn-primary" role="button" href="<?= base_url('admin') ?>/input/permission">permission</a>
    <a class="btn btn-primary" role="button" href="<?= base_url('admin') ?>/input/bahasa">bahasa</a>
    <a class="btn btn-primary" role="button" href="<?= base_url('admin') ?>/input/lvlapi">lvlapi</a>
    <a class="btn btn-primary" role="button" href="<?= base_url('admin') ?>/input/mapel">mapel</a>
    <a class="btn btn-primary" role="button" href="<?= base_url('admin') ?>/input/usergroup">usergroup</a>
    <a class="btn btn-primary" role="button" href="<?= base_url('admin') ?>/input/groupperm">groupperm</a>
    <a class="btn btn-primary" role="button" href="<?= base_url('admin') ?>/input/userperm">userperm</a>
</div>

<?= view('template/footer'); ?>