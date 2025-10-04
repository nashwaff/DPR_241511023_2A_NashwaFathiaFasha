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

        // Ambil data anggota untuk validasi status pernikahan & jumlah anak
        $anggota = $anggotaModel->find($idAnggota);
        $komponen = $komponenModel->find($idKomponen);

        if (!$anggota || !$komponen) {
            return redirect()->back()->with('error', 'Data tidak valid!');
        }

        // VALIDASI: Komponen gaji harus sesuai jabatan
        if ($komponen['jabatan'] != $anggota['jabatan'] && $komponen['jabatan'] != 'Semua') {
            return redirect()->back()->with('error', 'Komponen tidak sesuai dengan jabatan anggota.');
        }

        // VALIDASI: Tidak boleh menambahkan komponen gaji yang sama
        $cekDuplikat = $penggajianModel
            ->where('id_anggota', $idAnggota)
            ->where('id_komponen_gaji', $idKomponen)
            ->first();

        if ($cekDuplikat) {
            return redirect()->back()->with('error', 'Komponen gaji ini sudah ditambahkan untuk anggota tersebut.');
        }

        // Hitung total takehomepay awal
        $total = $komponen['nominal'];

        // Tambahkan tunjangan istri/suami
        if ($anggota['status_pernikahan'] == 'Kawin') {
            $tunjanganIstri = $komponenModel->where('nama_komponen', 'Tunjangan Istri/Suami')->first();
            if ($tunjanganIstri) $total += $tunjanganIstri['nominal'];
        }

        // Tambahkan tunjangan anak (max 2)
        if ($anggota['jumlah_anak'] > 0) {
            $jumlahAnak = min($anggota['jumlah_anak'], 2);
            $tunjanganAnak = $komponenModel->where('nama_komponen', 'Tunjangan Anak')->first();
            if ($tunjanganAnak) $total += ($tunjanganAnak['nominal'] * $jumlahAnak);
        }

        $data = [
            'id_anggota' => $idAnggota,
            'id_komponen_gaji' => $idKomponen,
            'total_takehomepay' => $total
        ];

        $penggajianModel->insert($data);

        return redirect()->to('/admin/penggajian/lihat')->with('success', 'Data penggajian berhasil ditambahkan!');
    }
}