<?php

namespace App\Models;

use CodeIgniter\Model;

class Authperm extends Model
{
    // protected $DBGroup          = 'default';
    protected $table            = 'auth_permissions';
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
        'name'        => 'required|max_length[255]|is_unique[auth_permissions.name,name,{name}]',
        'description' => 'max_length[255]',
    ];

    public function countdb()
    {
        return $this->countAllResults();
    }

    public function addpermi(String $name, String $diskripsi): bool
    {
        return $this->db->table('auth_permissions')->insert([
            'name'        => $name,
            'description' => $diskripsi,
        ]);
    }
    public function seeall()
    {
        return $this->findAll();
    }
}
