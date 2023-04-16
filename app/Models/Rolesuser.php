<?php

namespace App\Models;

use CodeIgniter\Model;

class Rolesuser extends Model
{
    // protected $DBGroup          = 'default';
    protected $table            = 'Role';
    protected $primaryKey       = 'idRole';
    protected $useAutoIncrement = true;
    // protected $insertID         = 0;
    // protected $returnType       = 'array';
    // protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['NameRole', 'DiskripsiRole', 'CodeRole'];
}
