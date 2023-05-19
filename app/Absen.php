<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Absen extends Model
{
  protected $table = 'absen';
  protected $fillable = ['kode', 'jenis'];

  public function karyawan()
    {
      return $this->belongsToMany(Karyawan::class)->withPivot(['id','periode','jumlah','karyawan_id','absen_id']);
    }

}
