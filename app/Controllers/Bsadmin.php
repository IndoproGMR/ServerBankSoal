<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Authgroup;
use App\Models\Authperm;
use App\Models\Bsbahasa;
use App\Models\Bslvlapi;
use App\Models\Bsmapel;
use App\Models\Bsusers;
use Myth\Auth\Entities\Permission;
use Myth\Auth\Models\GroupModel;

// use App\Models\Authg;
// use App\Models\Authperm;

class Bsadmin extends BaseController
{
    public function index()
    {
        // $grupmodel = model(GroupModel::class);
        // if ($grupmodel->updateUserIngroup(2, 4)) {echo 'berhasil';}
        // return view('bsadmin/index');
        $model = model(Bslvlapi::class);
        $isi = $model->cektokenlvl('123');
        d($isi);
        echo $isi->level;
        // echo $isi->idlvlapi;
    }
    public function inputindex()
    {
        $model = model(Bsusers::class);
        echo $model->seename(user_id());
        // print_r($model->alluserid());

        // echo user()->username;

        foreach ($model->alluserid() as $item) {
            echo $model->seename($item) . "</br>";
        }

        // return " input index";
        return view('bsadmin/inputindex');
    }
    public function inputview($yangdiinputkan)
    {
        if (!logged_in())        throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        if (!in_groups("admin")) throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();


        switch ($yangdiinputkan) {
            case 'group':
                $model = model(Authgroup::class);
                $data['alldata'] = $model->seeall();
                return view('bsadmin/addgroup', $data);
                break;
            case 'permission':
                $model = model(Authperm::class);
                $data['alldata'] = $model->seeall();
                return view('bsadmin/addperm', $data);
                break;

            case 'bahasa':
                $model = model(Bsbahasa::class);
                $data['alldata'] = $model->seeall();
                return view('bsadmin/addbahasa', $data);
                break;

            case 'lvlapi':
                $model = model(Bslvlapi::class);
                $data['alldata'] = $model->seeall();
                return view('bsadmin/addlvlapi', $data);
                break;

            case 'mapel':
                $model = model(Bsmapel::class);
                $data['alldata'] = $model->seeall();
                return view('bsadmin/addmapel', $data);
                break;

            case 'usergroup':
                $model = model(GroupModel::class);
                // $model = model(Bsmapel::class);
                $model = model(Authgroup::class);

                $data['alldata'] = $model->seeallusergrup();
                // d($data['alldata']);
                return view('bsadmin/addusergrup', $data);
                break;

            case 'groupperm':
                $model = model(GroupModel::class);
                // $model = model(Bsmapel::class);
                $model = model(Authgroup::class);

                $data['alldata'] = $model->seeallgrupperm();
                // d($data['alldata']);
                return view('bsadmin/addgrupperm', $data);
                break;

            case 'userperm':
                $model = model(GroupModel::class);
                // $model = model(Bsmapel::class);
                $model = model(Authgroup::class);

                $data['alldata'] = $model->seealluserperm();
                // d($data['alldata']);
                return view('bsadmin/adduserperm', $data);
                break;
            default:
                return "error";
                break;
        }
    }
    public function adddata($yangdiinputkan)
    {
        if (!logged_in())        throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        if (!in_groups("admin")) throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        switch ($yangdiinputkan) {

                ////////// !Grup
            case 'group':
                $model = model(Authgroup::class);
                $data['alldata'] = $model->seeall();
                $postdata = $this->request->getPost([
                    'nama_Group',
                    'diskripsi_Group'
                ]);

                if (!$this->validateData($postdata, [
                    'nama_Group'      => 'required|max_length[255]|min_length[3]',
                    'diskripsi_Group' => 'required|max_length[255]|min_length[3]'
                ])) {
                    return view('bsadmin/addgroup', $data);
                }
                echo "masuk ke database";

                $model->addgroup($postdata['nama_Group'], $postdata['diskripsi_Group']);
                break;

                ////////// !Permission
            case 'permission':
                $model = model(Authperm::class);
                $data['alldata'] = $model->seeall();
                $postdata = $this->request->getPost([
                    'nama_Perm',
                    'diskripsi_Perm'
                ]);

                if (!$this->validateData($postdata, [
                    'nama_Perm'      => 'required|max_length[255]|min_length[3]',
                    'diskripsi_Perm' => 'required|max_length[255]|min_length[3]'
                ])) {
                    return view('bsadmin/addperm', $data);
                }
                echo "masuk ke database";
                $model->addpermi($postdata['nama_Perm'], $postdata['diskripsi_Perm']);
                break;

                ////////// !bahasa
            case 'bahasa':
                $model = model(Bsbahasa::class);
                $data['alldata'] = $model->seeall();
                $postdata = $this->request->getPost([
                    'nama_bahasa',
                    'diskripsi_bahasa'
                ]);

                if (!$this->validateData($postdata, [
                    'nama_bahasa'      => 'required|max_length[255]|min_length[2]',
                    'diskripsi_bahasa' => 'required|max_length[255]|min_length[3]'
                ])) {
                    $data['validerror'] = "mohon isi dengan benar";
                    return view('bsadmin/addbahasa', $data);
                }
                echo "masuk ke database";
                $model->addbahasa($postdata['nama_bahasa'], $postdata['diskripsi_bahasa']);
                break;

                ////////// !lvlapi
            case 'lvlapi':
                $model = model(Bslvlapi::class);
                $data['alldata'] = $model->seeall();
                $postdata = $this->request->getPost([
                    'lvlapi',
                    'diskripsi_lvlapi'
                ]);

                if (!$this->validateData($postdata, [
                    'lvlapi'      => 'required|max_length[255]|min_length[2]',
                    'diskripsi_lvlapi' => 'required|max_length[255]|min_length[3]'
                ])) {
                    $data['validerror'] = "mohon isi dengan benar";
                    return view('bsadmin/addlvlapi', $data);
                }
                echo "masuk ke database";
                $model->addlvlapi($postdata['lvlapi'], $postdata['diskripsi_lvlapi']);
                break;


                ////////// !mapel
            case 'mapel':
                $model = model(Bsmapel::class);
                $data['alldata'] = $model->seeall();
                $postdata = $this->request->getPost([
                    'nama_mapel',
                    'diskripsi_mapel'
                ]);

                if (!$this->validateData($postdata, [
                    'nama_mapel'      => 'required|max_length[255]|min_length[2]',
                    'diskripsi_mapel' => 'required|max_length[255]|min_length[3]'
                ])) {
                    $data['validerror'] = "mohon isi dengan benar";
                    return view('bsadmin/addmapel', $data);
                }
                echo "masuk ke database";
                $model->addmapel($postdata['nama_mapel'], $postdata['diskripsi_mapel']);
                break;

                ////////// !usergroup
            case 'usergroup':
                $model = model(Bsmapel::class);
                $data['alldata'] = $model->seeall();
                $postdata = $this->request->getPost([
                    'User',
                    'usergrup'
                ]);

                if (!$this->validateData($postdata, [
                    'User'      => 'required',
                    'usergrup' => 'required'
                ])) {
                    $data['validerror'] = "mohon isi dengan benar";
                    return view('bsadmin/addusergrup', $data);
                }
                echo "masuk ke database";
                $grupmodel = model(GroupModel::class);
                $grupmodel->addUserToGroup($postdata['User'], $postdata['usergrup']);
                break;

                ////////// !userperm
            case 'userperm':
                $model = model(Bsmapel::class);
                $data['alldata'] = $model->seeall();
                $postdata = $this->request->getPost([
                    'User',
                    'userpermi'
                ]);

                if (!$this->validateData($postdata, [
                    'User'      => 'required',
                    'userpermi' => 'required'
                ])) {
                    $data['validerror'] = "mohon isi dengan benar";
                    return view('bsadmin/addgrupperm', $data);
                }
                echo "masuk ke database";
                $permi = new \Myth\Auth\Models\PermissionModel();
                $permi->addPermissionToUser($postdata['userpermi'], $postdata['User']);
                break;

                ////////// !grouperm
            case 'grouperm':
                $model = model(Bsmapel::class);
                $data['alldata'] = $model->seeall();
                $postdata = $this->request->getPost([
                    'grup',
                    'userpermi'
                ]);

                if (!$this->validateData($postdata, [
                    'grup'      => 'required',
                    'userpermi' => 'required'
                ])) {
                    $data['validerror'] = "mohon isi dengan benar";
                    return view('bsadmin/adduserperm', $data);
                }
                echo "masuk ke database";
                $grupmodel = model(GroupModel::class);
                $grupmodel->addPermissionToGroup($postdata['userpermi'], $postdata['grup']);
                break;
            default:
                echo "error";
                break;
        }
    }
}
