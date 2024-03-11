<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DesaModel;
use App\Models\GisModel;
use App\Models\KecamatanModel;

class GisController extends BaseController
{
    protected $modelPeta;
    protected $kecamatanModel;
    protected $desaModel;
    public function __construct()
    {
        $this->modelPeta = new GisModel();
        $this->kecamatanModel = new KecamatanModel();
        $this->desaModel = new DesaModel();
    }

    public function index()
    {
        $data = [
            'active'    => 'master-map',
            'map'       => $this->modelPeta
                ->join('kecamatan', 'kecamatan.kode_kecamatan = peta.kecamatan')
                ->join('desa', 'desa.kode_desa = peta.desa')
                ->findAll()
        ];
        $this->temp->render('gis/index', $data);
    }

    public function map()
    {
        $data = [
            'active'    => 'map',
            'select'    => '',
            'desa'      => $this->desaModel->findAll(),
        ];
        $this->temp->render('gis/map', $data);
    }

    function add()
    {
        $data = [
            'active'        => 'master-map',
            'kecamatan'     => $this->kecamatanModel->findAll(),
            'validation'    => session('validation')
        ];
        $this->temp->render('gis/form', $data);
    }

    function save()
    {
        $var = $this->request->getVar();
        $gambar = $this->request->getFile('gambar');

        if ($gambar->getName() != "") {
            $rule = [
                'gambar' => [
                    'label' => 'gambar Lokasi',
                    'rules' => [
                        'is_image[gambar]',
                        'max_size[gambar,2024]',
                        'mime_in[gambar,image/jpg,image/jpeg,image/gif,image/png,image/webp]',
                    ],
                    'errors' => [
                        'is_image'  => 'File Lokasi Harus Berupa Gambar',
                        'max_size'  => 'Maksimal File Yang Diijinkan Adalah 2MB',
                        'mime_in'   => 'File Lokasi Harus Berupa Gambar',
                    ]
                ],
            ];
            if (!$this->validate($rule)) {
                return redirect()->back()->withInput()->with('validation', $this->validation->getErrors());
            }

            $img = $this->request->getFile('gambar');
            $newName = $img->getRandomName();
            $path = 'uploads/map/';
            if (!is_dir($path)) {
                mkdir($path, 0777, true);
            }

            $var['gambar'] = $newName;
            //pindah Image Ke path Yang sudah Benar
            $img->move($path, $newName);

            //hapus old image
            if ($var['id']) {
                $gambar = $this->modelPeta->where('id', $var['id'])->first();
                $path = './' . PATHUPLOADMAP . $gambar->gambar;
                if (file_exists($path) && $gambar->gambar != null) {
                    unlink($path);
                }
            }
        }
        $this->modelPeta->save($var);
        return redirect()->to('gis')->with('success', 'Data RTLH berhasil disimpan');
    }

    function delete()
    {
        $var = $this->request->getVar();
        //cari file
        $gambar = $this->modelPeta->where('id', $var['id'])->first();
        $path = './' . PATHUPLOADMAP . $gambar->gambar;
        if (file_exists($path) && $gambar->gambar != null) {
            unlink($path);
        }

        $this->modelPeta->where('id', $var['id'])->delete();
        return redirect()->to('gis')->with('success', 'Data RTLH berhasil dihapus');
    }

    function edit($id)
    {
        $datapeta = $this->modelPeta->where('id', $id)->first();

        $data = [
            'active'        => 'master-map',
            'validation'    => session('validation'),
            'kecamatan'     => $this->kecamatanModel->findAll(),
            'desa'          => $this->desaModel->where('kode_desa', $datapeta->desa)->find(),
            'map'           => $this->modelPeta->where('id', $id)->first()
        ];
        // dd($data);
        $this->temp->render('gis/form', $data);
    }

    function cariLokasi()
    {
        $var = $this->request->getVar();
        //cari data sesuai
        $data = $this->modelPeta
            ->join('kecamatan', 'kecamatan.kode_kecamatan = peta.kecamatan')
            ->join('desa', 'desa.kode_desa = peta.desa');
        if ($var->nama_lokasi) {
            $data =
                $data->where('nama_lokasi', $var->nama_lokasi);
        }

        if ($var->desa) {
            $data = $data->Where('desa', $var->desa);
        }
        $data = $data->find();

        if (!$data) {
            //jika data kosong maka cari data yang menyerupai
            $data = $this->modelPeta
                ->join('kecamatan', 'kecamatan.kode_kecamatan = peta.kecamatan')
                ->join('desa', 'desa.kode_desa = peta.desa')
                ->like('nama_lokasi', $var->nama_lokasi);
            if ($var->desa) {
                $data = $data->where('desa', $var->desa);
            }
            $data = $data->find();
        }

        /* Table */
        $table = $this->_tableLokasi($data);

        return $this->response->setJSON([
            'lokasi'        => $data,
            'table'         => $table,
        ]);
    }

    private function _tableLokasi($data)
    {
        $html = '';
        $no = 1;
        foreach ($data as $d) {
            $img = base_url('assets/img/default-map.jpg');
            if ($d->gambar) {
                $img = base_url('uploads/map/' . $d->gambar);
            }
            $html .= '<tr onclick="modalDetail(this)" data-id="' . $d->id . '" style="cursor: pointer;">';
            $html .= '<td class="p-1 text-center">' . $no++ . '</td>';
            $html .= '<td class="text-center p-1"><img src="' . $img . '" alt="" class="w-100" style="max-width: 100px;"></td>';
            $html .= '<td class="text-center p-1">' . $d->nik . '</td>';
            $html .= '<td class="text-center p-1">' . $d->kk . '</td>';
            $html .= '<td class="text-center p-1">' . $d->nama_lokasi . '</td>';
            $html .= '<td class="text-center p-1">' . $d->nama_desa . '</td>';
            $html .= '<td class="text-center p-1">' . $d->nama_kecamatan . '</td>';
            $html .= '<td class="text-center p-1">' . $d->status_tanah . '</td>';
            $html .= '<td class="text-center p-1">' . $d->bukti_kepemilikan . '</td>';
            $html .= '<td class="text-center p-1">' . $d->status_rumah . '</td>';
            $html .= '</tr>';
        }
        return $html;
    }

    function detailLokasi()
    {
        $var = $this->request->getVar();
        $data = $this->modelPeta
            ->join('kecamatan', 'kecamatan.kode_kecamatan = peta.kecamatan')
            ->join('desa', 'desa.kode_desa = peta.desa')
            ->where('id', $var['id'])
            ->first();
        return $this->response->setJSON($data);
    }

    /* AJAX */
    function ajaxMap()
    {
        $data =  $this->modelPeta->findAll();
        return $this->response->setStatusCode(200)->setJSON($data);
    }

    function ajaxMapDetil($id)
    {
        $data =  $this->modelPeta->where('id', $id)->first();
        return $this->response->setStatusCode(200)->setJSON($data);
    }

    function ajaxGetDesa($kode_kecamatan)
    {
        $data =  $this->desaModel->where('kode_kecamatan', $kode_kecamatan)->find();
        return $this->response->setStatusCode(200)->setJSON($data);
    }
}
