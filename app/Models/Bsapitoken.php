<?php

namespace App\Models;

use CodeIgniter\Model;

class Bsapitoken extends Model
{
    // protected $DBGroup          = 'default';
    protected $table            = 'BS_ApiToken';
    protected $primaryKey       = 'idApiToken';
    protected $useAutoIncrement = true;
    // protected $insertID         = 0;
    // protected $returnType       = 'array';
    // protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'codeApiToken',
        'user_id',
        'Apilvl_id'
    ];

    public function countdb()
    {
        return $this->countAllResults();
    }

    public function addapitoken(String $codeApiToken, int $userid, int $Apilvl_id)
    {
        return $this->db->table('BS_ApiToken')->insert([
            'codeApiToken' => $codeApiToken,
            'user_id'      => $userid,
            'Apilvl_id'    => $Apilvl_id,
        ]);
    }
}
