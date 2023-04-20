<?php

namespace App\Models;

use CodeIgniter\Model;

class Bssoalset extends Model
{
    // protected $DBGroup          = 'default';
    protected $table            = 'BS_SoalSet';
    protected $primaryKey       = 'idSoalSet';
    protected $useAutoIncrement = true;
    // protected $insertID         = 0;
    // protected $returnType       = 'array';
    // protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'codeSoalSet',
        'user_id',
        'description'
    ];

    public function countdb()
    {
        return $this->countAllResults();
    }

    public function addsoalset(String $codeSoalSet, int $userid, String $diskripsi)
    {
        return $this->db->table('BS_SoalSet')->insert([
            'codeSoalSet' => $codeSoalSet,
            'user_id'     => $userid,
            'description' => $diskripsi,
        ]);
    }
}
