<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fasilitas_karyawan extends Model
{
    protected $table = 'fasilitas_karyawan';
    protected $fillable = ['id','karyawan_id','fasilitas_id','deskripsi','keterangan','tanggal'];

}
