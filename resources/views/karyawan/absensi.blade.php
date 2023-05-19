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
        <div class="col-md-12">
          <div class="panel">
            <div class="panel-heading">
            </div>
            <div class="panel-body">
              <table class="table ">
                <thead>
                  <tr><td colspan="6">
                 <h4><center><b>DATA ABSENSI</b></center></h4>
               </td>
               <td >
                 <form class="center" method="GET" action="/pendapatan">
                   <div class="input-group">
                     <input name="cari" type="search"  value="" class="form-control" placeholder="Cari Nama Karyawan..." aria-label="Search">
                     <span class="input-group-btn"><button type="submit" class="btn btn-primary">Go</button></span>
                   </div>
                 </form>
               </td>
                     <tr>
                       <td><b><center>NO</center></b></td>
                       <td><b><center>NIK</center></b></td>
                       <td><b><center>NAMA KARYAWAN</center></b></td>
                       <td><b><center>JENIS KELAMIN</center></b></td>
                       <td><b><center>JABATAN</center></b></td>
                       <td><b><center>KANTOR</center></b></td>
                        <td><b><center>AKSI</center></b></td>
                        <td><b><center>Detail</center></b></td>
                     </tr>
                   </thead>
                   <tbody>
                     @foreach($data_karyawan as $karyawan)
                 <tr>
                   <td><center>{{$no++}}</center></td>
                   <td><center>{{$karyawan->nik}}</center></td>
                   <td>{{$karyawan->nama_depan}} {{$karyawan->nama_belakang}}</td>
                   <td><center>{{$karyawan->jenis_kelamin}}</center></td>
                   <td><center>{{$karyawan->jabatan}}</center></td>
                   <td><center>{{$karyawan->kantor}}</center></td>
                   <td><center><a href="/karyawan/{{$karyawan->id}}/d_absen" class="btn btn-warning btn-sm">Proses</a> <a href="/karyawan/{{$karyawan->id}}/absen" class="btn btn-primary btn-sm">Lihat</a></td></center>
                   <td><center><a  class="btn btn-success btn-xs" data-toggle="modal"  data-target="#modal-detail"  >Lihat Data</center></td>
                 </tr>
                  @endforeach
                   </tbody>
                 </table>
               </div>
             </div>
        </div>
      </div>
    <div>
  </div>
</div>

<!-- Modal -->

<div class="modal fade" id="#modal-detail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Data siswa</h4>
				</div>
				<!-- memulai untuk konten dinamis -->
				<!-- lihat id="data_siswa", ini yang di pangging pada ajax di bawah -->
				<div class="modal-body" id="data_siswa">
				</div>
				<!-- selesai konten dinamis -->
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>


@stop
