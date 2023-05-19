@extends('layouts.master')

@section('header')
<link href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>

@stop
@section('content')
<div class="main">
<!-- MAIN CONTENT -->
<div class="main-content">
<div class="container-fluid">
<div class="panel panel-profile">
<div class="clearfix">
<!-- LEFT COLUMN -->
<div class="profile-left">
<!-- PROFILE HEADER -->
<div class="profile-header">
<div class="overlay"></div>
<div class="profile-main">
<img width="150px" height="180px" src="{{$karyawan->getAvatar()}}" class="img-circle" alt="Avatar">
<h3 sizes="50x50" class="name">{{$karyawan->nama_depan}} {{$karyawan->nama_belakang}}</h3>
<span class="online-status status-available">{{$karyawan->user->role}}</span></div>
<div class="profile-stat">
<div class="row">
<div class="col-md-3 stat-item"><center>Gender </center><span><center>{{$karyawan->jenis_kelamin}}</center></span>
</div>
<div class="col-md-6 stat-item">Jabatan <span>{{$karyawan->jabatan}}</span>
</div>
<div class="col-md-3 stat-item">Kantor <span>{{$karyawan->kantor}}</span>
</div>
</div>
</div>
</div>
<!-- END PROFILE HEADER -->
<!-- PROFILE DETAIL -->
<div class="profile-detail">
<div class="profile-info">
</div>
</div>
<!-- END PROFILE DETAIL -->
</div>
<!-- END LEFT COLUMN -->
<!-- RIGHT COLUMN -->
<div class="profile-right">
<h4 class="heading" ><li><a href="https://jne-cilacap.com/slip/public/pendapatant" > <span>Detail Pendapatan</span></a></li>  </h4>
 @if(session('sukses'))
<div class="alert alert-warning alert-success" role="alert">
 {{session('sukses')}}
</div>
 @endif
 @if(session('eror'))
<div class="alert alert-success alert-info" role="alert">
 {{session('eror')}}
</div>
 @endif
<table class="table  table-bordered">
<thead>
<button type="button" class="btn btn-warning " data-toggle="modal" data-target="#exampleModal">Tambah </button>
<tr>
  <td><b><center>AKSI </center></b></td>
  <td><b><center>PENDAPATAN</center></b></td>
  <td><b><center>BULAN</center></b></td>
  <td><b><center>NOMINAL</center></b></td>
</tr>
</thead>
<tbody>   @foreach($rentang as $rt)<tr>
<td><center><a href="./{{$rt->id}}/deletetunjangan" class="btn btn-danger btn-sm" onclick="return confirm('Yakin mau di hapus?')">Hapus</a>
</center></td>
<td>{{$rt->tunjangan}}</td>
<td><center>{{$rt->pivot->periode}}</center></td>
<td align="right"><a href="#" class="nominal" data-name="nominal" data-type="text" data-pk="1" data-url="/post" data-title="Masukan Nominal">{{formatRupiah($rt->pivot->nominal)}}</a></td</tr>
@endforeach
<tr>
<td colspan="3"><b><center>TOTAL PENDAPATAN</center></b></td>
<td align="right"><b>{{formatRupiah($jumlah)}}</b></td>
</tr>
</tbody>
</table>
<!-- END AWARDS -->
<!-- TABBED CONTENT -->
<!-- END TABBED CONTENT -->
</div>
<!-- END RIGHT COLUMN -->
</div>
</div>
</div>
</div>
<!-- END MAIN CONTENT -->
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
  <h5 class="modal-title" id="exampleModalLabel">Tambah Data Pendapatan</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
  <span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">
<form action="../{{$karyawan->id}}/t_pendapatan" method="POST">
 {{csrf_field()}}
<div class="form-group">
<label for="mapel">Pendapatan</label>
<select name="pendapatan" class="form-control" id="pendapatan">
  @foreach($tunjang as $pnd)
  <option value="{{$pnd->id}}">{{$pnd->tunjangan}}</option>
  @endforeach
</select>
</div>
<div class="form-group">
  <label for="exampleFormControlSelect1">Periode</label>
  <select name="periode" class="form-control" id="exampleFormControlSelect1">
<option value="Maret 2023">Maret 2023</option>
<option value="Januari 2023">Januari 2023</option>
<option value="Desember 2022">Desember 2022</option>
<option value="November 2022">November 2022</option>
<option value="Oktober 2022">Oktober 2022</option>
<option value="September 2022">September 2022</option>
<option value="Agustus 2022">Agustus 2022</option>
<option value="Juli 2022">Juli 2022</option>
<option value="Juni 2022">Juni 2022</option>
<option value="Mei 2022">Mei 2022</option>
<option value="April 2022">April 2022</option>

<option value="Februari 2022">Februari 2022</option>
  </select>
</div>
<div class="form-group">
<label for="exampleInputEmail1">Nominal</label>
<input name="nominal" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukan Kondisi">
</div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
<button type="submit" class="btn btn-primary">Simpan</button>
</form>
</div>
</div>
</div>
</div>
@stop
@section('footer')

<script src="bootstrap-editable/js/bootstrap-editable.js"></script>
<script >
$(document).ready(function() {
        $('.nominal').editable({
            mode: 'inline',
        });
});
          </script>



@stop
