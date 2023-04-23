<?php

use Config\App;

// helper('auth');
helper('auth');

$data['title'] = "admin panel"; ?>
<?= view('template/header', $data); ?>


<?= "admin panel view"; ?>

<br>
<?php
$grup = new \App\Models\Authgroup();
$permi = new \App\Models\Authperm();
$users = new \App\Models\Bsusers();
$grupuser = new Myth\Auth\Models\GroupModel();
$data['grup'] = $grup->seeall();
$data['permi'] = $permi->seeall();
$data['users'] = $users->alluserid();
$data['name'] = $users->seeallname();
$data['usernamebygrup'] = $users->seeuserbygrupname('admin');

echo $users->countdb();

echo "</br>";
echo "</br>";
foreach ($data['usernamebygrup'] as $item) {
    echo $item->username . "</br>";
}
echo "</br>";
echo "</br>";
// echo $data['usernamebygrup'][1]->username;

// if (has_permission('C_Soal')) {
//     echo "bisa membuat soal";
// }
// if (in_groups('admin')) {
//     echo "berada di grup admin";
// }



// foreach ($data['name'] as $item) {
//     echo $item . " </br>";
// }


// $model->
// d($grup->seeall()['name']);
// d($data['grup']);
// d($data);

?>












<?= view('template/footer'); ?>