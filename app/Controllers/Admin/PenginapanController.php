<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;

class PenginapanController extends BaseController
{
    protected $helpers = ['form'];
    public function index()
    {
        $data = [
            'title' => 'Daftar Penginapan',
            'daftar_penginapan' => $this->ModelPenginapan->orderBy('id', 'DESC')->findAll()
        ];
        return view('admin/penginapan/index', $data);
    }

    public function form_create()
    {
        $data = [
            'title' => 'Tambah penginapan',
            'validation' => \Config\Services::validation(),
        ];

        return view('admin/penginapan/create', $data);
    }

    public function simpan()
    {
        $rules = $this->validate([
            'nama'          => [
                'rules' => 'required|is_unique[penginapan.nama]',
                'errors'=> [
                    'required' => 'Masukkan Penginapan',
                    'is_unique' => 'Nama Penginapan yang dimasukkan sudah ada'
                ]
            ],
            'deskripsi'     => [
                'rules' => 'required',
                'errors'=> [
                    'required' => 'Masukkan Deskripsi',
                ]
            ],  
            'gambar'        => [
                'rules' => 'uploaded[gambar]|max_size[gambar,2048]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]',
                'errors'=> [
                    'uploaded' => 'Masukkan Gambar',
                    'max_size' => 'Ukuran Gambar melebihi 2048kb',
                    'is_image' => 'File yang dimasukkan bukan Gambar',
                    'mime_in'  => 'Hanya menerima Gambar dengan format jpg, jpeg & png'
                ]
            ],
            'alamat'     => [
                'rules' => 'required',
                'errors'=> [
                    'required' => 'Masukkan Alamat',
                ]
            ],
            'latitude'     => [
                'rules' => 'required',
                'errors'=> [
                    'required' => 'Masukkan Koordinat latitude',
                ]
            ],
            'longitude'     => [
                'rules' => 'required',
                'errors'=> [
                    'required' => 'Masukkan Koordinat longitude',
                ]
            ],
        ]);

        // jika validasi gagal
        if (!$rules){
            session()->setFlashData('errors', $this->validator->getErrors());
            session()->setFlashData('failed', 'Data Penginapan Gagal Ditambahkan');
            return redirect()->back()->withInput();
        }

        // Jika data valid
        // membuat slug
        $slug_penginapan = url_title($this->request->getPost('nama'), '-', TRUE);

        $gambar = $this->request->getFile('gambar');
        $namaGambar = $gambar->getRandomName();
        $gambar->move('public/gambar/penginapan', $namaGambar);

        // Set zona waktu ke Asia/Jakarta
        date_default_timezone_set('Asia/Jakarta');

        // Ambil waktu saat ini
        $now = new \DateTime();
                        
        // Format tanggal dan waktu dalam format Indonesia
        $waktu_sekarang = $now->format('d F Y, H:i:s'); // Contoh: 10 Agustus 2023, 09:30:15

        $this->ModelPenginapan->insert([
            'slug_penginapan' => $slug_penginapan,
            'nama' => esc($this->request->getPost('nama')),
            'gambar' => $namaGambar,
            'deskripsi' => esc($this->request->getPost('deskripsi')),
            'alamat' => esc($this->request->getPost('alamat')),
            'latitude' => esc($this->request->getPost('latitude')),
            'longitude' => esc($this->request->getPost('longitude')),
            'created_at'        => $waktu_sekarang,
            'created_by'        => 'admin1',
        ]);

        return redirect()->to(base_url('penginapan'))->with('success', 'Data Penginapan Berhasil Ditambahkan');
    }

    public function detail($id)
    {
        $data = [
            'title' => 'Detail Penginapan',
            'penginapan' => $this->ModelPenginapan->find($id)
        ];
        return view('admin/penginapan/detail', $data);
    }

    public function delete()
    {
        if ($this->request->isAJAX()) {
            $id = $this->request->getVar('id');

            $penginapan = $this->ModelPenginapan->find($id);

            unlink('public/gambar/penginapan/' . $penginapan['gambar']);

            $this->ModelPenginapan->delete($id);

            $result = [
                'success' => 'Data penginapan berhasil dihapus'
            ];

            echo json_encode($result);
        } else {
            exit('ada yang salah');
        }
    }

    public function update($id)
    {
        $data = [ 
            'title' => 'Ubah Penginapan',
            'data_penginapan' => $this->ModelPenginapan->find($id),
            'validation' => \Config\Services::validation(),
        ];

        return view('admin/penginapan/update', $data);
    }

    public function simpan_update($id)
    {
        $rules = $this->validate([
            'nama'          => [
                'rules' => 'required',
                'errors'=> [
                    'required' => 'Masukkan Nama',
                ]
            ],
            'deskripsi'     => [
                'rules' => 'required',
                'errors'=> [
                    'required' => 'Masukkan Deskripsi',
                ]
            ],  
            'gambar'        => [
                'rules' => 'max_size[gambar,2048]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]',
                'errors'=> [
                    'max_size' => 'Ukuran Gambar melebihi 2048kb',
                    'is_image' => 'File yang dimasukkan bukan Gambar',
                    'mime_in'  => 'Hanya menerima Gambar dengan format jpg, jpeg & png'
                ]
            ],
            'alamat'     => [
                'rules' => 'required',
                'errors'=> [
                    'required' => 'Masukkan Alamat',
                ]
            ],
        ]);

        // jika validasi gagal
        if (!$rules){
            session()->setFlashData('errors', $this->validator->getErrors());
            session()->setFlashData('failed', 'Data Penginapan Gagal Diubah');
            return redirect()->back()->withInput();
        }

        // Jika data valid
        // membuat slug
        $slug_penginapan = url_title($this->request->getPost('nama'), '-', TRUE);

        $gambar = $this->request->getFile('gambar'); // ambil file gambar
        if ($gambar->getError()==4) {               // cek ada gambar atau tidak
            $namaGambar = $this->request->getPost('gambarLama');
        } else {
            $namaGambar = $gambar->getRandomName();            // ambil random name file
            $gambar->move('public/gambar/penginapan', $namaGambar);
            $gambarLama = $this->request->getPost('gambarLama');
            if ($gambarLama) {
                unlink('public/gambar/penginapan/' . $gambarLama);
            }
        }

        // Set zona waktu ke Asia/Jakarta
        date_default_timezone_set('Asia/Jakarta');

        // Ambil waktu saat ini
        $now = new \DateTime();
                        
        // Format tanggal dan waktu dalam format Indonesia
        $waktu_sekarang = $now->format('d F Y, H:i:s'); // Contoh: 10 Agustus 2023, 09:30:15

        $this->ModelPenginapan->update($id,[
            'slug_penginapan' => $slug_penginapan,
            'nama' => esc($this->request->getPost('nama')),
            'gambar' => $namaGambar,
            'deskripsi' => esc($this->request->getPost('deskripsi')),
            'alamat' => esc($this->request->getPost('alamat')),
            'latitude' => esc($this->request->getPost('latitude')),
            'longitude' => esc($this->request->getPost('longitude')),
            'updated_at' => $waktu_sekarang,
            'updated_by' => "admin2",
        ]);

        return redirect()->to(base_url('penginapan'))->with('success', 'Data Penginapan Berhasil Diubah');
    }
}
