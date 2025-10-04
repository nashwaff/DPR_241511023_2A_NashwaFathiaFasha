<?php

namespace App\Controllers;

use App\Models\AnggotaModel;
use CodeIgniter\Controller;

class Anggota extends Controller
{
    public function tambahForm()
    {
        if (session()->get('role') !== 'Admin') {
            return redirect()->to('/anggota/lihat')->with('error', 'Anda tidak memiliki akses untuk menambah data.');
        }
        return view('anggota/tambah');
    }

    public function simpan()
    {
        if (session()->get('role') !== 'Admin') {
            return redirect()->to('/anggota/lihat')->with('error', 'Akses ditolak.');
        }

        $model = new AnggotaModel();

        $validation = \Config\Services::validation();
        $validation->setRules([
            'id_anggota'        => 'required|numeric|is_unique[anggota.id_anggota]',
            'nama_depan'        => 'required',
            'nama_belakang'     => 'required',
            'jabatan'           => 'required|in_list[Ketua,Wakil Ketua,Anggota]',
            'status_pernikahan' => 'required|in_list[Kawin,Belum Kawin,Cerai Hidup,Cerai Mati]',
            'jumlah_anak'       => 'permit_empty|integer'
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $data = [
            'id_anggota'        => $this->request->getPost('id_anggota'),
            'gelar_depan'       => $this->request->getPost('gelar_depan'),
            'nama_depan'        => $this->request->getPost('nama_depan'),
            'nama_belakang'     => $this->request->getPost('nama_belakang'),
            'gelar_belakang'    => $this->request->getPost('gelar_belakang'),
            'jabatan'           => $this->request->getPost('jabatan'),
            'status_pernikahan' => $this->request->getPost('status_pernikahan'),
            'jumlah_anak'       => $this->request->getPost('jumlah_anak') ?? 0
        ];

        $model->insert($data);
        return redirect()->to('/anggota/lihat')->with('success', 'Data anggota berhasil ditambahkan!');
    }

    public function lihat()
    {
        $model = new \App\Models\AnggotaModel();

        // ambil keyword dari pencarian (jika ada)
        $keyword = $this->request->getGet('keyword');

        if ($keyword && $keyword !== '') {
            // kalau ada keyword, cari berdasarkan kolom-kolom tertentu
            $data['anggota'] = $model
                ->like('id_anggota', $keyword)
                ->orLike('nama_depan', $keyword)
                ->orLike('nama_belakang', $keyword)
                ->orLike('jabatan', $keyword)
                ->findAll();
        } else {
            // kalau tidak ada keyword, ambil semua data
            $data['anggota'] = $model->findAll();
        }

        // pastikan data tidak kosong
        if (empty($data['anggota'])) {
            $data['anggota'] = []; // biar tidak error
        }

        // cek role user
        if (session()->get('role') === 'Public') {
            return view('public/anggota_readonly', $data);
        }

        return view('anggota/lihat', $data);
    }

    public function ubahForm($id)
    {
        if (session()->get('role') !== 'Admin') {
            return redirect()->to('/anggota/lihat')->with('error', 'Anda tidak memiliki akses untuk mengubah data.');
        }

        $model = new AnggotaModel();
        $data['anggota'] = $model->find($id);

        if (!$data['anggota']) {
            return redirect()->to('/anggota/lihat')->with('error', 'Data tidak ditemukan.');
        }

        return view('anggota/ubah', $data);
    }

    public function update()
    {
        if (session()->get('role') !== 'Admin') {
            return redirect()->to('/anggota/lihat')->with('error', 'Akses ditolak.');
        }

        $model = new AnggotaModel();
        $id = $this->request->getPost('id_anggota');

        $validation = \Config\Services::validation();
        $validation->setRules([
            'nama_depan'        => 'required',
            'nama_belakang'     => 'required',
            'jabatan'           => 'required|in_list[Ketua,Wakil Ketua,Anggota]',
            'status_pernikahan' => 'required|in_list[Kawin,Belum Kawin,Cerai Hidup,Cerai Mati]',
            'jumlah_anak'       => 'permit_empty|integer'
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $data = [
            'gelar_depan'       => $this->request->getPost('gelar_depan'),
            'nama_depan'        => $this->request->getPost('nama_depan'),
            'nama_belakang'     => $this->request->getPost('nama_belakang'),
            'gelar_belakang'    => $this->request->getPost('gelar_belakang'),
            'jabatan'           => $this->request->getPost('jabatan'),
            'status_pernikahan' => $this->request->getPost('status_pernikahan'),
            'jumlah_anak'       => $this->request->getPost('jumlah_anak') ?? 0
        ];

        $model->update($id, $data);
        return redirect()->to('/anggota/lihat')->with('success', 'Data anggota berhasil diperbarui!');
    }

    public function hapus($id)
    {
        if (session()->get('role') !== 'Admin') {
            return redirect()->to('/anggota/lihat')->with('error', 'Anda tidak memiliki akses untuk menghapus data.');
        }

        $model = new AnggotaModel();
        if (!$model->find($id)) {
            return redirect()->to('/anggota/lihat')->with('error', 'Data tidak ditemukan.');
        }

        $model->delete($id);
        return redirect()->to('/anggota/lihat')->with('success', 'Data anggota berhasil dihapus.');
    }
}