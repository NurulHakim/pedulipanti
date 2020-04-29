<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePantiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('panti', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('email_user', 100)->unique();
            $table->foreign('email_user')->references('email')->on('users');
            $table->string('tipe_panti');
            $table->string('jenis_yayasan');
            $table->string('nama_panti');
            $table->string('no_telepon');
            $table->string('nama_pemilik');
            $table->string('no_telepon_pemilik');
            $table->string('alamat_panti');
            $table->string('provinsi');
            $table->string('kabupaten_kota');
            $table->string('kecamatan');
            $table->string('kelurahan');
            $table->string('kebutuhan_panti');
            $table->text('deskripsi_kebutuhan');
            $table->text('deskripsi_panti');
            $table->integer('jumlah_pengurus');
            $table->integer('jumlah_anak_laki');
            $table->integer('jumlah_anak_perempuan');
            $table->mediumText('logo_panti')->nullable($value = true);
            $table->mediumText('foto_panti')->nullable($value = true);
            $table->mediumText('sertifikat_panti')->nullable($value = true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('panti');
    }
}
