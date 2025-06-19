<?php

function check_not_login()
{
    $session = session();
    if (!$session->get('isLoggedIn')) {
        return redirect()->to('/admin')->send(); // ke login
    }
}

function tanggal_indo($tanggal)
{
    $bulan = [
        1 => 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
        'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
    ];

    $tanggal = date('Y-m-d', strtotime($tanggal));
    $parts = explode('-', $tanggal);

    return (int)$parts[2] . ' ' . $bulan[(int)$parts[1]] . ' ' . $parts[0];
}
