<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
  protected $table = 'karyawan';
    protected $fillable = ['user_id','absen_id','nik','nama_depan', 'nama_belakang', 'jenis_kelamin','kantor','jabatan','agama','pendidikan','alamat','avatar','absen','bpjstk','bpjsks','bpjsksi','bpjsksa1','bpjsksa2','catatan1','catatan2','catatan3','catatan4','catatan5','catatan6','catatan7','catatan8','catatan9','catatan10','catatan11','catatan12'];

    public function getAvatar()
    {
      if(!$this->avatar)
      {
        return asset('../images/default.png');
      }
      return asset('../images/'.$this->avatar);
    }

    public function getAbsen()
    {
      if(!$this->absen)
      {
        return asset('absen/default.png');
      }
      return asset('absen/'.$this->absen);
    }
    public function getBpjstk()
    {
      if(!$this->absen)
      {
        return asset('bpjstk/default.png');
      }
      return asset('bpjstk/'.$this->bpjstk);
    }
    public function jabatan()
    {
    	return $this->belongsToMany(Jabatan::class)->withTimeStamps();
    }
    public function user()
    {
    	return $this->belongsTo(User::class);
    }
    public function pendapatan()
    {
      return $this->belongsToMany(Pendapatan::class)->withPivot(['id','periode','nominal','karyawan_id','pendapatan_id'])->withTimeStamps();

    }
    public function tot_pendapatan()
    {
      $total =0;
      $hitung =0;
      foreach ($this->Pendapatan()->wherePeriode('April 2023')->get() as $pendapatan){
      $total +=$pendapatan->pivot->nominal;
      $hitung++;
    }
    return $total;
    }

    public function potongan()
    {
      return $this->belongsToMany(Potongan::class)->withPivot(['id','periode','nominal','karyawan_id','potongan_id'])->withTimeStamps();

    }

    public function abseen()
    {
      return $this->belongsToMany(Absen::class)->withPivot(['id','karyawan_id','absen_id','periode','jumlah'])->withTimeStamps();

    }
    
    public function sceen()
    {
      return $this->belongsToMany(Absen::class)->with('user_id')->withTimeStamps();

    }
    
    public function fasilitasi()
    {
      return $this->belongsToMany(Fasilitas::class)->withPivot(['id','karyawan_id','fasilitas_id','deskripsi','keterangan','tanggal',])->withTimeStamps();

    }
	public function hari_kerja()
    { 
      $jml=0;
      foreach ($this->abseen()->whereAbsen_id('4')->wherePeriode('April 2023')->get() as $hk)
      {
        $jml=$hk->pivot->jumlah;
      }
      return $jml;
    }
	public function uang_makan()
    { 
      $makan=0;
      foreach ($this->Pendapatan()->wherePendapatan_id('4')->wherePeriode('April 2023')->get() as $penda){
      $makan = $penda->pivot->nominal;
      }
      return $makan;
    }
	public function bbm()
    { 
      $bensin=0;
      foreach ($this->Pendapatan()->wherePendapatan_id('12')->wherePeriode('April 2023')->get() as $patan){
      $bensin = $patan->pivot->nominal;
      }
      return $bensin;
    }
	public function	di_rumah()
	{
	   $rmh=0;
	   $chkj=0;
	   foreach ($this->abseen()->whereAbsen_id('4')->wherePeriode('April 2023')->get() as $hkj)
	   {
		  $chkj =$hkj->pivot->jumlah;
	      $rmh= 31 - $chkj;
	   }
		  return $rmh;
	}
  public function sragam()
    { 
      return $this->fasilitasi()->whereFasilitas_id('179')->count(); 
    }
  public function orion()
    { 
      $orioo = null;
      foreach ($this->fasilitasi()->whereFasilitas_id('187')->get() as $ori){
      $orioo = $ori->pivot->deskripsi;
      }
      return $orioo;
    }
    public function email()
    { 
      $imel = null;
      foreach ($this->fasilitasi()->whereFasilitas_id('197')->get() as $ime){
      $imel = $ime->pivot->deskripsi;
      }
      return $imel;
    }
  public function tot_potongan()
    {
      $total_p =0;
      $hitung_p =0;
      foreach ($this->Potongan()->wherePeriode('April 2023')->get() as $potongan){
      $total_p +=$potongan->pivot->nominal;
      $hitung_p++;
    }
    return $total_p;
    }
    
    public function no_urut()
    {
      $no=0;
      $no++;
    }
    public function nama_lengkap()
    {
      return $this->nama_depan.' '.$this->nama_belakang;
    }
	public function umakan()
    { 
      $uang = null;
      foreach ($this->pendapatan()->whereId('4')->get() as $makan){
      $uang = $makan->pivot->nominal;
      }
      return $uang;
    }
	
    
}
