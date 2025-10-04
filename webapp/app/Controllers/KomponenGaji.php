<?php

namespace App\Controllers;

use App\Models\KomponenGajiModel;
use CodeIgniter\Controller;

class KomponenGaji extends Controller
{
    public function tambahForm()
    {
        if (session()->get('role') !== 'Admin') {
            return redirect()->to('/komponen/lihat')->with('error', 'Anda tidak memiliki akses untuk menambah data.');
        }
        return view('komponen/TambahKomponenGaji');
    }

    public function simpan()
    {
        if (session()->get('role') !== 'Admin') {
            return redirect()->to('/komponen/lihat')->with('error', 'Akses ditolak.');
        }

        $model = new KomponenGajiModel();

        $data = [
            'id_komponen_gaji' => $this->request->getPost('id_komponen_gaji'),
            'nama_komponen'    => $this->request->getPost('nama_komponen'),
            'kategori'         => $this->request->getPost('kategori'),
            'jabatan'          => $this->request->getPost('jabatan'),
            'nominal'          => $this->request->getPost('nominal'),
            'satuan'           => $this->request->getPost('satuan'),
        ];

        if (empty($data['id_komponen_gaji']) || empty($data['nama_komponen'])) {
            return redirect()->back()->with('error', 'Semua field wajib diisi!');
        }

        $model->insert($data);
        return redirect()->to('/komponen/lihat')->with('success', 'Komponen Gaji berhasil ditambahkan!');
    }

    public function lihat()
    {
        $model = new KomponenGajiModel();
        $keyword = $this->request->getGet('keyword');

        if ($keyword) {
            $data['komponen'] = $model
                ->like('id_komponen_gaji', $keyword)
                ->orLike('nama_komponen', $keyword)
                ->orLike('kategori', $keyword)
                ->orLike('jabatan', $keyword)
                ->orLike('nominal', $keyword)
                ->orLike('satuan', $keyword)
                ->findAll();
        } else {
            $data['komponen'] = $model->findAll();
        }

        return view('komponen/LihatKomponenGaji', $data);
    }

    public function ubah($id)
    {
        if (session()->get('role') !== 'Admin') {
            return redirect()->to('/komponen/lihat')->with('error', 'Anda tidak memiliki akses untuk mengubah data.');
        }

        $model = new KomponenGajiModel();
        $data['komponen'] = $model->find($id);

        if (!$data['komponen']) {
            return redirect()->to('/komponen/lihat')->with('error', 'Data tidak ditemukan.');
        }

        return view('komponen/UbahKomponenGaji', $data);
    }

    public function update($id)
    {
        if (session()->get('role') !== 'Admin') {
            return redirect()->to('/komponen/lihat')->with('error', 'Akses ditolak.');
        }

        $model = new KomponenGajiModel();
        $data = [
            'nama_komponen' => $this->request->getPost('nama_komponen'),
            'kategori'      => $this->request->getPost('kategori'),
            'jabatan'       => $this->request->getPost('jabatan'),
            'nominal'       => $this->request->getPost('nominal'),
            'satuan'        => $this->request->getPost('satuan')
        ];

        $model->update($id, $data);
        return redirect()->to('/komponen/lihat')->with('success', 'Komponen berhasil diperbarui!');
    }

    public function hapus($id)
    {
        if (session()->get('role') !== 'Admin') {
            return redirect()->to('/komponen/lihat')->with('error', 'Anda tidak memiliki akses untuk menghapus data.');
        }

        $model = new KomponenGajiModel();
        $komponen = $model->find($id);

        if (!$komponen) {
            return redirect()->to('/komponen/lihat')->with('error', 'Komponen tidak ditemukan.');
        }

        $model->delete($id);
        return redirect()->to('/komponen/lihat')->with('success', 'Komponen berhasil dihapus!');
    }
}