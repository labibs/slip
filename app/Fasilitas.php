<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fasilitas extends Model
{
    protected $table = 'fasilitas';
    protected $fillable = ['nama'];

  public function karyawan()
    {
      return $this->belongsToMany(Karyawan::class)->withPivot(['id','deskripsi','keterangan','tanggal','karyawan_id','fasilitas_id']);
    }
}
