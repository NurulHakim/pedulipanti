<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class program extends Model
{
    protected $table = 'program_panti';
    protected $fillable = ['judul', 'id_panti', 'photo_program', 'deskripsi_program', 'biaya'];
}
