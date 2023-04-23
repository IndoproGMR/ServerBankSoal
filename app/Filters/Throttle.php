<?php

namespace App\Filters;

use App\Models\Bslvlapi;
use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

use Config\Services;

class Throttle implements FilterInterface
{

    /**
     * This is a demo implementation of using the Throttler class
     * to implement rate limiting for your application.
     *
     * @param array|null $arguments
     *
     * @return mixed
     */
    public function before(RequestInterface $request, $arguments = null)
    {
        $throttler = Services::throttler();
        $cek = md5("test");
        $error = [
            'status'  => 'error',
            'message' => 'Too Many Request',
        ];


        if (!empty($_GET['token'])) {
            $getreq = $_GET['token'];
            $model = model(Bslvlapi::class);
            $lvl = $model->cektokenlvl($_GET['token']);

            switch ($lvl->level) {
                case 'Standart':
                    if ($throttler->check($cek, 30, MINUTE) === false) {
                        return Services::response()->setJSON($error);
                    }
                    break;

                case 'Standart 1':
                    if ($throttler->check($cek, 60, MINUTE) === false) {
                        return Services::response()->setJSON($error);
                    }
                    break;

                default:
                    if ($throttler->check($cek, 15, MINUTE) === false) {
                        return Services::response()->setJSON($error);
                    }
                    break;
            }
        } elseif ($throttler->check($cek, 15, MINUTE) === false) {
            return Services::response()->setJSON($error);
        }
    }

    /**
     * We don't have anything to do here.
     *
     * @param array|null $arguments
     *
     * @return mixed
     */
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // ...
    }
}
