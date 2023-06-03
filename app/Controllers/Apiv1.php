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
        // http://localhost:8080/api/v1/randomsoal?bahasa=a&lvl=1&mapel=General
        // http://localhost:8080/api/v1/randomsoal?bahasa=awda&lvl=1&mapel=General
        // http://localhost:8080/api/v1/randomsoal?bahasa=awda&lvl=1&mapel=General
        // http://localhost:8080/api/v1/randomsoal?lvl=1&mapel=General
        // http://localhost:8080/api/v1/randomsoal?lvl=1&mapel=General&bahasa=2


        //http://localhost:8080/api/v1/randomsoal?lvl=1&mapel=General
        $getreq = $this->request->getGet([
            'bahasa',
            'lvl',
            'mapel'
        ]);
        // $data['bahasa'] = $getreq['bahasa'];
        // $getreq['random'] = random_int(0000, 9999);

        $modelsoal = model(Bssoalsoal::class);
        $data = $modelsoal->randSoalbylvl($getreq['lvl'], $getreq['mapel'], $getreq['bahasa']);

        return $this->respond($data);
        // return $this->respond($getreq);
    }
    public function soalset()
    {
        // http://localhost:8080/api/v1/soalset?soalset=20&lvl=1
        // http://localhost:8080/api/v1/soalset?soalset=26&lvl=1

        // http://localhost:8080/api/v1/soalset?soalset=82Nj1fBO&lvl=1
        $getreq = $this->request->getGet([
            'soalset',
            'lvl',
        ]);
        $modelsoal = model(Bssoalsoal::class);
        $data = $modelsoal->randSoalbySoalset($getreq['lvl'], $getreq['soalset']);
        return $this->respond($data);
    }

    public function validated()
    {
        // http://localhost:8080/api/v1/validated?idsoal=26&jawaban=1
        // http://localhost:8080/api/v1/validated?idsoal=15&jawaban=swfwe



        $getreq = $this->request->getGet([
            'idsoal',
            'jawaban',
        ]);


        $modelsoal = model(Bssoalsoal::class);
        if ($modelsoal->validasisoal($getreq['idsoal'], $getreq['jawaban'])) {
            $data['jawaban'] = "BENAR";
        } else {
            $data['jawaban'] = "SALAH";
        }
        return $this->respond($data);
    }
}
