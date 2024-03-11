<?php

namespace App\Libraries;

class Temp
{
    public function render($view = "", $data = array())
    {
        echo view('template/atas', $data);
        echo view($view, $data);
        echo view('template/bawah', $data);
    }
}
