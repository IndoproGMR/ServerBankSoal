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
}
