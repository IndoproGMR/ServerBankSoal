<?php

namespace App\Models;

use CodeIgniter\Model;

class Authgroup extends Model
{
    // protected $DBGroup          = 'default';
    protected $table            = 'auth_groups';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    // protected $insertID         = 0;
    // protected $returnType       = 'array';
    // protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields = [
        'name',
        'description',
    ];
    protected $validationRules = [
        'name'        => 'required|max_length[255]|is_unique[auth_groups.name,name,{name}]',
        'description' => 'max_length[255]',
    ];

    public function countdb()
    {
        return $this->countAllResults();
    }

    public function addgroup(String $name, String $diskripsi)
    {
        return $this->db->table('auth_groups')->insert([
            'name'        => $name,
            'description' => $diskripsi,
        ]);
    }
    public function seeall()
    {
        return $this->findAll();
    }

    public function seeallgrupperm()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('auth_groups_permissions');
        $builder->select('auth_groups.name as grupname , auth_permissions.name as permname');
        $builder->join('auth_groups', 'auth_groups.id=auth_groups_permissions.group_id');
        $builder->join('auth_permissions', 'auth_permissions.id=auth_groups_permissions.permission_id');
        $quary = $builder->get();
        return $quary->getResult();
    }

    public function seeallusergrup()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('auth_groups_users');
        $builder->select('auth_groups.name as grupname , users.username as usersname');
        $builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        $builder->join('users', 'users.id = auth_groups_users.user_id');
        $quary = $builder->get();
        return $quary->getResult();
    }

    public function seealluserperm()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('auth_users_permissions');
        $builder->select('users.username as usersname , auth_permissions.name as permname');
        $builder->join('users', 'users.id=auth_users_permissions.user_id');
        $builder->join('auth_permissions', 'auth_permissions.id=auth_users_permissions.permission_id');
        $quary = $builder->get();
        return $quary->getResult();
    }
}
