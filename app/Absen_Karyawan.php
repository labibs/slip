<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Absen_Karyawan extends Model
{
  protected $table = 'absen_karyawan';
  protected $fillable = ['id','karyawan_id','periode','jumlah'];
}
