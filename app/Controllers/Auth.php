<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Auth extends BaseController
{
    public function __construct()
    {
        helper(['url', 'form']);
    }


    public function login()
    {
        // echo "Login page";
        return view("auth/login");
    }

    public function register()
    {
        // echo "register page";
        return view("auth/register");
    }
    public function registerakun()
    {
        // echo "register";
        $validation = $this->validate(
            [
                'namauser' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Tolong isi Nama Anda'
                    ]
                ],
                'emailuser' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Tolong isi Email Anda'
                    ]
                ]
            ]
        );

        if (!$validation) {
            return view('auth/register', ['validation' => $this->validator]);
        } else {
            $pandreg = new \App\Models\Pendreg();
            $userakun = new \App\Models\Userakun();
            $role = new \App\Models\Rolesuser();
            $quary3 = $role->where('NameRole', 'testuser')->findColumn('idRole');




            $namauser = $this->request->getPost('namauser');
            $emailuser = $this->request->getPost('emailuser');
            $passworduser = $this->request->getPost('passworduser');
            $waktu = time();
            $randomcode = random_int(0, 99999999);

            $isi = [
                'Email' => $emailuser,
                'Code' => $randomcode,
                'exp' => $waktu + 3600,
                'TimeStamp' => $waktu,
                'Password' => $passworduser
            ];

            $isiuser = [
                'UserName' => $namauser,
                'Email' => $emailuser,
                'password' => $passworduser,
                'timestamp' => $waktu,
                'register' => 0,
                'idRole' => $quary3[0]
            ];




            $quary1 = $pandreg->insert($isi);
            $quary2 = $userakun->insert($isiuser);





            if (!$quary1 && !$quary2) {
                echo "error";
                return redirect()->back()->with("fail", "adamasalah dengan server");
            } else {
                $email = \config\Services::email();
                $email->setFrom('indoprogmrbanksoal@gmail.com', "Bank Soal IndoproGMR");
                $email->setTo($emailuser);
                $email->setSubject('Konfirmasi Email');
                $email->setMessage("ini adalah code nya: $randomcode");
                if ($email->send()) {
                    echo "cek email anda";
                } else {
                    $data = $email->printDebugger(['header']);
                    print_r($data);
                }


                echo "registerasi berhasil";
            }
        }
    }
}
