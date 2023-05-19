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
<h4 class="heading"><li> <span>Data Inventaris</span></li></h4>
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

<tr>
 
  <td><b><center>INVENTARIS</center></b></td>
  <td><b><center>DESKRIPSI</center></b></td>
  <td><b><center>KETERANGAN</center></b></td>
  <td><b><center>SERAH TERIMA</center></b></td>
</tr>
</thead>
<tbody>
	
   @foreach($bulanini as $fsl)<tr>

<td>{{$fsl->nama}}</td>
<td><center>{{$fsl->pivot->deskripsi}}</center></td>
<td><center>{{$fsl->pivot->keterangan}}</center></td>
<td align="right"><a href="#" class="nominal" data-name="nominal" data-type="text" data-pk="1" data-url="/post" data-title="Masukan Nominal"><center>{{$fsl->pivot->tanggal}}</center></a></td></tr>
@endforeach

</tbody>
</table>
END AWARDS 
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
  <h5 class="modal-title" id="exampleModalLabel">Tambah Data Fasilitas</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
  <span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">
<form action="/slip/public/karyawan/{{$karyawan->id}}/t_fasilitas" method="POST">
 {{csrf_field()}}
<div class="form-group">
<label for="mapel">Fasilitas</label>
<select name="absen" class="form-control" id="abseen">
  @foreach($fas as $fs)
  <option value="{{$fs->id}}">{{$fs->nama}}</option>
  @endforeach
</select>
</div>
<div class="form-group">
<label for="exampleInputEmail1">Deskripsi</label>
<input name="deskripsi" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukan Kondisi">
</div> 

<div class="form-group">
<label for="exampleInputEmail1">Keterangan</label>
<input name="keterangan" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukan Kondisi">
</div>


<div class="form-group">
<label for="exampleInputEmail1">Tanggal</label>
<input name="tanggal" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukan Kondisi">
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
