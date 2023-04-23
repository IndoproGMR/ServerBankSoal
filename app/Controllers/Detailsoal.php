<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Bssoalsoal;
use App\Models\Bsusers;

class Detailsoal extends BaseController
{
    public function index()
    {
        $model = model(Bssoalsoal::class);
        $data['alldata'] = $model->seeall();
        $data['title'] = "soal Baru";

        // d($data);
        return view('bssoalsoal/index', $data);
    }
    public function detailsoal(int $idsoal)
    {
        $model = model(Bssoalsoal::class);

        $data['alldata'] = $model->detailsoalbyid($idsoal);
        // $data['alldata'] = $modeluser->
        // d($data);
        // echo $idsoal;
        return view('bssoalsoal/detailsoal', $data);
    }
    public function showsoal()
    {
        $modeluser = model(Bsusers::class);
        $modelsoal = model(Bssoalsoal::class);

        if (!empty($_GET['user'])) {
            $getdata = $_GET['user'];
            if ($modeluser->is_user_existByname($getdata)) {
                $userid = $modeluser->seeidbyname($getdata);
            }
        } else {
            $getdata = user()->username;
            $userid  = user_id();
        }

        $data['alldata'] = $modelsoal->detailsoalbyiduser($userid);

        return view('bssoalsoal/index', $data);
    }
}
