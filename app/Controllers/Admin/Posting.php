<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Posting_m;

class Posting extends BaseController
{
    protected $postingModel;

    public function __construct()
    {
        $this->postingModel = new Posting_m();
        // check_not_login(); // Akan redirect jika belum login
    }

    public function index()
    {     
        // if (!session()->get('isLoggedIn')) {
        //     return redirect()->to('/admin');
        // }   

        $data['posting'] = $this->postingModel->findAll();
        // return view('pageadmin/posting/index', $data);        

        
        $data = [
            'title' => 'Posting',
            'nama' => 'Tambah Berita',
        ];
        $data['kategori'] = $this->postingModel->getEnumValues('kategori');
        $data['status'] = $this->postingModel->getEnumValues('status');
        $data['jenis'] = $this->postingModel->getEnumValues('jenis');
        return $this->renderPageAdmin('pageadmin/posting/tambah', $data);
    }

    public function data()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/admin');
        }   

        // $data['posting'] = $this->postingModel->findAll();
        $data = [
            'title' => 'Beranda',
            'nama' => 'Pengunjung',
            'posting' => $this->postingModel->orderBy('id', 'DESC')
                                            ->findAll(),
        ];
        return $this->renderPageAdmin('pageadmin/posting/data', $data);
    }

    public function create()
    {
        return view('pageadmin/posting/create');
    }

    public function store()
    {
        $validationRules = [
        'judul'     => 'required',
        'isi'       => 'required',
        'kategori'  => 'required',
        'status'    => 'required',
        'jenis'     => 'required',
        'thumbnail' => 'uploaded[thumbnail]|is_image[thumbnail]|max_size[thumbnail,5120]', // 10240 KB = 10MB
        ];

        if (!$this->validate($validationRules)) {
            return redirect()->back()->withInput()->with('error', implode(', ', $this->validator->getErrors()));
        }
        $file = $this->request->getFile('thumbnail');
        // ✅ Tambahkan pengecekan ukuran file di sini
        // if ($file && $file->isValid()) {
        //     if ($file->getSize() > 10 * 1024 * 1024) { // 10MB
        //         return redirect()->back()->with('error', 'Ukuran file terlalu besar (maksimal 10MB).');
        //     }
        // }
        $thumbnailName = '';

        if ($file && $file->isValid() && !$file->hasMoved()) {
            $thumbnailName = $file->getRandomName(); // atau gunakan nama asli: $file->getName()
            $file->move('uploads/thumbnails/', $thumbnailName);
        }
        // Cek apakah slug sudah ada
        $judul = $this->request->getPost('judul');
        $slug = url_title($judul, '-', true);
        $slugAsli = $slug;
        $counter = 1;

        while ($this->postingModel->where('slug', $slug)->first()) {
            $slug = $slugAsli . '-' . $counter++;
        }

        $this->postingModel->save([
            'judul'     => $this->request->getPost('judul'),
            // 'slug'      => url_title($this->request->getPost('judul'), '-', true),
            'slug'      => $slug,
            'isi'       => $this->request->getPost('isi'),
            'kategori'  => $this->request->getPost('kategori'),
            'penulis'   => session()->get('nama'),
            'status'    => $this->request->getPost('status'),
            'jenis'    => $this->request->getPost('jenis'),
            'thumbnail' => $thumbnailName,
        ]);

        return redirect()->to('/admin/posting/data');
    }

    public function edit($id)
    {
        // $data['posting'] = $this->postingModel->find($id);
        // return view('pageadmin/posting/edit', $data);
        $segment4 = $this->request->getUri()->getSegment(4);
        $data = [
            'title' => 'Beranda',
            'nama' => 'Pengunjung',
            'posting' => $this->postingModel->find($id),
            'kategori' => $this->postingModel->getEnumValues('kategori'),
            'status' => $this->postingModel->getEnumValues('status'),
            'jenis' => $this->postingModel->getEnumValues('jenis'),
            'segment4' => $segment4,

        ];
        
        return $this->renderPageAdmin('pageadmin/posting/edit', $data);
        
    }

    public function update($id)
    {
        $thumbnailFile = $this->request->getFile('thumbnail');
        $thumbnailLama = $this->request->getPost('thumbnail_lama');

        if ($thumbnailFile && $thumbnailFile->isValid() && !$thumbnailFile->hasMoved()) {
            $namaThumbnail = $thumbnailFile->getRandomName();
            $thumbnailFile->move('uploads/thumbnails', $namaThumbnail);

            // Hapus thumbnail lama jika ada
            if ($thumbnailLama && file_exists('uploads/thumbnails/' . $thumbnailLama)) {
                unlink('uploads/thumbnails/' . $thumbnailLama);
            }
        } else {
            // Jika tidak upload thumbnail baru, pakai yang lama
            $namaThumbnail = $thumbnailLama;
        }

        // Cek apakah slug sudah ada
        $judul = $this->request->getPost('judul');
        $slug = url_title($judul, '-', true);
        $slugAsli = $slug;
        $counter = 1;

        while ($this->postingModel->where('slug', $slug)->first()) {
            $slug = $slugAsli . '-' . $counter++;
        }

        $this->postingModel->update($id, [
            'judul' => $this->request->getPost('judul'),
            'slug'      => $slug,
            'isi' => $this->request->getPost('isi'),
            'kategori' => $this->request->getPost('kategori'),
            'jenis' => $this->request->getPost('jenis'),
            'penulis'   => session()->get('nama'),
            'status' => $this->request->getPost('status'),
            'thumbnail' => $namaThumbnail,
        ]);

        return redirect()->to('/admin/posting/data');
    }

    public function delete($id)
    {
        $posting = $this->postingModel->find($id);
        if ($posting && !empty($posting['thumbnail']) && file_exists('uploads/thumbnails/' . $posting['thumbnail'])) {
            unlink('uploads/thumbnails/' . $posting['thumbnail']);
        }

        $this->postingModel->delete($id);
        // return redirect()->to('/admin/slider')->with('success', 'Slider berhasil dihapus.');
        //  Kembalikan JSON agar cocok dengan AJAX
        return $this->response->setJSON(['status' => 'success']);
    }

    public function deleteThumbnail($id)
    {
        $post = $this->postingModel->find($id);
        if ($post && !empty($post['thumbnail'])) {
            $path = FCPATH . 'uploads/thumbnails/' . $post['thumbnail'];
            if (file_exists($path)) {
                unlink($path);
            }

            $this->postingModel->update($id, ['thumbnail' => null]);
            return $this->response->setJSON(['status' => 'success']);
        }

        return $this->response->setStatusCode(400)->setJSON(['status' => 'error']);
    }

}
