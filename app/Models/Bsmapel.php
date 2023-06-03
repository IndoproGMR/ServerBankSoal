<?php

namespace App\Models;

use CodeIgniter\Model;
use PhpParser\Node\Expr\Cast\String_;

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
        'description',
        'codeMapel'
    ];

    public function countdb()
    {
        return $this->countAllResults();
    }

    public function addmapel(String $name, String $diskripsi, String $codeMapel)
    {
        return $this->db->table('BS_Mapel')->insert([
            'NamaMapel'   => $name,
            'description' => $diskripsi,
            'codeMapel'   => $codeMapel,
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
