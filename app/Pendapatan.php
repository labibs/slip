<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pendapatan extends Model
{
  protected $table = 'pendapatan';
  protected $fillable = ['kode', 'tunjangan'];

  public function karyawan()
    {
    	return $this->belongsToMany(Karyawan::class)->withPivot(['id','periode','nominal','karyawan_id','pendapatan_id']);
    }


}
