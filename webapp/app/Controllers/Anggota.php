<?php

namespace App\Controllers;

use App\Models\AnggotaModel;
use CodeIgniter\Controller;

class Anggota extends Controller
{
    public function tambahForm()
    {
        return view('anggota/tambah');
    }

    public function simpan()
    {
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

        return redirect()->to('/admin/anggota')->with('success', 'Data anggota berhasil ditambahkan!');
    }

    public function lihat()
    {
        $model = new \App\Models\AnggotaModel();

        $keyword = $this->request->getGet('keyword');

        if ($keyword) {
            $data['anggota'] = $model
                ->like('id_anggota', $keyword)
                ->orLike('nama_depan', $keyword)
                ->orLike('nama_belakang', $keyword)
                ->orLike('jabatan', $keyword)
                ->findAll();
        } else {
            $data['anggota'] = $model->findAll();
        }

        return view('anggota/lihat', $data);
    }

    public function ubahForm($id)
    {
        $model = new \App\Models\AnggotaModel();
        $data['anggota'] = $model->find($id);

        if (!$data['anggota']) {
            return redirect()->to('/admin/anggota/lihat')->with('error', 'Data tidak ditemukan.');
        }

        return view('anggota/ubah', $data);
    }

    public function update()
    {
        $model = new \App\Models\AnggotaModel();

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

        $id = $this->request->getPost('id_anggota');

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

        return redirect()->to('/admin/anggota/lihat')->with('success', 'Data anggota berhasil diperbarui!');
    }

}