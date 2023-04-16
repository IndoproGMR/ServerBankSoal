<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class BankSoal extends Migration
{
    public function up()
    {
        // !bahasa
        $tablee = "Bahasa";
        $idd = "id$tablee";
        $fields = [
            $idd          => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'NamaBahasa'  => ['type' => 'varchar', 'constraint' => 255],
            'description' => ['type' => 'varchar', 'constraint' => 255],
        ];
        $this->forge->addField($fields);
        $this->forge->addKey($idd, true);
        $this->forge->createTable("BS_$tablee", true);

        // !Mapel
        $tablee = "Mapel";
        $idd = "id$tablee";
        $fields = [
            $idd          => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'NamaBahasa'  => ['type' => 'varchar', 'constraint' => 255],
            'description' => ['type' => 'varchar', 'constraint' => 255],
        ];
        $this->forge->addField($fields);
        $this->forge->addKey($idd, true);
        $this->forge->createTable("BS_$tablee", true);

        // !JenisReport
        $tablee = "JenisReport";
        $idd = "id$tablee";
        $fields = [
            $idd          => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'NamaBahasa'  => ['type' => 'varchar', 'constraint' => 255],
            'description' => ['type' => 'varchar', 'constraint' => 255],
        ];
        $this->forge->addField($fields);
        $this->forge->addKey($idd, true);
        $this->forge->createTable("BS_$tablee", true);

        // !lvlApi
        $tablee = "lvlApi";
        $idd = "id$tablee";
        $fields = [
            $idd          => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'NamaBahasa'  => ['type' => 'varchar', 'constraint' => 255],
            'description' => ['type' => 'varchar', 'constraint' => 255],
        ];
        $this->forge->addField($fields);
        $this->forge->addKey($idd, true);
        $this->forge->createTable("BS_$tablee", true);

        // !ApiToken
        $tablee = "ApiToken";
        $idd = "id$tablee";
        $fields = [
            $idd            => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'codeApiToken'  => ['type' => 'varchar', 'constraint' => 255],
            'user_id'       => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'default' => 0],
            'Apilvl_id'     => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'default' => 0],
        ];
        $this->forge->addField($fields);
        $this->forge->addKey($idd, true);
        $this->forge->addForeignKey('Apilvl_id', 'BS_lvlApi', 'idlvlApi', '', 'CASCADE');
        $this->forge->addForeignKey('user_id', 'users', 'id', '', 'CASCADE');
        $this->forge->createTable("BS_$tablee", true);

        // !SoalSet
        $tablee = "SoalSet";
        $idd = "id$tablee";
        $fields = [
            $idd            => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'codeSoalSet'  => ['type' => 'varchar', 'constraint' => 255],
            'user_id'       => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'default' => 0],
            'description' => ['type' => 'varchar', 'constraint' => 255],
        ];
        $this->forge->addField($fields);
        $this->forge->addKey($idd, true);
        $this->forge->addForeignKey('user_id', 'users', 'id', '', 'CASCADE');
        $this->forge->createTable("BS_$tablee", true);

        // !SoalSoal
        $tablee = "SoalSoal";
        $idd = "id$tablee";
        $fields = [
            $idd               => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'Pertanyaan_Soal'  => ['type' => 'varchar', 'constraint' => 255],
            'Jawaban_Benar'    => ['type' => 'varchar', 'constraint' => 255],
            'Jawaban_salah1'   => ['type' => 'varchar', 'constraint' => 255],
            'Jawaban_salah2'   => ['type' => 'varchar', 'constraint' => 255],
            'Jawaban_salah3'   => ['type' => 'varchar', 'constraint' => 255],
            'Penjelasan_Soal'  => ['type' => 'varchar', 'constraint' => 255],
            'TimeStamp'        => ['type' => 'int', 'constraint' => 12],
            'user_id'          => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'default' => 0],
            'Mapel_id'         => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'default' => 0],
            'Bahasa_id'        => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'default' => 0],
            'SoalSet_id'       => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'default' => 0],

        ];
        $this->forge->addField($fields);
        $this->forge->addKey($idd, true);
        $this->forge->addForeignKey('user_id', 'users', 'id', '', 'CASCADE');
        $this->forge->addForeignKey('Mapel_id', 'BS_Mapel', 'idMapel', '', 'CASCADE');
        $this->forge->addForeignKey('Bahasa_id', 'BS_Bahasa', 'idBahasa', '', 'CASCADE');
        $this->forge->addForeignKey('SoalSet_id', 'BS_SoalSet', 'idSoalSet', '', 'CASCADE');
        $this->forge->createTable("BS_$tablee", true);
    }

    public function down()
    {
        $this->forge->dropTable('BS_Bahasa', true);
        $this->forge->dropTable('BS_Mapel', true);
        $this->forge->dropTable('BS_JenisReport', true);
        $this->forge->dropTable('BS_lvlApi', true);
        $this->forge->dropTable('BS_ApiToken', true);
        $this->forge->dropTable('BS_SoalSet', true);
        $this->forge->dropTable('BS_SoalSoal', true);
        // $this->forge->dropTable('BS_', true);
        // $this->forge->dropTable('BS_', true);
    }
}
