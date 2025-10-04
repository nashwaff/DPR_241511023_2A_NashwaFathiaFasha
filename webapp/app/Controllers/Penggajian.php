<?php

namespace App\Controllers;

use App\Models\AnggotaModel;
use App\Models\KomponenGajiModel;
use App\Models\PenggajianModel;
use CodeIgniter\Controller;

class Penggajian extends Controller
{
    public function tambahForm()
    {
        $anggotaModel = new AnggotaModel();
        $komponenModel = new KomponenGajiModel();
        $data['anggota'] = $anggotaModel->findAll();
        $data['komponen'] = $komponenModel->findAll();

        return view('penggajian/TambahPenggajian', $data);
    }

    public function simpan()
    {
        $penggajianModel = new PenggajianModel();
        $anggotaModel = new AnggotaModel();
        $komponenModel = new KomponenGajiModel();

        $idAnggota = $this->request->getPost('id_anggota');
        $idKomponen = $this->request->getPost('id_komponen_gaji');

        $anggota = $anggotaModel->find($idAnggota);
        $komponen = $komponenModel->find($idKomponen);

        if (!$anggota || !$komponen) {
            return redirect()->back()->with('error', 'Data tidak valid!');
        }

        // VALIDASI: Komponen harus sesuai jabatan
        if ($komponen['jabatan'] != $anggota['jabatan'] && $komponen['jabatan'] != 'Semua') {
            return redirect()->back()->with('error', 'Komponen tidak sesuai dengan jabatan anggota.');
        }

        // VALIDASI: Komponen gaji tidak boleh duplikat
        $cekDuplikat = $penggajianModel
            ->where('id_anggota', $idAnggota)
            ->where('id_komponen_gaji', $idKomponen)
            ->first();

        if ($cekDuplikat) {
            return redirect()->back()->with('error', 'Komponen gaji ini sudah ditambahkan untuk anggota tersebut.');
        }

        // Hitung total awal
        $total = $komponen['nominal'];

        // Tambah tunjangan istri/suami
        if ($anggota['status_pernikahan'] == 'Kawin') {
            $tunjanganIstri = $komponenModel->where('nama_komponen', 'Tunjangan Istri/Suami')->first();
            if ($tunjanganIstri) $total += $tunjanganIstri['nominal'];
        }

        // Tambah tunjangan anak (maks 2)
        if ($anggota['jumlah_anak'] > 0) {
            $jumlahAnak = min($anggota['jumlah_anak'], 2);
            $tunjanganAnak = $komponenModel->where('nama_komponen', 'Tunjangan Anak')->first();
            if ($tunjanganAnak) $total += ($tunjanganAnak['nominal'] * $jumlahAnak);
        }

        $data = [
            'id_anggota' => $idAnggota,
            'id_komponen_gaji' => $idKomponen,
            'total_takehomepay' => $total,
            'tanggal_penggajian' => date('Y-m-d')
        ];

        $penggajianModel->insert($data);

        return redirect()->to('/admin/penggajian/lihat')->with('success', 'Data penggajian berhasil ditambahkan!');
    }

    public function lihat()
    {
        $penggajianModel = new PenggajianModel();
        $anggotaModel = new AnggotaModel();
        $komponenModel = new KomponenGajiModel();

        $anggotaList = $anggotaModel->findAll();
        $data['penggajian'] = [];

        foreach ($anggotaList as $anggota) {
            $komponenAnggota = $penggajianModel
                ->select('id_penggajian, id_komponen_gaji')
                ->where('id_anggota', $anggota['id_anggota'])
                ->findAll();

            $total = 0;
            foreach ($komponenAnggota as $pg) {
                $komponen = $komponenModel->find($pg['id_komponen_gaji']);
                if ($komponen) {
                    $total += $komponen['nominal'];
                }
            }

            if ($anggota['status_pernikahan'] == 'Kawin') {
                $tunjanganIstri = $komponenModel->where('nama_komponen', 'Tunjangan Istri/Suami')->first();
                if ($tunjanganIstri) $total += $tunjanganIstri['nominal'];
            }

            if ($anggota['jumlah_anak'] > 0) {
                $jumlahAnak = min($anggota['jumlah_anak'], 2);
                $tunjanganAnak = $komponenModel->where('nama_komponen', 'Tunjangan Anak')->first();
                if ($tunjanganAnak) $total += $tunjanganAnak['nominal'] * $jumlahAnak;
            }

            $data['penggajian'][] = [
                'id_penggajian' => $komponenAnggota[0]['id_penggajian'] ?? null,
                'id_anggota' => $anggota['id_anggota'],
                'nama_lengkap' => trim($anggota['gelar_depan'] . ' ' . $anggota['nama_depan'] . ' ' . $anggota['nama_belakang'] . ' ' . $anggota['gelar_belakang']),
                'jabatan' => $anggota['jabatan'],
                'total_takehomepay' => $total,
                'tanggal_penggajian' => date('Y-m-d'),
            ];
        }

        return view('penggajian/LihatPenggajian', $data);
    }

