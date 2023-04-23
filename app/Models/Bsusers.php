<?php

namespace App\Models;

use CodeIgniter\Model;

class Bsusers extends Model
{
    // protected $DBGroup          = 'default';
    protected $table            = 'users';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    // protected $insertID         = 0;
    // protected $returnType       = 'array';
    // protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['username'];

    public function countdb()
    {
        return $this->countAllResults();
    }



    // public function countdb(String $field = null, $data = null)
    // {
    //     if ($field == null && $data == null) {
    //         return $this->countAllResults();
    //     }
    //     return count($this->where($field, $data)->find());
    // }

    public function seeall()
    {
        return $this->findAll();
    }

    public function seename(int $user_id)
    {
        $name = $this->find($user_id);
        return $name['username'];
    }

    public function seeidbyname(String $username)
    {
        return $this->where('username', $username)->findColumn('id')[0];
    }

    public function alluserid()
    {
        $id = $this->orderBy('username', 'asc')->findColumn('id');
        return $id;
    }

    public function seeallname()
    {
        return $this->findColumn('username');
    }

    public function seeuserbygrupname(String $nama)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('users');
        $builder->select('username');
        $builder->join('auth_groups_users', 'auth_groups_users.user_id=users.id');
        $builder->join('auth_groups', 'auth_groups.id=auth_groups_users.group_id');
        $builder->where('auth_groups.name', $nama);
        $quary = $builder->get();
        return $quary->getResult();
    }

    public function is_user_existByname(String $username)
    {
        $data = $this->where('username', $username)->countAllResults();
        if ($this->where('username', $username)->countAllResults() > 0) {
            return true;
        }
        return false;
    }
}
