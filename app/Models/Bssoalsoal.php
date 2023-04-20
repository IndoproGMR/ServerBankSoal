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
        'TimeStamp',
        'lvlsoal',
        'valid',
        'edited',
        'user_id',
        'Mapel_id',
        'Bahasa_id',
        'SoalSet_id'
    ];

    public function addsoalsoal(
        String $soal,
        String $penjelasan,
        String $jawabanBenar,
        String $salah1,
        String $salah2,
        String $salah3,
        int $timestamp,
        int $lvlsoal,
        int $valid,
        int $edited,
        int $userid,
        int $mapelid,
        int $bahasaid,
        int $soalsetid,
    ) {
        return $this->db->table('BS_SoalSoal')->insert([
            'Pertanyaan_Soal' => $soal,
            'Penjelasan_Soal' => $penjelasan,
            'Jawaban_Benar'   => $jawabanBenar,
            'Jawaban_salah1'  => $salah1,
            'Jawaban_salah2'  => $salah2,
            'Jawaban_salah3'  => $salah3,
            'TimeStamp'       => $timestamp,
            'lvlsoal'         => $lvlsoal,
            'valid'           => $valid,
            'edited'          => $edited,
            'user_id'         => $userid,
            'Mapel_id'        => $mapelid,
            'Bahasa_id'       => $bahasaid,
            'SoalSet_id'      => $soalsetid
        ]);
    }

    public function countdb()
    {
        return $this->countAllResults();
    }
    public function seeall()
    {
        return $this->find();
    }
}
