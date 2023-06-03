<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Bssoalset;
use App\Models\Bssoalsoal;

class UsersController extends BaseController
{

    public function __construct()
    {
        helper(['url', 'form']);
    }
    public function index()
    {
        $modelsoal = model(Bssoalsoal::class);
        $modelset = model(Bssoalset::class);
        $data['jumlahSoal'] = $modelsoal->countdb();
        $data['jumlahSoaluser'] = $modelsoal->countdbbyuser(user_id());
        $data['jumlahSoalset'] = $modelset->countdb();
        $data['jumlahSoalsetuser'] = $modelset->countdbbyuser(user_id());

        $data['namauser'] = user()->username;

        $data['jumlahsoalbyset'] = count($modelset->countSoalbySoalSet(user_id(), 22));

        // d($data);
        return view('bsusers/index', $data);
    }

    public function inputview($yangdiinputkan)
    {
        if (!logged_in())              throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        switch ($yangdiinputkan) {
            case 'soal':
                $model = model(Bssoalsoal::class);
                $data['alldata'] = $model->seeall();
                $data['title'] = "soal Baru";

                return view('bsusers/addsoalsoal', $data);
                break;

            case 'soalset':
                $model = model(Bssoalset::class);
                $data['title'] = "Home Page";


                if (!empty($_GET['full'])) {
                    $getdata = $_GET['full'];
                    if ($getdata == "true") {
                        $data['alldata'] = $model->seeall();
                    } else {
                        $data['alldata'] = $model->seeallbyuser(user_id());
                    }
                } elseif (in_groups("admin")) {
                    $data['alldata'] = $model->seeall();
                } else {
                    $data['alldata'] = $model->seeallbyuser(user_id());
                }

                $data['randomcode'] = random_string('alnum', 8);


                return view('bsusers/addsoalset', $data);
                break;

            default:
                return redirect()->to('home');
                break;
        }
    }

    public function adddata($yangdiinputkan)
    {
        if (!logged_in())              throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        switch ($yangdiinputkan) {
            case 'soal':
                $model = model(Bssoalsoal::class);
                $data['title'] = "soal Baru";

                $postdata = $this->request->getPost([
                    'Pertanyaan',
                    'Penjelasan',
                    'Benar',
                    'salah1',
                    'salah2',
                    'salah3',
                    'level',
                    'mapel',
                    'bahasa',
                    'codesoalset',
                ]);


                $validation = $this->validate(
                    [
                        'Pertanyaan' => [
                            'rules' => 'required|max_length[500]|min_length[1]|is_unique[BS_SoalSoal.Pertanyaan_Soal]',
                            'errors' => [
                                'required'  => 'Tolong isi Soal Anda',
                                'is_unique' => 'Soal Sudah Pernah di tambahkan tolong periksa kembali',
                                'max_length' => 'Tolong isi data benar',
                                'min_length' => 'Tolong isi data benar',
                            ]
                        ],
                        'Penjelasan' => [
                            'rules' => 'required|max_length[500]|min_length[1]',
                            'errors' => [
                                'required' => 'Tolong isi penjelasan Anda',
                                'max_length' => 'Tolong isi data benar',
                                'min_length' => 'Tolong isi data benar',
                            ]
                        ],
                        'Benar' => [
                            'rules' => 'required|max_length[255]|min_length[1]',
                            'errors' => [
                                'required' => 'Tolong isi Jawaban Benar Anda',
                                'max_length' => 'Tolong isi data benar',
                                'min_length' => 'Tolong isi data benar',
                            ]
                        ],
                        'salah1' => [
                            'rules' => 'required|max_length[255]|min_length[1]',
                            'errors' => [
                                'required' => 'Tolong isi Jawaban salah1 Anda',
                                'max_length' => 'Tolong isi data benar',
                                'min_length' => 'Tolong isi data benar',
                            ]
                        ],
                        'salah2' => [
                            'rules' => 'required|max_length[255]|min_length[1]',
                            'errors' => [
                                'required' => 'Tolong isi Jawaban salah2 Anda',
                                'max_length' => 'Tolong isi data benar',
                                'min_length' => 'Tolong isi data benar',
                            ]
                        ],
                        'salah3' => [
                            'rules' => 'required|max_length[255]|min_length[1]',
                            'errors' => [
                                'required' => 'Tolong isi Jawaban salah3 Anda',
                                'max_length' => 'Tolong isi data benar',
                                'min_length' => 'Tolong isi data benar',
                            ]
                        ],
                        'level' => [
                            'rules' => 'required',
                            'errors' => [
                                'required' => 'Tolong isi level Anda',
                            ]
                        ],
                        'mapel' => [
                            'rules' => 'required',
                            'errors' => [
                                'required' => 'Tolong isi mapel Anda',
                            ]
                        ],
                        'bahasa' => [
                            'rules' => 'required',
                            'errors' => [
                                'required' => 'Tolong isi bahasa Anda',
                            ]
                        ],
                        'codesoalset' => [
                            'rules' => 'required',
                            'errors' => [
                                'required' => 'Tolong isi codesoalset Anda',
                            ]
                        ],
                    ]
                );

                $data['validation'] = $this->validator;
                if (!$validation) {
                    return view('bsusers/addsoalsoal', $data);
                }

                if ($model->addsoalsoal(
                    $postdata['Pertanyaan'],
                    $postdata['Penjelasan'],
                    $postdata['Benar'],
                    $postdata['salah1'],
                    $postdata['salah2'],
                    $postdata['salah3'],
                    $postdata['level'],
                    0,
                    user_id(),
                    $postdata['mapel'],
                    $postdata['bahasa'],
                    $postdata['codesoalset'],
                )) {
                    return redirect()->to('soal/input/soal');
                }
                return redirect()->to('soal/input/soal');
                break;

            case 'soalset':
                $model = model(Bssoalset::class);
                $data['title'] = "Home Page";


                $data['randomcode'] = random_string('alnum', 8);
                $data['alldata'] = $model->seeall();
                $postdata = $this->request->getPost([
                    'codesoalset',
                    'Diskripsi'
                ]);

                $validation = $this->validate(
                    [
                        'codesoalset' => [
                            'rules'  => 'required|max_length[8]|min_length[8]|is_unique[BS_SoalSet.codeSoalSet]',
                            'errors' => [
                                'required'   => 'Tolong isi Soal Anda',
                                'is_unique'  => 'CodeSoalSet Sudah Pernah di tambahkan tolong periksa kembali',
                                'max_length' => 'Tolong isi data benar',
                                'min_length' => 'Tolong isi data benar',
                            ]
                        ],
                        'Diskripsi' => [
                            'rules' => 'required|max_length[255]|min_length[3]',
                            'errors' => [
                                'required' => 'Tolong isi penjelasan Anda',
                                'max_length' => 'Tolong isi data benar',
                                'min_length' => 'Tolong isi data benar',
                            ]
                        ],
                    ]
                );

                $data['validation'] = $this->validator;
                if (!$validation) {
                    return view('bsusers/addsoalset', $data);
                }


                if ($model->addsoalset(
                    $postdata['codesoalset'],
                    user_id(),
                    $postdata['Diskripsi']
                )) {
                    return redirect()->to('soal/input/soalset');
                }
                return redirect()->to('soal/input/soalset');
                break;

            default:
                return redirect()->to('home');
                break;
        }
    }

