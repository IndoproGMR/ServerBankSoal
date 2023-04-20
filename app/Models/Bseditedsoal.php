<?php

namespace App\Models;

use CodeIgniter\Model;

class Bseditedsoal extends Model
{
    // protected $DBGroup          = 'default';
    protected $table            = 'BS_EditedSoallog';
    protected $primaryKey       = 'idEditedSoallog';
    protected $useAutoIncrement = true;
    // protected $insertID         = 0;
    // protected $returnType       = 'array';
    // protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'TimeStamp',
        'who_id',
        'SoalSoal_id',
        'NewSoalSoal_id'
    ];

    public function countdb()
    {
        return $this->countAllResults();
    }
    public function seeall()
    {
        return $this->findAll();
    }
}
