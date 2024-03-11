<?php

namespace App\Models;

use CodeIgniter\Model;

class DesaModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'desa';
    protected $primaryKey       = 'id_desa';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $allowedFields    = [];
}
