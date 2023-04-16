<?php

namespace App\Models;

use CodeIgniter\Model;

class Pendreg extends Model
{
    // protected $DBGroup          = 'default';
    protected $table            = 'PendReg';
    protected $primaryKey       = 'idPendReg';
    protected $useAutoIncrement = true;
    // protected $insertID         = 0;
    // protected $returnType       = 'array';
    // protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['Email', 'Code', 'exp', 'TimeStamp'];
}