    public function deldata($yangdiinputkan)
    {
        if (!logged_in())              throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();

        switch ($yangdiinputkan) {
            case 'soal':
                if (!has_permission('D_Soal')) throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
                $model = model(Bssoalsoal::class);
                $data['alldata'] = $model->seeall();
                $data['title'] = "soal Baru";

                $postdata = $this->request->getPost([
                    'id_Group',
                ]);

                if (!$this->validateData($postdata, [
                    'id_Group'      => 'required'
                ])) {
                    $data['alldata'] = $model->seeall();
                    $data['validerror'] = "mohon isi dengan benar";
                    return view('bsusers/addsoal', $data);
                }

                if ($model->delgrup($postdata['id_Group'])) {
                    return redirect()->to('soal/input/soal');
                }

                if (in_groups("admin")) {
                    if ($model->delsoalsetadmin($postdata['idSoalSet'])) {
                        return redirect()->to('soal/input/soalset');
                    }
                } elseif ($model->delsoalset($postdata['idSoalSet'], user_id())) {
                    return redirect()->to('soal/input/soalset');
                }

                break;
            case 'soalset':
                echo "delete";
                if (!has_permission('D_SoalSet')) throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
                $model = model(Bssoalset::class);
                $data['randomcode'] = random_string('alnum', 8);
                $data['alldata'] = $model->seeall();
                $postdata = $this->request->getPost([
                    'idSoalSet',
                ]);

                if (!$this->validateData($postdata, [
                    'idSoalSet'      => 'required',
                ])) {
                    $data['validerror'] = "mohon isi dengan benar";
                    return view('bsusers/addsoalset', $data);
                }

                if (in_groups("admin")) {
                    if ($model->delsoalsetadmin($postdata['idSoalSet'])) {
                        return redirect()->to('soal/input/soalset');
                    }
                } elseif ($model->delsoalset($postdata['idSoalSet'], user_id())) {
                    return redirect()->to('soal/input/soalset');
                }
                break;

            default:
                return redirect()->to('home');
                break;
        }
    }
}
