<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Auth extends BaseController
{
    protected $userModel;
    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function index()
    {
        return view('auth/index');
    }

    public function validation()
    {
        $var = $this->request->getVar();
        $where = [
            'username'          => $var['username'],
            'password'          => md5($var['password']),
        ];
        $cek = $this->userModel->where($where)->first();
        if ($cek) {
            $newdata = [
                'session_login'             => true,
                'session_id'                => $cek->id,
                'session_username'          => $cek->username,
                'session_display'           => $cek->display,
            ];

            session()->set($newdata);
            return redirect()->to('home')->with('success', "Selamat Datang $cek->display");
        } else {
            return redirect()->back()->withInput()->with('error', 'Username Atau Password Anda Tidak Sesuai');
        }
    }

    function logout()
    {
        $sesi = [
            'session_login',
            'session_id',
            'session_username',
            'session_display',
        ];
        session()->remove($sesi);
        return redirect()->to('auth')->with('success', 'terimakasih');
    }
}
