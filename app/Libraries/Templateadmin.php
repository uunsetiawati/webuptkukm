<?php

namespace App\Libraries;

class Templateadmin
{
    protected $ci;

    public function __construct()
    {
        // Tidak diperlukan di CI4, tidak ada get_instance()
    }

    public function view($view, $data = [])
    {
        echo view('template/header', $data);
        echo view('template/sidebar', $data);
        echo view($view, $data);
        echo view('template/footer', $data);
    }
}