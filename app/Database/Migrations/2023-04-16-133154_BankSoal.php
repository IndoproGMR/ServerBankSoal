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
            'NamaMapel'  => ['type' => 'varchar', 'constraint' => 255],
            'description' => ['type' => 'varchar', 'constraint' => 255],
        ];
        $this->forge->addField($fields);
        $this->forge->addKey($idd, true);
        $this->forge->createTable("BS_$tablee", true);

        // !JenisReport
        // $tablee = "JenisReport";
        // $idd = "id$tablee";
        // $fields = [
        //     $idd          => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
        //     'JenisReport'  => ['type' => 'varchar', 'constraint' => 255],
        //     'description' => ['type' => 'varchar', 'constraint' => 255],
        // ];
        // $this->forge->addField($fields);
        // $this->forge->addKey($idd, true);
        // $this->forge->createTable("BS_$tablee", true);

        // !lvlApi
        $tablee = "lvlApi";
        $idd = "id$tablee";
        $fields = [
            $idd          => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'lvlApi'  => ['type' => 'varchar', 'constraint' => 255],
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
        $this->forge->addKey('codeApiToken', false, true);
        $this->forge->addForeignKey('Apilvl_id', 'BS_lvlApi', 'idlvlApi', '', 'CASCADE');
        $this->forge->addForeignKey('user_id', 'users', 'id', '', 'CASCADE');
        $this->forge->createTable("BS_$tablee", true);

        // !SoalSet
        $tablee = "SoalSet";
        $idd = "id$tablee";
        $fields = [
            $idd          => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'codeSoalSet' => ['type' => 'varchar', 'constraint' => 8],
            'user_id'     => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'default' => 0],
            'description' => ['type' => 'varchar', 'constraint' => 255],
            'edited'      => ['type' => 'tinyint', 'constraint' => 1, 'null' => 0, 'default' => 0],
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
            'Pertanyaan_Soal'  => ['type' => 'text'],
            'Penjelasan_Soal'  => ['type' => 'text'],
            'Jawaban_Benar'    => ['type' => 'varchar', 'constraint' => 255],
            'Jawaban_salah1'   => ['type' => 'varchar', 'constraint' => 255],
            'Jawaban_salah2'   => ['type' => 'varchar', 'constraint' => 255],
            'Jawaban_salah3'   => ['type' => 'varchar', 'constraint' => 255],
            'lvlsoal'          => ['type' => 'tinyint', 'constraint' => 2, 'default' => 1],
            'valid'            => ['type' => 'tinyint', 'constraint' => 1, 'null' => 0, 'default' => 0],
            'edited'           => ['type' => 'tinyint', 'constraint' => 1, 'null' => 0, 'default' => 0],
            'user_id'          => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'default' => 0],
            'Mapel_id'         => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'default' => 0],
            'Bahasa_id'        => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'default' => 0],
            'SoalSet_id'       => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'default' => 0],
            'TimeStamp'        => ['type' => 'int', 'constraint' => 12],
        ];
        $this->forge->addField($fields);
        $this->forge->addKey($idd, true);
        $this->forge->addForeignKey('user_id', 'users', 'id', '', 'CASCADE');
        $this->forge->addForeignKey('Mapel_id', 'BS_Mapel', 'idMapel', '', 'CASCADE');
        $this->forge->addForeignKey('Bahasa_id', 'BS_Bahasa', 'idBahasa', '', 'CASCADE');
        $this->forge->addForeignKey('SoalSet_id', 'BS_SoalSet', 'idSoalSet', '', 'CASCADE');
        $this->forge->createTable("BS_$tablee", true);

        // !EditedSoalsoallog
        $tablee = "EditedSoalsoallog";
        $idd = "id$tablee";
        $fields = [
            $idd              => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'TimeStamp'       => ['type' => 'int', 'constraint' => 12],
            'who_id'          => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'default' => 0],
            'SoalSoal_id'     => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'default' => 0],
            'NewSoalSoal_id'  => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'default' => 0],
        ];
        $this->forge->addField($fields);
        $this->forge->addKey($idd, true);
        $this->forge->addForeignKey('SoalSoal_id', 'BS_SoalSoal', 'idSoalSoal', '', 'CASCADE');
        $this->forge->addForeignKey('NewSoalSoal_id', 'BS_SoalSoal', 'idSoalSoal', '', 'CASCADE');
        $this->forge->addForeignKey('who_id', 'users', 'id', '', 'CASCADE');
        $this->forge->createTable("BS_$tablee", true);

        // !EditedSoalsetlog
        $tablee = "EditedSoalsetlog";
        $idd = "id$tablee";
        $fields = [
            $idd              => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'TimeStamp'       => ['type' => 'int', 'constraint' => 12],
            'who_id'          => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'default' => 0],
            'Soalset_id'     => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'default' => 0],
            'NewSoalset_id'  => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'default' => 0],
        ];
        $this->forge->addField($fields);
        $this->forge->addKey($idd, true);
        $this->forge->addForeignKey('Soalset_id', 'BS_SoalSet', 'idSoalSet', '', 'CASCADE');
        $this->forge->addForeignKey('NewSoalset_id', 'BS_SoalSet', 'idSoalSet', '', 'CASCADE');
        $this->forge->addForeignKey('who_id', 'users', 'id', '', 'CASCADE');
        $this->forge->createTable("BS_$tablee", true);
    }

    public function down()
    {
        $this->forge->dropTable('BS_Bahasa', true);
        $this->forge->dropTable('BS_Mapel', true);
        // $this->forge->dropTable('BS_JenisReport', true);
        $this->forge->dropTable('BS_lvlApi', true);
        $this->forge->dropTable('BS_ApiToken', true);
        $this->forge->dropTable('BS_SoalSet', true);
        $this->forge->dropTable('BS_SoalSoal', true);
        $this->forge->dropTable('BS_EditedSoallog', true);
        // $this->forge->dropTable('BS_', true);
        // $this->forge->dropTable('BS_', true);
    }
}
