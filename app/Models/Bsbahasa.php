<?php

namespace App\Models;

use CodeIgniter\Model;

class Bsbahasa extends Model
{
    // protected $DBGroup          = 'default';
    protected $table            = 'BS_Bahasa';
    protected $primaryKey       = 'idBahasa';
    protected $useAutoIncrement = true;
    // protected $insertID         = 0;
    // protected $returnType       = 'array';
    // protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'NamaBahasa',
        'description'
    ];


    public function countdb()
    {
        return $this->countAllResults();
    }

    public function addbahasa(String $name, String $diskripsi)
    {
        return $this->db->table('BS_Bahasa')->insert([
            'NamaBahasa'  => $name,
            'description' => $diskripsi,
        ]);
    }
    public function seeall()
    {
        return $this->findAll();
    }

    public function delbahasa(int $id)
    {
        return $this->delete($id);
    }
}
