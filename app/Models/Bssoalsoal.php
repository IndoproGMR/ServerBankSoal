<?php

namespace App\Models;

use CodeIgniter\Model;

class Bssoalsoal extends Model
{
    // protected $DBGroup          = 'default';
    protected $table            = 'BS_SoalSoal';
    protected $primaryKey       = 'idSoalSoal';
    protected $useAutoIncrement = true;
    // protected $insertID         = 0;
    // protected $returnType       = 'array';
    // protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'Pertanyaan_Soal',
        'Penjelasan_Soal',
        'Jawaban_Benar',
        'Jawaban_salah1',
        'Jawaban_salah2',
        'Jawaban_salah3',
        'lvlsoal',
        'valid',
        'edited',
        'user_id',
        'Mapel_id',
        'Bahasa_id',
        'SoalSet_id',
        'TimeStamp',
    ];

    public function addsoalsoal(
        String $soal,
        String $penjelasan,
        String $jawabanBenar,
        String $salah1,
        String $salah2,
        String $salah3,
        int $lvlsoal,
        int $valid,
        int $userid,
        int $mapelid,
        int $bahasaid,
        int $soalsetid,
        // int $timestamp,
    ) {
        return $this->db->table('BS_SoalSoal')->insert([
            'Pertanyaan_Soal' => $soal,
            'Penjelasan_Soal' => $penjelasan,
            'Jawaban_Benar'   => $jawabanBenar,
            'Jawaban_salah1'  => $salah1,
            'Jawaban_salah2'  => $salah2,
            'Jawaban_salah3'  => $salah3,
            'lvlsoal'         => $lvlsoal,
            'valid'           => $valid,
            'edited'          => 0,
            'user_id'         => $userid,
            'Mapel_id'        => $mapelid,
            'Bahasa_id'       => $bahasaid,
            'SoalSet_id'      => $soalsetid,
            'TimeStamp'       => time(),
        ]);
    }

    public function countdb()
    {
        return $this->countAllResults();
    }

    public function countdbbyuser(int $userid)
    {
        return $this->where('user_id', $userid)->countAllResults();
    }

    public function seeall()
    {
        return $this->find();
    }
}
