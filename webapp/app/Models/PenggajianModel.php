<?php

namespace App\Models;

use CodeIgniter\Model;

class PenggajianModel extends Model
{
    protected $table = 'penggajian';
    protected $primaryKey = 'id_penggajian';
    protected $allowedFields = [
        'id_penggajian', 
        'id_anggota', 
        'id_komponen_gaji', 
        'total_takehomepay', 
        'tanggal_penggajian'
    ];
}