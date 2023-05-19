@extends('layouts.master')

@section('header')

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
	<h1 class="heading"><b><center>PAY SLIP</center></b></h1>
	<h3 class="heading"><b><center>PT. KALISHA UTAMA GHANI</center></b></h3>
	<h4 class="heading"><b><center>Februari 2023</center></b></h4>
	<img width="210px" height="200px" src="{{$karyawan->getAvatar()}}" class="img-circle" alt="Avatar">
	<h3 sizes="50x50" class="name">{{$karyawan->nama_depan}} {{$karyawan->nama_belakang}}</h3>
	<span class="online-status status-available">{{$karyawan->nik}}</span>
</div>
<div class="profile-stat">
<div class="row">
<div class="col-md-4 stat-item"><center>

	No Rekening </center><span><center>{{$karyawan->bpjsksi}}</center></span>
</div>
<div class="col-md-4 stat-item">
	Jabatan <span>{{$karyawan->jabatan}}</span>
</div>
<div class="col-md-4 stat-item">
	Kantor <span>{{$karyawan->kantor}}</span>
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
	<h4 class="heading"><b><center>DETAIL GAJI</center></b></h4>
  	<table class="table  ">
			<thead>
				<tr>
					<td><b>PENDAPATAN</b></td>
					<td align="right"><b>NOMINAL</b></td>
				</tr>
			</thead>
		<tbody>
				@foreach($rentang as $rt)
				<tr>
					<td>{{$rt->tunjangan}}</td>
					<td align="right">{{formatRupiah($rt->pivot->nominal)}}</td>
				</tr>
				@endforeach
			<tr><td colspan="2"><center>Untuk Uang makan dan BBM akan di transfer pada tanggal 3 di bulan Maret</center></td></tr>
				<tr>
					<td ><b><center>TOTAL PENDAPATAN</center></b></td>
					<td align="right"><b>{{formatRupiah($jumlah)}}</b></td>
				</tr>
		</tbody>
  </table>
	
	<table class="table ">
		<thead>
			<tr>
			 <td><b>POTONGAN</b></td>
			 <td align="right"><b>NOMINAL</b></td>
		</tr>
		</thead>
	<tbody>
		@foreach($rentang1 as $rt1)
		<tr>
		 <td>{{$rt1->pengurangan}}</td>
		 <td align="right">{{formatRupiah($rt1->pivot->nominal)}}</td>
		</tr>
		 @endforeach
		 <tr><td colspan="2">Catatan: {{$karyawan->catatan2}}</td></tr>
		 <tr>
		  <td ><b><center>TOTAL POTONGAN</center></b></td>
		  <td align="right"><b>{{formatRupiah($jumlah1)}}</b></td>
		</tr>
			</tbody>
		</table>
		<table class="table table-bordered">
 			<thead>
				<tr>
 					<td><center><b>TF 24 Februari 2023</b></center></td>
 					<td><center><b>{{formatRupiah($jumlah-($jumlah1+$umakan+$bbm))}}</b></center></td>
 				</tr>
				<tr>
 					<td><center><b>TF 3 Maret 2023</b></center></td>
 					<td><center><b>{{formatRupiah($umakan+$bbm)}}</b></center></td>
 				</tr>
 				<tr>
 					<td><center><b>GAJI BERSIH</b></center></td>
 					<td><center><b>{{formatRupiah($jumlah-$jumlah1)}}</b></center></td>
 				</tr>
 			</thead>
	</table>
<center>	<a href="./exportpdffeb" class="btn btn-primary">Export PDF</a> </center>
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

@stop
@section('footer')





@stop

