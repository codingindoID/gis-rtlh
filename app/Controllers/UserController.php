<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class UserController extends BaseController
{
    protected $userModel;
    public function __construct()
    {
        $this->userModel = new UserModel();
    }
    public function index()
    {
        $data = [
            'active'        => 'master-user',
            'users'         => $this->userModel->findAll()
        ];
        $this->temp->render('user/index', $data);
    }

    public function add()
    {
        $data = [
            'active'        => 'master-user',
            'validation'    => session('validation')
        ];
        $this->temp->render('user/form', $data);
    }

    public function edit($id)
    {
        $data = [
            'active'        => 'master-user',
            'user'          => $this->userModel->where('id', $id)->first(),
            'validation'    => session('validation')
        ];
        $this->temp->render('user/form', $data);
    }

    function save()
    {
        $this->_saveDataUser();
        return redirect()->to('users')->with('success', 'Data Pengguna Berhasil Disimpan');
    }

    function updatePassword()
    {
        $var = $this->request->getVar();
        $rules['password'] = [
            'rules'     => 'required',
            'errors'    => [
                'required'                  => 'Password Wajib Diisi',
            ]
        ];
        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('validation', $this->validation->getErrors());
        }

        $var['password'] = md5($var['password']);
        $this->userModel->save($var);
        return redirect()->back()->with('success', 'Data Pengguna Berhasil Disimpan');
    }

    function deleteUser()
    {
        $var = $this->request->getVar();
        $this->userModel->where('id', $var['id'])->delete();
        return redirect()->back()->with('success', 'Data Pengguna Berhasil Dihapus');
    }

    function profile()
    {
        $data = [
            'active'        => 'profile',
            'validation'    => session('validation'),
            'profile'       => $this->userModel->where('id', session('session_id'))->first()
        ];
        $this->temp->render('user/profile', $data);
    }

    function saveDataProfile()
    {
        $this->_saveDataUser();
        return redirect()->back()->with('success', 'Data Pengguna Berhasil Disimpan');
    }

    /* save data User */
    private function _saveDataUser()
    {
        $var = $this->request->getVar();

        //cek username
        $stringRules = '';
        $original = $this->userModel->where('username', $var['username'])->first();
        if ($original) {
            $stringRules = !$var['id'] ? '|is_unique[users.username]' : ($original->id != $var['id'] ? '|is_unique[users.username]' : '');
        }

        $rules =  [
            'username' => [
                'rules'     => 'required' . $stringRules,
                'errors' => [
                    'required'  => 'Username Wajib Diisi',
                    'is_unique' => 'Username Telah Digunakan',
                ],
            ],
            'display' => [
                'rules'     => 'required',
                'errors' => [
                    'required'                  => 'Display Name Wajib Diisi',
                ],
            ]
        ];


        if (!$var['id']) {
            $rules['password'] = [
                'rules'     => 'required',
                'errors'    => [
                    'required'                  => 'Password Wajib Diisi',
                ]
            ];
            $var['password'] = md5($var['password']);
        }

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('validation', $this->validation->getErrors());
        }
        $this->userModel->save($var);
    }
}
