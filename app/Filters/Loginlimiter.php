<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Config\Services;

class Loginlimiter implements FilterInterface
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

        $error = [
            'status'  => 'error',
            'message' => 'Too Many Login',
        ];


        // Restrict an IP address to no more than 1 request
        // per second across the entire site.
        // if ($throttler->check(md5($request->getIPAddress()), 1, MINUTE) === false) {
        if ($throttler->check(md5("test"), 1, MINUTE) === false) {
            // return view('template/login');
            // $data['jumlahSoal'] = 1;
            // $data['jumlahSoaluser'] = 2;
            // $data['jumlahSoalset'] = 3;
            // $data['jumlahSoalsetuser'] = 4;

            // $data['namauser'] = "nama";

            // // $data['jumlahsoalbyset'] = count($modelset->countSoalbySoalSet(user_id(), 22));
            // return "limit";
            // return Services::response()->setStatusCode(429);
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
