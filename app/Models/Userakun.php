<?php

namespace App\Models;

use CodeIgniter\Model;

class Userakun extends Model
{
    // protected $DBGroup          = 'default';
    protected $table            = 'User';
    protected $primaryKey       = 'idUser';
    protected $useAutoIncrement = true;
    // protected $insertID         = 0;
    // protected $returnType       = 'array';
    // protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['UserName', 'Email', 'password', 'timestamp', 'register', 'idRole'];
}
