<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Pengumuman_m;

class Pengumuman extends BaseController
{
    protected $pengumumanModel;

    public function __construct()
    {
        $this->pengumumanModel = new Pengumuman_m();
    }

    public function index()
    {
        $data = [
            'title' => 'Pengumuman',
            'pengumuman' => $this->pengumumanModel->findAll()
        ];

        // return view('admin/slider/index', $data);
        return $this->renderPageAdmin('pageadmin/pengumuman/data', $data);
    }

    public function create()
    {
        $data['pengumuman'] = $this->pengumumanModel->getEnumValues('status');
        return $this->renderPageAdmin('pageadmin/pengumuman/tambah', $data);
    }

    public function store()
    {
        $file = $this->request->getFile('gambar');
        $gambarName = '';

        if ($file && $file->isValid() && !$file->hasMoved()) {
            if ($file->getSize() > 5 * 1024 * 1024) {
                return redirect()->back()->with('error', 'Ukuran gambar maksimal 5MB');
            }

            $gambarName = $file->getRandomName();
            $file->move('uploads/pengumuman/', $gambarName);
        }

        $this->pengumumanModel->save([
            'judul' => $this->request->getPost('judul'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'status' => $this->request->getPost('status'),
            'yt' => $this->request->getPost('yt'),
            'gambar' => $gambarName,
        ]);

        return redirect()->to('/admin/pengumuman')->with('success', 'Pengumuman berhasil ditambahkan.');
    }

    public function edit($id)
    {
        // $slider = $this->sliderModel->find($id);
        $segment4 = $this->request->getUri()->getSegment(4);
        $data = [
            'title' => 'Pengumuman',
            'pengumuman' => $this->pengumumanModel->find($id),
            'status' => $this->pengumumanModel->getEnumValues('status'),
            'segment4' => $segment4,
        ];
        return $this->renderPageAdmin('pageadmin/pengumuman/edit', $data);
    }

    public function update($id)
    {
        $pengumuman = $this->pengumumanModel->find($id);
        $file = $this->request->getFile('gambar');
        $gambarName = $pengumuman['gambar'];

        if ($file && $file->isValid() && !$file->hasMoved()) {
            if ($file->getSize() > 5 * 1024 * 1024) {
                return redirect()->back()->with('error', 'Ukuran gambar maksimal 5MB');
            }

            $gambarName = $file->getRandomName();
            $file->move('uploads/pengumuman/', $gambarName);

            // Hapus gambar lama jika ada
            if ($pengumuman['gambar'] && file_exists('uploads/pengumuman/' . $pengumuman['gambar'])) {
                unlink('uploads/pengumuman/' . $pengumuman['gambar']);
            }
        }

        $this->pengumumanModel->update($id, [
            'judul' => $this->request->getPost('judul'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'status' => $this->request->getPost('status'),
            'gambar' => $gambarName,
            'yt' => $this->request->getPost('yt'),
        ]);

        return redirect()->to('/admin/pengumuman')->with('success', 'Pengumuman berhasil diupdate.');
    }

    public function delete($id)
    {
        $pengumuman = $this->pengumumanModel->find($id);
        if ($pengumuman && !empty($pengumuman['gambar']) && file_exists('uploads/pengumuman/' . $pengumuman['gambar'])) {
            unlink('uploads/pengumuman/' . $pengumuman['gambar']);
        }

        $this->pengumumanModel->delete($id);
        return redirect()->to('/admin/pengumuman')->with('success', 'Pengumuman berhasil dihapus.');
        //  Kembalikan JSON agar cocok dengan AJAX
        // return $this->response->setJSON(['status' => 'success']);
        
    }

    public function deletePengumuman($id)
    {
        $post = $this->pengumumanModel->find($id);
        if ($post && !empty($post['gambar'])) {
            $path = FCPATH . 'uploads/pengumuman/' . $post['gambar'];
            if (file_exists($path)) {
                unlink($path);
            }

            $this->pengumumanModel->update($id, ['gambar' => null]);
            return $this->response->setJSON(['status' => 'success']);
        }

        return $this->response->setStatusCode(400)->setJSON(['status' => 'error']);
    }
}
