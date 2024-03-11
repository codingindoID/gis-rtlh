<?php

namespace App\Models;

use CodeIgniter\Model;

class GisModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'peta';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['longitude', 'latitude', 'keterangan', 'nama_lokasi', 'gambar', 'desa', 'kecamatan', 'tahun', 'luas_rumah', 'status', 'alamat', 'nik', 'kk', 'trmpat_lahir', 'tanggal_lahir', 'status_tanah', 'bukti_kepemilikan', 'status_rumah'];
}
