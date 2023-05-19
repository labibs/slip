<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Karyawan_absen extends Model
{
  protected $table = 'karyawan_absen';
  protected $fillable = ['id','karyawan_id', 'absen_id','periode','jumlah'];
}
