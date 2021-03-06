<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Panti extends Model
{
    protected $connection = 'mysql';
    protected $table = 'panti';
    protected $fillable = ['tipe_panti', 'jenis_yayasan', 'nama_panti', 'no_telepon', 'nama_pemilik', 'no_telepon_pemilik', 'alamat_panti', 'provinsi', 'kabupaten_kota', 'kecamatan', 'kelurahan', 'kebutuhan_panti', 'deskripsi_kebutuhan', 'jumlah_pengurus', 'jumlah_anak_laki', 'jumlah_anak_perempuan', 'logo_panti', 'foto_panti', 'sertifikat_panti', 'email_user'];

    public function user(){
        return $this->belongsTo(kabupaten::class);
    }
}
