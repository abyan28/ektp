<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePenggunaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penggunas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('id_nik',16);
            $table->string('nama',50);
            $table->string('tempat_lahir',50);
            $table->date('tanggal_lahir');
            $table->string('jenis_kelamin',10);
            $table->string('alamat',100);
            $table->string('rt_rw',10);
            $table->string('provinsi',50);
            $table->string('kota',50);
            $table->string('kecamatan',50);
            $table->string('desa',50);
            $table->string('agama',20);
            $table->string('status_perkawinan',5);
            $table->string('pekerjaan',30);
            $table->string('kewarganegaraan',5);
            $table->string('gol_darah',2);
            $table->string('password',255);
            $table->string('foto_ktp');
            $table->string('foto_bersamaktp');
            $table->string('qrcode_id');
            $table->string('uid_kartu')->nullable();
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
        Schema::dropIfExists('pengguna');
    }
}
