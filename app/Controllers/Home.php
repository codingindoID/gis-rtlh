<?php

namespace App\Controllers;

use App\Models\GisModel;
use App\Models\UserModel;

class Home extends BaseController
{
    protected $modelPeta;
    protected $userModel;
    public function __construct()
    {
        $this->modelPeta = new GisModel();
        $this->userModel = new UserModel();
    }

    public function index()
    {
        $data = [
            'active'        => 'dashboard',
            'countrtlh'     => $this->modelPeta->countAllResults(),
            'countuser'     => $this->userModel->countAllResults(),
            'gis'           => $this->_dataGisKecamatan()
        ];
        $this->temp->render('home/index', $data);
    }

    private function _dataGisKecamatan()
    {
        $data = $this->modelPeta
            ->select('kode_kecamatan,nama_kecamatan, COUNT(kode_kecamatan) as total')
            ->join('kecamatan', 'kecamatan.kode_kecamatan = peta.kecamatan')
            ->groupBy('kode_kecamatan')
            ->findAll();
        return $data;
    }
}
