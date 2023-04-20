<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Bsbahasa;
use App\Models\Bsmapel;
use App\Models\Bssoalsoal;
use App\Models\Bsusers;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\RESTful\ResourceController;

class Apiv1 extends ResourceController
{
    use ResponseTrait;

    public function index()
    {
        // dipakai untuk ping server
        // $model = model(Bsusers::class);
        // $model = model(Bssoalsoal::class);
        // $data['users'] = $model->seeall();
        // $data['count'] = $model->countdb();
        $data['status'] = "ok";
        $data['time'] = time();
        $data['latestapiversion'] = $_ENV['LATESTAPIVERSION'];
        return $this->respond($data);
    }

    public function randomsoal()
    {
        // http://localhost:8080/api/v1/randomsoal?bahasa=a&lvl=1&mapel=q
        // http://localhost:8080/api/v1/randomsoal?bahasa=awda&lvl=1&mapel=sdaw
        $getreq = $this->request->getGet([
            'bahasa',
            'lvl',
            'mapel'
        ]);
        // $data['bahasa'] = $getreq['bahasa'];
        $getreq['random'] = random_int(0000, 9999);

        return $this->respond($getreq);
    }
    public function berdasarkansetsoal()
    {
    }
}