    public function ubah($id)
    {
        $penggajianModel = new PenggajianModel();
        $anggotaModel = new AnggotaModel();
        $komponenModel = new KomponenGajiModel();

        $penggajian = $penggajianModel->find($id);
        if (!$penggajian) {
            return redirect()->to('/admin/penggajian/lihat')->with('error', 'Data penggajian tidak ditemukan.');
        }

        $data['penggajian'] = $penggajian;
        $data['anggota'] = $anggotaModel->findAll();
        $data['komponen'] = $komponenModel->findAll();

        return view('penggajian/UbahPenggajian', $data);
    }

    public function update($id)
    {
        $penggajianModel = new PenggajianModel();
        $komponenModel = new KomponenGajiModel();
        $anggotaModel = new AnggotaModel();

        $idAnggota = $this->request->getPost('id_anggota');
        $idKomponen = $this->request->getPost('id_komponen_gaji');

        $komponen = $komponenModel->find($idKomponen);
        $anggota = $anggotaModel->find($idAnggota);
        $total = $komponen['nominal'];

        if ($anggota['status_pernikahan'] == 'Kawin') {
            $tunjanganIstri = $komponenModel->where('nama_komponen', 'Tunjangan Istri/Suami')->first();
            if ($tunjanganIstri) $total += $tunjanganIstri['nominal'];
        }

        if ($anggota['jumlah_anak'] > 0) {
            $jumlahAnak = min($anggota['jumlah_anak'], 2);
            $tunjanganAnak = $komponenModel->where('nama_komponen', 'Tunjangan Anak')->first();
            if ($tunjanganAnak) $total += ($tunjanganAnak['nominal'] * $jumlahAnak);
        }

        $dataUpdate = [
            'id_anggota' => $idAnggota,
            'id_komponen_gaji' => $idKomponen,
            'total_takehomepay' => $total,
            'tanggal_penggajian' => date('Y-m-d')
        ];

        $penggajianModel->update($id, $dataUpdate);

        return redirect()->to('/admin/penggajian/lihat')->with('success', 'Data penggajian berhasil diperbarui!');
    }

    public function hapus($id)
    {
        $penggajianModel = new PenggajianModel();

        $penggajian = $penggajianModel->find($id);
        if (!$penggajian) {
            return redirect()->to('/admin/penggajian/lihat')->with('error', 'Data penggajian tidak ditemukan.');
        }

        $penggajianModel->delete($id);

        return redirect()->to('/admin/penggajian/lihat')->with('success', 'Data penggajian berhasil dihapus!');
    }

    public function detail($id)
    {
        $penggajianModel = new \App\Models\PenggajianModel();
        $anggotaModel = new \App\Models\AnggotaModel();
        $komponenModel = new \App\Models\KomponenGajiModel();

        $penggajian = $penggajianModel->find($id);
        if (!$penggajian) {
            return redirect()->to('/admin/penggajian/lihat')->with('error', 'Data penggajian tidak ditemukan.');
        }

        $anggota = $anggotaModel->find($penggajian['id_anggota']);

        $komponen = $komponenModel->find($penggajian['id_komponen_gaji']);

        return view('penggajian/DetailPenggajian', [
            'penggajian' => $penggajian,
            'anggota' => $anggota,
            'komponen' => $komponen
        ]);
    }

}