<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Pengaduan_m;

class Pengaduan extends BaseController
{
    protected $pejabatModel;

    public function __construct()
    {
        $this->pengaduanModel = new Pengaduan_m();
    }

    public function index()
    {
        $data = [
            'title' => 'Pengaduan',
            'pengaduan' => $this->pengaduanModel->findAll()
        ];

        // return view('admin/slider/index', $data);
        return $this->renderPageAdmin('pageadmin/pengaduan/data', $data);
    }

    public function create()
    {
        $data['pejabat'] = $this->pejabatModel->getEnumValues('jabatan');
        return $this->renderPageAdmin('pageadmin/pejabat/tambah', $data);
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
            $file->move('uploads/pejabat/', $gambarName);
        }

        $this->pejabatModel->save([
            'nama' => $this->request->getPost('nama'),
            'jabatan' => $this->request->getPost('jabatan'),
            'detail' => $this->request->getPost('detail'),
            'gambar' => $gambarName,
        ]);

        return redirect()->to('/admin/pejabat')->with('success', 'Pejabat berhasil ditambahkan.');
    }

    public function lihat($id)
    {
        // $slider = $this->sliderModel->find($id);
        $segment4 = $this->request->getUri()->getSegment(4);
        $data = [
            'title' => 'Pengaduan',
            'pengaduan' => $this->pengaduanModel->find($id),
            'segment4' => $segment4,
        ];
        return $this->renderPageAdmin('pageadmin/pengaduan/lihat', $data);
    }

    public function edit($id)
    {
        // $slider = $this->sliderModel->find($id);
        $segment4 = $this->request->getUri()->getSegment(4);
        $data = [
            'title' => 'Pejabat',
            'pejabat' => $this->pejabatModel->find($id),
            'jabatan' => $this->pejabatModel->getEnumValues('jabatan'),
            'segment4' => $segment4,
        ];
        return $this->renderPageAdmin('pageadmin/pejabat/edit', $data);
    }

    public function update($id)
    {
        $pejabat = $this->pejabatModel->find($id);
        $file = $this->request->getFile('gambar');
        $gambarName = $pejabat['gambar'];

        if ($file && $file->isValid() && !$file->hasMoved()) {
            if ($file->getSize() > 5 * 1024 * 1024) {
                return redirect()->back()->with('error', 'Ukuran gambar maksimal 5MB');
            }

            $gambarName = $file->getRandomName();
            $file->move('uploads/pejabat/', $gambarName);

            // Hapus gambar lama jika ada
            if ($pejabat['gambar'] && file_exists('uploads/pejabat/' . $pejabat['gambar'])) {
                unlink('uploads/pejabat/' . $pejabat['gambar']);
            }
        }

        $this->pejabatModel->update($id, [
            'nama' => $this->request->getPost('nama'),
            'jabatan' => $this->request->getPost('jabatan'),
            'detail' => $this->request->getPost('detail'),
            'gambar' => $gambarName,
        ]);

        return redirect()->to('/admin/pejabat')->with('success', 'Pejabat berhasil diupdate.');
    }

    public function delete($id)
    {
        $pengaduan = $this->pengaduanModel->find($id);

        $this->pengaduanModel->delete($id);
        return redirect()->to('/admin/pengaduan')->with('success', 'Pengaduan berhasil dihapus.');
        
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
