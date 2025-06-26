<?php

namespace App\Controllers;

use App\Models\User_m;
use App\Models\Posting_m;
use App\Models\Slider_m;
use App\Models\Pengumuman_m;
use App\Models\Pengaturan_m;
use App\Models\Pejabat_m;
use App\Models\Pengaduan_m;


class Home extends BaseController
{
    protected $postingModel;
    protected $sliderModel;
    protected $pengumumanModel;
    protected $pengaturanModel;
    protected $pejabatModel;
    protected $pengaduanModel;
    

    public function __construct()
    {
        $this->postingModel = new Posting_m();
        $this->sliderModel  = new Slider_m();
        $this->pengumumanModel  = new Pengumuman_m();
        $this->pengaturanModel  = new Pengaturan_m();
        $this->pejabatModel  = new Pejabat_m();
        $this->pengaduanModel  = new Pengaduan_m();
        //check_not_login(); // Akan redirect jika belum login
    }

    private function getAktifDesc($model) 
    {
        return $model->where('status', 'aktif')->orderBy('id', 'DESC')->findAll();
    }

    private function getAll($model) 
    {
        return $model->first();
    }
    
    private function getKetua($model) 
    {
        return $model->where('jabatan', 'kepala')->first();
    }

    private function getKasi($model) 
    {
        return $model->where('jabatan', 'kasi')->findAll();
    }

    public function index(): string
    {
        // $sliderPost = $this->sliderModel->where('status','aktif')
        //                                 ->orderBy('id', 'DESC')
        //                                 ->findAll();
        // $pengumumanPost = $this->pengumumanModel->where('status','aktif')
        //                                 ->orderBy('id', 'DESC')
        //                                 ->findAll();
        // $postingKoperasi = $this->postingModel
        //                                     ->where('id !=', $koperasiPost['id'])
        //                                     ->where([
        //                                     'jenis'=>'koperasi',
        //                                     'status'=>'publish',
        //                                     'kategori'=>'berita'])
        //                                     ->orderBy('id', 'DESC')
        //                                     ->findAll(4);
        // Ambil 1 postingan koperasi terbaru
        $koperasiPost = $this->getLatestPost('koperasi');
        $literasiPost = $this->getLatestPostKategori('Literasi KUKM');
        $penaPost = $this->getLatestPostKategori('Pena Pedia');
        $bilikPost = $this->postingModel->where(['status'=>'publish', 'kategori'=>'Bilik UMKM'])
                                        ->orderBy('id', 'DESC')
                                        ->findAll(4);
        

        // Ambil 4 postingan koperasi lain (kecuali yang pertama)
        $postingKoperasi = $this->getOtherPosts('koperasi', $koperasiPost['id'] ?? null);
        $postingPena = $this->getOtherPostsKategori('Pena Pedia', $penaPost['id'] ?? null, 2);

        // Ambil 4 postingan koperasi lain (kecuali yang pertama)
        // $postingKoperasi = $this->getPostGroup('koperasi', $koperasiPost['id'])->findAll(4);

        // Ambil 1 postingan ukm terbaru
        $ukmPost = $this->getLatestPost('ukm');

        // Ambil 4 postingan ukm lain (kecuali yang pertama koperasi—atau ukm seharusnya?)
        $postingUkm = $this->getOtherPosts('ukm', $ukmPost['id'] ?? null);
        $sliderPost = $this->getAktifDesc($this->sliderModel);
        $pengumumanPost = $this->getAktifDesc($this->pengumumanModel);

        $data = [
            'title' => 'Beranda',
            'nama' => 'Pengunjung',
            'posting' => $koperasiPost,
            'koperasi' => $postingKoperasi,
            'postingukm' => $ukmPost,
            'ukm' => $postingUkm,            
            'slider' => $sliderPost,
            'pengumuman' => $pengumumanPost,
            'literasi' => $literasiPost,
            'postingpena' => $penaPost,
            'pena' => $postingPena,
            'bilik' =>$bilikPost
        ];
        // echo $literasiPost['judul'];
        return $this->renderPage('home', $data);
    }

    // Fungsi bantu untuk mengambil 1 utama & 4 lainnya berdasarkan jenis
    private function getPostGroup($jenis, $excludeId = null)
    {
        $builder = $this->postingModel
                        ->where('jenis', $jenis)
                        ->where('status', 'publish')
                        ->where('kategori', 'berita');

        if ($excludeId !== null) {
            $builder->where('id !=', $excludeId);
        }

        return $builder->orderBy('id', 'DESC');
    }

    private function getLatestPostKategori($kategori)
    {
        return $this->postingModel
            ->where([
                'status' => 'publish',
                'kategori' => $kategori
            ])
            ->orderBy('id', 'DESC')
            ->first();
    }

    private function getOtherPostsKategori($kategori, $excludeId, $limit)
    {
        return $this->postingModel
            ->where('id !=', $excludeId)
            ->where([
                'status' => 'publish',
                'kategori' => $kategori
            ])
            ->orderBy('id', 'DESC')
            ->findAll($limit);
    }

    private function getLatestPost($jenis)
    {
        return $this->postingModel
            ->where([
                'jenis' => $jenis,
                'status' => 'publish',
                'kategori' => 'berita'
            ])
            ->orderBy('id', 'DESC')
            ->first();
    }

    private function getOtherPosts($jenis, $excludeId, $limit = 4)
    {
        return $this->postingModel
            ->where('id !=', $excludeId)
            ->where([
                'jenis' => $jenis,
                'status' => 'publish',
                'kategori' => 'berita'
            ])
            ->orderBy('created_at', 'DESC')
            ->findAll($limit);
    }

    public function admin(): string
    {
        $data = [
            'title' => 'Beranda',
            'nama' => 'Pengunjung',
        ];
        // // return view('home');
        // return $this->renderPage('home', $data);
        return view('pageadmin/beranda');
    }

