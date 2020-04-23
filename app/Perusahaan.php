<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perusahaan extends Model
{
    protected $table = 'perusahaan';
    protected $fillable = ['tipe_panti', 'nama_panti', 'no_telepon', 'nama_pemilik', 'alamat_panti', 'provinsi', 'kabupaten_kota', 'kecamatan', 'kelurahan', 'deskripsi_kebutuhan', 'logi_panti'];
}
