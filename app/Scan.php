<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Absen extends Model
{
  protected $table = 'scans';
  protected $fillable = ['mesin', 'user_id', 'nama', 'validasi', 'absen', 'stamp'];

  public function karyawan()
    {
      return $this->belongsToMany(Karyawan::class)->with('absen_id');
    }

}
