<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Karyawan_pendapatan extends Model
{
  protected $table = 'karyawan_pendapatan';
  protected $fillable = ['id','karyawan_id', 'pendapatan_id','periode','nominal'];
}