    public function profil(): string
    {

        $pengaturanPost = $this->getAll($this->pengaturanModel);
        $pejabatPost = $this->getKetua($this->pejabatModel);
        $kasiPost = $this->getKasi($this->pejabatModel);
        $data=[
            'pengaturan' => $pengaturanPost,
            'pejabat' => $pejabatPost,
            'kasi' => $kasiPost,
            'title' => 'Profil'
        ];
        return $this->renderPage('profil', $data);
        // return view('profil');\
    }

    public function organisasi(): string
    {

        $pengaturanPost = $this->getAll($this->pengaturanModel);
        $pejabatPost = $this->getKetua($this->pejabatModel);
        $kasiPost = $this->getKasi($this->pejabatModel);
        $data=[
            'pengaturan' => $pengaturanPost,
            'pejabat' => $pejabatPost,
            'kasi' => $kasiPost,
            'title' => 'Organisasi'
        ];
        return $this->renderPage('organisasi', $data);
    }

    public function informasi(): string
    {
        
        $koperasiPost = $this->getLatestPost('koperasi');
        $literasiPost = $this->getLatestPostKategori('Literasi KUKM');
        $penaPost = $this->getLatestPostKategori('Pena Pedia');
        $bilikPost = $this->postingModel->where(['status'=>'publish', 'kategori'=>'Bilik UMKM'])
                                        ->orderBy('id', 'DESC')
                                        ->findAll(4);
        

        // Ambil 4 postingan koperasi lain (kecuali yang pertama)
        $postingKoperasi = $this->getOtherPosts('koperasi', $koperasiPost['id'] ?? null);
        $postingPena = $this->getOtherPostsKategori('Pena Pedia', $penaPost['id'] ?? null, 2);

        // Ambil 4 postingan koperasi lain (kecuali yang pertama)
        // $postingKoperasi = $this->getPostGroup('koperasi', $koperasiPost['id'])->findAll(4);

        // Ambil 1 postingan ukm terbaru
        $ukmPost = $this->getLatestPost('ukm');

        // Ambil 4 postingan ukm lain (kecuali yang pertama koperasi—atau ukm seharusnya?)
        $postingUkm = $this->getOtherPosts('ukm', $ukmPost['id'] ?? null);
        $sliderPost = $this->getAktifDesc($this->sliderModel);
        $pengumumanPost = $this->getAktifDesc($this->pengumumanModel);
        $postingLiterasi = $this->postingModel->where(['status'=>'publish', 'kategori'=>'Literasi KUKM'])
                                        ->orderBy('id', 'DESC')
                                        ->findAll(4);

        $data = [
            'title' => 'Beranda',
            'nama' => 'Pengunjung',
            'posting' => $koperasiPost,
            'koperasi' => $postingKoperasi,
            'postingukm' => $ukmPost,
            'ukm' => $postingUkm,            
            'slider' => $sliderPost,
            'pengumuman' => $pengumumanPost,
            'literasi' => $literasiPost,
            'postingpena' => $penaPost,
            'pena' => $postingPena,
            'bilik' =>$bilikPost,
            'postinganliterasi' => $postingLiterasi
        ];
        // echo $literasiPost['judul'];
        return $this->renderPage('informasi', $data);
    }

    public function layanan(): string
    {

        $data = [
            'title' => 'Beranda'
        ];
        // echo $literasiPost['judul'];        

        return $this->renderPage('layanan', $data);
    }

    public function details($slug)
    {
        $detailPost = $this->postingModel->where(['slug'=>$slug])->first();
        if($detailPost['kategori'] == 'Berita'):
        $beritaPost = $this->getOtherPostsKategori('Berita', $detailPost['id'] ?? null, 4);        
        $data = [
            'title' => 'Berita Terkini',
            'postdetail' => $detailPost,
            'postberita' => $beritaPost
        ];
        elseif($detailPost['kategori'] == 'Literasi KUKM'):
        $beritaPost = $this->getOtherPostsKategori('Literasi KUKM', $detailPost['id'] ?? null, 4);        
        $data = [
            'title' => 'Literasi KUKM Lainnya',
            'postdetail' => $detailPost,
            'postberita' => $beritaPost
        ]; 
        elseif($detailPost['kategori'] == 'Bilik UMKM'):
        $beritaPost = $this->getOtherPostsKategori('Bilik UMKM', $detailPost['id'] ?? null, 4);        
        $data = [
            'title' => 'Bilik KUKM Lainnya',
            'postdetail' => $detailPost,
            'postberita' => $beritaPost
        ];
        elseif($detailPost['kategori'] == 'Pena Pedia'):
        $beritaPost = $this->getOtherPostsKategori('Pena Pedia', $detailPost['id'] ?? null, 4);        
        $data = [
            'title' => 'Pena Pedia Lainnya',
            'postdetail' => $detailPost,
            'postberita' => $beritaPost
        ];
        endif;        

        return $this->renderPage('details', $data);
    }

    public function pengaduan()
    {
        $validationRules = [
        'pesan'     => 'required',
        'nama'       => 'required',
        'email'  => 'required',
        'subject'    => 'required',
        ];

        if (!$this->validate($validationRules)) {
            return redirect()->back()->withInput()->with('error', implode(', ', $this->validator->getErrors()));
        }
        
        $this->pengaduanModel->save([
            'pesan'     => $this->request->getPost('pesan'),
            'nama'       => $this->request->getPost('nama'),
            'email'  => $this->request->getPost('email'),
            'subject'   => $this->request->getPost('subject'),
        ]);

        return redirect()->to('/home/layanan')->with('success', 'Pengaduan berhasil diajukan.');;
    }
}
