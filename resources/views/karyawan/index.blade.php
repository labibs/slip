@extends('layouts.master')
@section('header')
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">  
<link  href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
@stop
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
<div class="col-md-12">
<div class="panel">
<div class="panel-heading"></div>
<div class="panel-body">
<div class="table-responsive">
 <table id="datatable" class="table table-bordered table-striped " >
  <thead>
    
        <tr>
        <td><b><center>NO</center></b></td>
        <td><b><center>NIK</center></b></td>
        <td><b><center>NAMA </center></b></td>
        <td><b><center>STATUS</center></b></td>
        <td><b><center>GENDER</center></b></td> 
        <td><b><center>JABATAN</center></b></td>
        <td><b><center>KANTOR</center></b></td>
        <td><b><center>ALAMAT</center></b></td>
        <td width="150px"><b><center>AKSI</center></b></td> 
        </tr>
  </thead>
 <tbody>
   @foreach($data_karyawan as $karyawan)
        <tr>
        <td><center>{{$no++}}</center></td>
        <td><a href="/karyawan/{{$karyawan->id}}/profile">{{$karyawan->nik}}</a></td>
        <td>{{$karyawan->nama_depan}} {{$karyawan->nama_belakang}}</td>
       
        <td><center>{{$karyawan->jenis_kelamin}}</center></td>
        <td><center>{{$karyawan->jabatan}}</center></td>
        <td>{{$karyawan->kantor}}</td>
        <td>{{$karyawan->alamat}}</td>
        <td>
          <a href="/karyawan/{{$karyawan->id}}/edit" class="btn btn-warning btn-sm">Edit</a>
          <a href="/karyawan/{{$karyawan->id}}/delete" class="btn btn-danger btn-sm" onclick="return confirm('Yakin mau di hapus?')">Delete</a>
          <a href="/karyawan/{{$karyawan->id}}/fasilitas" class="btn btn-primary btn-sm">Fasilitas</a>
        </td>
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
<form action="./karyawan/create" method="POST">
{{csrf_field()}}
<div class="form-group">
<label for="exampleInputEmail1">NIK</label>
<input name="nik" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukan NIK">
</div>
<div class="form-group">
<label for="exampleInputEmail1">Nama Depan</label>
<input name="nama_depan" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukan Nama Depan">
</div>
<div class="form-group">
<label for="exampleInputEmail1">Nama Belakang</label>
<input name="nama_belakang" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukan Nama Belakang">
</div>
<div class="form-group">
<label for="exampleFormControlSelect1">Pilih Status</label>
<select name="role" class="form-control" id="exampleFormControlSelect1">
<option value="hrd">HRD</option>
<option value="hc">Human Capital</option>
<option value="accounting">Accounting</option>
<option value="direktur">Direktur</option>
<option value="karyawan">Karyawan</option>
</select>
<div class="form-group">
<label for="exampleFormControlSelect1">Pilih Jenis Kelamin</label>
<select name="jenis_kelamin" class="form-control" id="exampleFormControlSelect1">
<option value="Pria">Laki-laki</option>
<option value="Wanita">Perempuan</option>
</select>
</div>
<div class="form-group">
<label for="karyawan">Jabatan</label>
<select name="jabatan" class="form-control" id="jabatan">
@foreach($jabatan as $jb)
<option value="{{$jb->nama}}">{{$jb->nama}}</option>
@endforeach
</select>
</div>
<div class="form-group">
<label for="karyawan">Kantor</label>
<select name="kantor" class="form-control" id="mapel">
@foreach($kantor as $kt)
<option value="{{$kt->nama}}">{{$kt->nama}}</option>
@endforeach
</select>
</div>


<div class="form-group">
<label for="exampleInputEmail1">Email</label>
<input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukan Email">
</div>
<div class="form-group">
<label for="exampleInputEmail1">Password</label>
<input name="password" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukan password">
</div>
<div class="form-group">
<label for="exampleFormControlTextarea1">Alamat</label>
<textarea name="alamat" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
</div>
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
@section('footer')

<script>
$(document).ready( function () {
    $('#datatable').DataTable({
           processing: true,
           serverSide: true,
           ajax: "{{ url('karyawan') }}",
    </script>
@stop
