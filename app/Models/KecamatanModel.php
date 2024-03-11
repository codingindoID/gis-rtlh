<?php

namespace App\Models;

use CodeIgniter\Model;

class KecamatanModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'kecamatan';
    protected $primaryKey       = 'id_kecamatan';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $allowedFields    = [];
}
