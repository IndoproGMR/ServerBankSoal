<?php

namespace App\Models;

use CodeIgniter\Model;

class Bsmapel extends Model
{
    // protected $DBGroup          = 'default';
    protected $table            = 'BS_Mapel';
    protected $primaryKey       = 'idMapel';
    protected $useAutoIncrement = true;
    // protected $insertID         = 0;
    // protected $returnType       = 'array';
    // protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'NamaMapel',
        'description'
    ];

    public function countdb()
    {
        return $this->countAllResults();
    }

    public function addmapel(String $name, String $diskripsi)
    {
        return $this->db->table('BS_Mapel')->insert([
            'NamaMapel'   => $name,
            'description' => $diskripsi,
        ]);
    }

    public function delmapel(int $id)
    {
        return $this->delete($id);
    }

    public function seeall()
    {
        return $this->findAll();
    }

    public function seemapelbyid(int $id)
    {
        return $this->where('idMapel', $id)->find();
    }
}
