<?php

namespace App\Controllers;

use App\Models\KomponenGajiModel;
use CodeIgniter\Controller;

class KomponenGaji extends Controller
{
    public function tambahForm()
    {
        return view('komponen/TambahKomponenGaji');
    }

    public function simpan()
    {
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

        return redirect()->to('/admin/dashboard')->with('success', 'Komponen Gaji berhasil ditambahkan!');
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
}
