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

        if (!empty($_GET['token'])) {
            $getreq = $_GET['token'];
            $model = model(Bslvlapi::class);
            $lvl = $model->cektokenlvl($_GET['token']);

            switch ($lvl->level) {
                case 'Standart':
                    if ($throttler->check(md5("test"), 30, MINUTE) === false) {
                        return Services::response()->setStatusCode(429)->setBody(json_encode(
                            [
                                'message' => 'Too many Request',
                                // 'token' => $getreq,
                                // 'level' => $lvl->level,
                                // 'data' => 'standart'
                            ]
                        ));
                    }
                    break;

                case 'Standart 1':
                    if ($throttler->check(md5("test"), 60, MINUTE) === false) {
                        return Services::response()->setStatusCode(429)->setBody(json_encode(
                            [
                                'message' => 'Too many Request',
                                // 'token' => $getreq,
                                // 'level' => $lvl->level,
                                // 'data' => 'standart 1'
                            ]
                        ));
                    }
                    break;

                default:
                    if ($throttler->check(md5("test"), 15, MINUTE) === false) {
                        return Services::response()->setStatusCode(429)->setBody(json_encode(
                            [
                                'message' => 'Too many Request',
                                // 'token' => $getreq,
                                // 'level' => $lvl->level,
                                // 'data' => 'default'
                            ]
                        ));
                    }
                    break;
            }
        } elseif ($throttler->check(md5("test"), 15, MINUTE) === false) {
            return Services::response()->setStatusCode(429)->setBody(json_encode(
                [
                    'message' => 'Too many Request',
                ]
            ));
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
