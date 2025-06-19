<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Slider_m;

class Slider extends BaseController
{
    protected $sliderModel;

    public function __construct()
    {
        $this->sliderModel = new Slider_m();
    }

    public function index()
    {
        $data = [
            'title' => 'Slider',
            'slider' => $this->sliderModel->findAll()
        ];

        // return view('admin/slider/index', $data);
        return $this->renderPageAdmin('pageadmin/slider/data', $data);
    }

    public function create()
    {
        $data['status'] = $this->sliderModel->getEnumValues('status');
        return $this->renderPageAdmin('pageadmin/slider/tambah', $data);
    }

    public function store()
    {
        $file = $this->request->getFile('gambar');
        $gambarName = '';

        if ($file && $file->isValid() && !$file->hasMoved()) {
            if ($file->getSize() > 5 * 1024 * 1024) {
                return redirect()->back()->with('error', 'Ukuran gambar maksimal 10MB');
            }

            $gambarName = $file->getRandomName();
            $file->move('uploads/slider/', $gambarName);
        }

        $this->sliderModel->save([
            'judul' => $this->request->getPost('judul'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'status' => $this->request->getPost('status'),
            'gambar' => $gambarName,
        ]);

        return redirect()->to('/admin/slider')->with('success', 'Slider berhasil ditambahkan.');
    }

    public function edit($id)
    {
        // $slider = $this->sliderModel->find($id);
        $segment4 = $this->request->getUri()->getSegment(4);
        $data = [
            'title' => 'Slider',
            'nama' => 'Pengunjung',
            'slider' => $this->sliderModel->find($id),
            'status' => $this->sliderModel->getEnumValues('status'),
            'segment4' => $segment4,
        ];
        return $this->renderPageAdmin('pageadmin/slider/edit', $data);
    }

    public function update($id)
    {
        $slider = $this->sliderModel->find($id);
        $file = $this->request->getFile('gambar');
        $gambarName = $slider['gambar'];

        if ($file && $file->isValid() && !$file->hasMoved()) {
            if ($file->getSize() > 5 * 1024 * 1024) {
                return redirect()->back()->with('error', 'Ukuran gambar maksimal 5MB');
            }

            $gambarName = $file->getRandomName();
            $file->move('uploads/slider/', $gambarName);

            // Hapus gambar lama jika ada
            if ($slider['gambar'] && file_exists('uploads/slider/' . $slider['gambar'])) {
                unlink('uploads/slider/' . $slider['gambar']);
            }
        }

        $this->sliderModel->update($id, [
            'judul' => $this->request->getPost('judul'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'status' => $this->request->getPost('status'),
            'gambar' => $gambarName,
        ]);

        return redirect()->to('/admin/slider')->with('success', 'Slider berhasil diupdate.');
        // return redirect()->to('/admin/slider');
    }

    public function delete($id)
    {
        $slider = $this->sliderModel->find($id);
        if ($slider && !empty($slider['gambar']) && file_exists('uploads/slider/' . $slider['gambar'])) {
            unlink('uploads/slider/' . $slider['gambar']);
        }

        $this->sliderModel->delete($id);
        // return redirect()->to('/admin/slider')->with('success', 'Slider berhasil dihapus.');
        //  Kembalikan JSON agar cocok dengan AJAX
        return $this->response->setJSON(['status' => 'success']);
        
    }

    public function deleteSlider($id)
    {
        $post = $this->sliderModel->find($id);
        if ($post && !empty($post['gambar'])) {
            $path = FCPATH . 'uploads/slider/' . $post['gambar'];
            if (file_exists($path)) {
                unlink($path);
            }

            $this->sliderModel->update($id, ['gambar' => null]);
            return $this->response->setJSON(['status' => 'success']);
        }

        return $this->response->setStatusCode(400)->setJSON(['status' => 'error']);
    }
}
