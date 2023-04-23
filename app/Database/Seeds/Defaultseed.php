<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Defaultseed extends Seeder
{
    public function run()
    {
        $data['bahasa'] = [
            [
                'idBahasa' => 1,
                'NamaBahasa' => 'none',
                'description' => 'tampah bahasa seperti persoalan matematika',
            ],
            [
                'idBahasa' => 2,
                'NamaBahasa' => 'ID',
                'description' => 'Bahasa Indonesia',
            ],
            [
                'idBahasa' => 3,
                'NamaBahasa' => 'ENGA',
                'description' => 'English American',
            ],
            [
                'idBahasa' => 4,
                'NamaBahasa' => 'ENGU',
                'description' => 'English UK',
            ]

        ];
        $data['mapel'] = [
            [
                'idMapel' => 1,
                'NamaMapel' => 'General',
                'description' => 'general'
            ],
            [
                'idMapel' => 2,
                'NamaMapel' => 'Matematika',
                'description' => 'Matematika'
            ],
            [
                'idMapel' => 3,
                'NamaMapel' => 'Bahasa Indonesia',
                'description' => 'Pembelajaran bahasa Indonesia'
            ],
            [
                'idMapel' => 4,
                'NamaMapel' => 'Bahasa English American',
                'description' => 'Pembelajaran bahasa English American'
            ],
            [
                'idMapel' => 5,
                'NamaMapel' => 'Bahasa English UK',
                'description' => 'Pembelajaran bahasa English British'
            ]
        ];
        $data['lvlapi'] = [
            [
                'idlvlApi' => 1,
                'lvlApi' => 'Standart',
                'description' => 'Free Lvl'
            ],
            [
                'idlvlApi' => 2,
                'lvlApi' => 'Standart 1',
                'description' => 'Donatur lvl 1'
            ]
        ];
        $data['grup'] = [
            [
                'id' => 1,
                'name' => 'default',
                'description' => 'user baru registrasi'
            ], [
                'id' => 2,
                'name' => 'admin',
                'description' => 'admin'
            ],
            [
                'id' => 3,
                'name' => 'validatorSoal',
                'description' => 'group validator soal soal yang masuk'
            ],
            [
                'id' => 4,
                'name' => 'Ban',
                'description' => 'Tidak dapat mengakses apapun'
            ]
        ];
        $data['perm'] = [
            [
                'id' => 1,
                'name' => 'C_Soal',
                'description' => 'Membuat Soal'
            ],
            [
                'id' => 2,
                'name' => 'U_Soal',
                'description' => 'mengaUpdate Soal'
            ],
            [
                'id' => 3,
                'name' => 'D_Soal',
                'description' => 'Menghapus Soal'
            ],
            [
                'id' => 4,
                'name' => 'Validasi_Soal',
                'description' => 'Memvalidasi Soal'
            ],
            [
                'id' => 5,
                'name' => 'C_SoalSet',
                'description' => 'Menghapus SoalSet'
            ],
            [
                'id' => 6,
                'name' => 'U_SoalSet',
                'description' => 'MengaUpdate SoalSet'
            ],
            [
                'id' => 7,
                'name' => 'D_SoalSet',
                'description' => 'MengaHapus SoalSet'
            ],
            [
                'id' => 8,
                'name' => 'CRUD_Grupperm',
                'description' => 'CRUD grupPermission'
            ],
        ];
        $data['grupperm'] = [
            // ! Admin
            [
                'group_id' => 2, // Admin
                'permission_id' => 7,
            ],
            [
                'group_id' => 2, // Admin
                'permission_id' => 8,
            ],
            // ! User
            [
                'group_id' => 1, // default
                'permission_id' => 1, // c_soal
            ],
            [
                'group_id' => 1, // default
                'permission_id' => 2, // u_soal
            ],
            [
                'group_id' => 1, // default
                'permission_id' => 5, // c_soalset
            ],
            [
                'group_id' => 1, // default
                'permission_id' => 6, // u_soalset
            ],
            // ! Validator
            [
                'group_id' => 3, // Validator
                'permission_id' => 3, // 
            ],
            [
                'group_id' => 3, // Validator
                'permission_id' => 4,
            ],
        ];

        $data['admin'] = [
            [
                'id' => 1,
                'email' => 'admin@admin.com',
                'username' => 'admin akun',
                'password_hash' => '$argon2id$v=19$m=2048,t=4,p=4$TWt5dEhlUHFLTDFobnZmWg$nuzQHUHoXpgsJEliWrJUcOD1htzQL1uQ5RGQICUjsvM',
                'active' => 1,
                'force_pass_reset' => 0,
                'created_at' => '2023-04-19 16:24:10',
                'updated_at' => '2023-04-19 16:25:03'
            ]
        ];
        $data['grup'] = [
            // !admin
            [
                'group_id' => 1,
                'user_id' => 1
            ],
            [
                'group_id' => 3,
                'user_id' => 1
            ],
            [
                'group_id' => 2,
                'user_id' => 1
            ],
        ];
        // $data[''] = [[], []];

        $this->db->table('BS_Bahasa')->insertBatch($data['bahasa']);
        $this->db->table('BS_Mapel')->insertBatch($data['mapel']);
        $this->db->table('BS_lvlApi')->insertBatch($data['lvlapi']);
        $this->db->table('auth_groups')->insertBatch($data['grup']);
        $this->db->table('auth_permissions')->insertBatch($data['perm']);
        $this->db->table('auth_groups_permissions')->insertBatch($data['grupperm']);
        $this->db->table('users')->insertBatch($data['admin']);
        $this->db->table('auth_groups_users')->insertBatch($data['grup']);
        // $this->db->table('auth_groups_permissions')->insertBatch($data['grupperm']);
    }
}
