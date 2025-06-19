<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Pengaturan_m;

class Pengaturan extends BaseController
{
    protected $pengaturanModel;

    public function __construct()
    {
        $this->pengaturanModel = new Pengaturan_m();
    }

    public function index()
    {
        $data = [
            'title' => 'Pengaturan',
            'pengaturan' => $this->pengaturanModel->findAll()
        ];

        // return view('admin/slider/index', $data);
        return $this->renderPageAdmin('pageadmin/pengumuman/data', $data);
        $slider = $this->sliderModel->find($id);        
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
        $segment4 = 1;
        $data = [
            'title' => 'pengaturan',
            'pengaturan' => $this->pengaturanModel->find($id),
            'segment4' => $segment4,
        ];
        return $this->renderPageAdmin('pageadmin/pengaturan/edit', $data);
    }

    public function update($id)
    {
        $pengaturan = $this->pengaturanModel->find($id);
        $file = $this->request->getFile('gambar');
        $struktur = $this->request->getFile('struktur');
        $gambarName = $pengaturan['gambar'];
        $strukturName = $pengaturan['struktur'];
        $segment4 = 1;

        if ($file && $file->isValid() && !$file->hasMoved()) {
            if ($file->getSize() > 5 * 1024 * 1024) {
                return redirect()->back()->with('error', 'Ukuran gambar maksimal 5MB');
            }

            $gambarName = $file->getRandomName();
            $file->move('uploads/pengaturan/', $gambarName);

            // Hapus gambar lama jika ada
            if ($pengaturan['gambar'] && file_exists('uploads/pengaturan/' . $pengaturan['gambar'])) {
                unlink('uploads/pengaturan/' . $pengaturan['gambar']);
            }
        }

        if ($struktur && $struktur->isValid() && !$struktur->hasMoved()) {
            if ($struktur->getSize() > 5 * 1024 * 1024) {
                return redirect()->back()->with('error', 'Ukuran gambar maksimal 5MB');
            }

            $strukturName = $struktur->getRandomName();
            $struktur->move('uploads/pengaturan/struktur', $strukturName);

            // Hapus gambar lama jika ada
            if ($pengaturan['struktur'] && file_exists('uploads/pengaturan/struktur' . $pengaturan['struktur'])) {
                unlink('uploads/pengaturan/struktur' . $pengaturan['struktur']);
            }
        }

        $this->pengaturanModel->update($id, [
            'judul' => $this->request->getPost('judul'),
            'sejarah' => $this->request->getPost('sejarah'),
            'visi' => $this->request->getPost('visi'),
            'misi' => $this->request->getPost('misi'),
            'tu' => $this->request->getPost('tu'),
            'pengembangan' => $this->request->getPost('pengembangan'),
            'penyelenggara' => $this->request->getPost('penyelenggara'),
            'wi' => $this->request->getPost('wi'),
            'struktur' => $strukturName,
            'gambar' => $gambarName,
        ]);

        return redirect()->to('/admin/pengaturan/edit/'.$segment4)->with('success', 'Pengaturan berhasil diupdate.');
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

    public function deletePengaturan($id)
    {
        $post = $this->pengaturanModel->find($id);
        if ($post && !empty($post['gambar'])) {
            $path = FCPATH . 'uploads/pengaturan/' . $post['gambar'];
            if (file_exists($path)) {
                unlink($path);
            }

            $this->pengaturanModel->update($id, ['gambar' => null]);
            return $this->response->setJSON(['status' => 'success']);
        }

        return $this->response->setStatusCode(400)->setJSON(['status' => 'error']);
    }

    public function deleteStruktur($id)
    {
        $post = $this->pengaturanModel->find($id);
        if ($post && !empty($post['struktur'])) {
            $path = FCPATH . 'uploads/pengaturan/struktur/' . $post['struktur'];
            if (file_exists($path)) {
                unlink($path);
            }

            $this->pengaturanModel->update($id, ['struktur' => null]);
            return $this->response->setJSON(['status' => 'success']);
        }

        return $this->response->setStatusCode(400)->setJSON(['status' => 'error']);
    }
}
