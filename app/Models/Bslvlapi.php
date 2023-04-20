<?php

namespace App\Models;

use CodeIgniter\Model;
use stdClass;

class Bslvlapi extends Model
{
    // protected $DBGroup          = 'default';
    protected $table            = 'BS_lvlApi';
    protected $primaryKey       = 'idlvlApi';
    protected $useAutoIncrement = true;
    // protected $insertID         = 0;
    // protected $returnType       = 'array';
    // protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'lvlApi',
        'description'
    ];

    public function countdb()
    {
        return $this->countAllResults();
    }

    public function addlvlapi(String $name, String $diskripsi)
    {
        return $this->db->table('BS_lvlApi')->insert([
            'lvlApi'        => $name,
            'description' => $diskripsi,
        ]);
    }

    public function seeall()
    {
        return $this->findAll();
    }

    public function cektokenlvl(String $token)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('BS_lvlApi');
        $builder->select('BS_lvlApi.lvlApi as level , BS_ApiToken.codeApiToken as apilevel');
        $builder->join('BS_ApiToken', "BS_ApiToken.Apilvl_id=BS_lvlApi.idlvlApi");
        $builder->where('codeApiToken', $token);
        $quary = $builder->get();
        if (!$quary->getRow() > 0) {
            $data = [
                'level' => 'kosong',
                'apilevel' => "asd"
            ];
            $data = (object) $data;
            return $data;
        }
        return $quary->getRow();
    }
}
