<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Authgroup;
use App\Models\Authperm;
use App\Models\Bsbahasa;
use App\Models\Bslvlapi;
use App\Models\Bsmapel;
use App\Models\Bsusers;
use Myth\Auth\Models\GroupModel;

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
        return view('bsadmin/inputindex');
    }

    public function inputview($yangdiinputkan)
    {
        if (!logged_in())              throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        if (!in_groups("admin"))       throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();

        switch ($yangdiinputkan) {
            case 'group':
                $model = model(Authgroup::class);
                $data['alldata'] = $model->seeall();
                $data['title'] = "admin panel";
                return view('bsadmin/addgroup', $data);
                break;
            case 'permission':
                $model = model(Authperm::class);
                $data['alldata'] = $model->seeall();
                $data['title'] = "admin panel";
                return view('bsadmin/addperm', $data);
                break;

            case 'bahasa':
                $model = model(Bsbahasa::class);
                $data['alldata'] = $model->seeall();
                $data['title'] = "admin panel";
                return view('bsadmin/addbahasa', $data);
                break;

            case 'lvlapi':
                $model = model(Bslvlapi::class);
                $data['alldata'] = $model->seeall();
                $data['title'] = "admin panel";
                return view('bsadmin/addlvlapi', $data);
                break;

            case 'mapel':
                $model = model(Bsmapel::class);
                $data['alldata'] = $model->seeall();
                $data['title'] = "admin panel";
                return view('bsadmin/addmapel', $data);
                break;

            case 'usergroup':
                $model = model(Authgroup::class);
                $data['alldata'] = $model->seeallusergrup();
                $data['title'] = "admin panel";
                return view('bsadmin/addusergrup', $data);
                break;

            case 'groupperm':
                $model = model(Authgroup::class);
                $data['alldata'] = $model->seeallgrupperm();
                $data['title'] = "admin panel";
                return view('bsadmin/addgrupperm', $data);
                break;

            case 'userperm':
                $model = model(Authgroup::class);
                $data['alldata'] = $model->seealluserperm();
                $data['title'] = "admin panel";
                return view('bsadmin/adduserperm', $data);
                break;

            default:
                return redirect()->to('admin/input');
                break;
        }
    }

    public function adddata($yangdiinputkan)
    {
        if (!logged_in())                     throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        if (!in_groups("admin"))              throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        if (!has_permission('CRUD_Grupperm')) throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        $data['title'] = "admin panel";

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

                if ($model->addgroup($postdata['nama_Group'], $postdata['diskripsi_Group'])) {
                    return redirect()->to('admin/input/group');
                }

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
                if ($model->addpermi($postdata['nama_Perm'], $postdata['diskripsi_Perm'])) {
                    return redirect()->to('admin/input/permission');
                }
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

                if ($model->addbahasa($postdata['nama_bahasa'], $postdata['diskripsi_bahasa'])) {
                    return redirect()->to('admin/input/bahasa');
                }
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

                if ($model->addlvlapi($postdata['lvlapi'], $postdata['diskripsi_lvlapi'])) {
                    return redirect()->to('admin/input/lvlapi');
                }

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

                if ($model->addmapel($postdata['nama_mapel'], $postdata['diskripsi_mapel'])) {
                    return redirect()->to('admin/input/mapel');
                }

                break;

                ////////// !usergroup
            case 'usergroup':
                $model = model(Authgroup::class);
                $data['alldata'] = $model->seeallusergrup();
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

                $grupmodel = model(GroupModel::class);
                if ($grupmodel->addUserToGroup($postdata['User'], $postdata['usergrup'])) {
                    return redirect()->to('admin/input/usergroup');
                }
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

                if ($permi->addPermissionToUser($postdata['userpermi'], $postdata['User'])) {
                    return redirect()->to('admin/input/userperm');
                }
                break;

                ////////// !groupperm
            case 'groupperm':
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
                // echo "masuk ke database";
                $grupmodel = model(GroupModel::class);
                if ($grupmodel->addPermissionToGroup($postdata['userpermi'], $postdata['grup'])) {
                    return redirect()->to('admin/input/groupperm');
                }
                break;
            default:
                return redirect()->to('admin/input');
                break;
        }
    }

    public function deldata($yangdiinputkan)
    {
        if (!logged_in())              throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        if (!in_groups("admin"))       throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        if (!has_permission('CRUD_Grupperm')) throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        $data['title'] = "admin panel";

        switch ($yangdiinputkan) {


                ////////// !Grup
            case 'group':
                $model = model(Authgroup::class);
                $data['alldata'] = $model->seeall();
                $postdata = $this->request->getPost([
                    'id_Group',
                ]);

                if (!$this->validateData($postdata, [
                    'id_Group'      => 'required'
                ])) {
                    $data['alldata'] = $model->seeall();
                    $data['validerror'] = "mohon isi dengan benar";
                    return view('bsadmin/addgroup', $data);
                }

                if ($model->delgrup($postdata['id_Group'])) {
                    return redirect()->to('admin/input/group');
                }

                break;

                ////////// !Permission
            case 'permission':
                $model = model(Authperm::class);
                $data['alldata'] = $model->seeall();
                $postdata = $this->request->getPost([
                    'id_permi',
                ]);

                if (!$this->validateData($postdata, [
                    'id_permi'      => 'required'
                ])) {
                    return view('bsadmin/addperm', $data);
                }
                if ($model->delpermi($postdata['id_permi'])) {
                    return redirect()->to('admin/input/permission');
                }
                break;

                ////////// !bahasa
            case 'bahasa':
                $model = model(Bsbahasa::class);
                $postdata = $this->request->getPost([
                    'id_bahasa',
                ]);

                if (!$this->validateData($postdata, [
                    'id_bahasa'      => 'required',
                ])) {
                    $data['alldata'] = $model->seeall();
                    $data['validerror'] = "mohon isi dengan benar";
                    return view('bsadmin/addbahasa', $data);
                }

                if ($model->delbahasa($postdata['id_bahasa'])) {
                    return redirect()->to('admin/input/bahasa');
                }
                break;

                ////////// !lvlapi
            case 'lvlapi':
                $model = model(Bslvlapi::class);
                $data['alldata'] = $model->seeall();
                $postdata = $this->request->getPost([
                    'idlvlapi',
                ]);

                if (!$this->validateData($postdata, [
                    'idlvlapi'      => 'required'
                ])) {
                    $data['validerror'] = "mohon isi dengan benar";
                    return view('bsadmin/addlvlapi', $data);
                }

                if ($model->dellvlapi($postdata['idlvlapi'])) {
                    return redirect()->to('admin/input/lvlapi');
                }
                break;


                ////////// !mapel
            case 'mapel':
                $model = model(Bsmapel::class);
                $data['alldata'] = $model->seeall();
                $postdata = $this->request->getPost([
                    'id_mapel',
                ]);

                if (!$this->validateData($postdata, [
                    'id_mapel'      => 'required'
                ])) {
                    $data['validerror'] = "mohon isi dengan benar";
                    return view('bsadmin/addmapel', $data);
                }

                if ($model->delmapel($postdata['id_mapel'])) {
                    return redirect()->to('admin/input/mapel');
                }

                break;

                ////////// !usergroup
            case 'usergroup':
                $model = model(Authgroup::class);
                $data['alldata'] = $model->seeallusergrup();
                $postdata = $this->request->getPost([
                    'user_id',
                    'id_Group'
                ]);

                if (!$this->validateData($postdata, [
                    'user_id'      => 'required',
                    'id_Group'     => 'required'
                ])) {
                    $data['validerror'] = "mohon isi dengan benar";
                    return view('bsadmin/addusergrup', $data);
                }

                $grupmodel = model(GroupModel::class);
                if ($grupmodel->removeUserFromGroup($postdata['user_id'], $postdata['id_Group'])) {
                    return redirect()->to('admin/input/usergroup');
                }
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

                if ($permi->removePermissionFromUser($postdata['userpermi'], $postdata['User'])) {
                    return redirect()->to('admin/input/userperm');
                }
                break;

                ////////// !groupperm
            case 'groupperm':
                $model = model(Authgroup::class);
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

                $grupmodel = model(GroupModel::class);
                if ($grupmodel->removePermissionFromGroup($postdata['userpermi'], $postdata['grup'])) {
                    return redirect()->to('admin/input/groupperm');
                }
                break;





            default:
                return redirect()->to('admin/input');
                break;
        }
    }
}
