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
        'description',
        'edited'
    ];


    public function seeall()
    {
        return $this->findAll();
    }

    public function seeallbyuser(int $userid)
    {
        return $this->where('user_id', $userid)->findAll();
    }

    public function seesoalsetbydi(int $id)
    {
        return $this->where('idSoalSet', $id)->find();
    }

    public function countdb()
    {
        return $this->countAllResults();
    }

    public function countdbbyuser(int $userid)
    {
        return $this->where('user_id', $userid)->countAllResults();
    }

    public function countSoalbySoalSet(int $userid, $soalsetid)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('BS_SoalSet');
        $builder->select('*');
        $builder->join('BS_SoalSoal', 'BS_SoalSoal.SoalSet_id = BS_SoalSet.idSoalSet');
        $builder->where('BS_SoalSet.idSoalSet', $soalsetid);
        // $builder->where('BS_SoalSet.user_id', $userid);
        $quary = $builder->get();
        return $quary->getResult();
    }

    public function addsoalset(String $codeSoalSet, int $userid, String $diskripsi)
    {
        return $this->db->table('BS_SoalSet')->insert([
            'codeSoalSet' => $codeSoalSet,
            'user_id'     => $userid,
            'description' => $diskripsi,
        ]);
    }

    public function delsoalset(int $id, int $userid)
    {
        return $this->where('user_id', $userid)->where('idSoalSet', $id)->delete();
    }
    public function delsoalsetadmin(int $id)
    {
        return $this->delete($id);
    }
}
