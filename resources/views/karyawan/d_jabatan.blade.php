@extends('layouts.master')

@section('content')

<div class="main">
<div class="main-content">
<div class="container-fluid">
  @if(session('sukses'))
<div class="alert alert-success alert-dismissible" role="alert">
  {{session('sukses')}}
</div>
  @endif
<div class="row">
<div class="col-md-8">
<div class="panel">
<div class="panel-heading"><b>DATA JABATAN</b></div>
<div class="panel-body">
 <table class="table ">
  <thead>
    <tr>
        <td colspan="3"><center>
         <span class="input-group-btn"><button type="button" class="btn" data-toggle="modal" data-target="#exampleModal" class="btn btn-primary">+
         </button></span></center>
        </td>
        <td>
         <form class="left" method="GET" action="/karyawan">
         <div class="input-group">
         <input name="cari" type="search"  value="" class="form-control" placeholder="Cari Nama Karyawan..." aria-label="Search">
          <span class="input-group-btn"><button type="submit" class="btn btn-primary">Go</button></span>
         </div>
         </form>
        </td></tr>
        <tr>
        <td><b><center>NO</center></b></td>
        <td><b><center>ID</center></b></td>
        <td><b><center>KODE</center></b></td>
        <td><b><center>NAMA </center></b></td>

        <td><b><center>AKSI</center></b></td>
        </tr>
  </thead>
  <tbody>
   @foreach($data_jabatan as $djabatan)
        <tr>
        <td><center>{{$no++}}</center></td>
        <td>{{$djabatan->id}} </td>
        <td>{{$djabatan->kode}}</a></td>
        <td>{{$djabatan->nama}} </td>

        <td>
          <a href="/jabatan/{{$djabatan->id}}/edit" class="btn btn-warning btn-sm">Edit</a>
          <a href="/jabatan/{{$djabatan->id}}/delete" class="btn btn-danger btn-sm" onclick="return confirm('Yakin mau di hapus?')">Delete</a>

        </tr>
   @endforeach
 </tbody>
 </table>
</div>
</div>
</div>
</div>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
  <h5 class="modal-title" id="exampleModalLabel">Tambah Data Karyawan</h5>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
  <span aria-hidden="true">&times;</span>
  </button>
</div>
<div class="modal-body">
<form action="/jabatan/create" method="POST">
{{csrf_field()}}
<div class="form-group">
<label for="exampleInputEmail1">ID</label>
<input name="id" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukan NIK">
</div>
<div class="form-group">
<label for="exampleInputEmail1">Kode</label>
<input name="kode" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukan NIK">
</div>
<div class="form-group">
<label for="exampleInputEmail1">Nama Jabatan</label>
<input name="nama" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukan Nama Depan">
</div>


<div class="modal-footer">
<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
<button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
</div>
</div>
</div>

@stop
