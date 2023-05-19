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
	<h1 class="heading"><b><center>ABSENSI</center></b></h1>
	<h3 class="heading"><b><center>PT. KALISHA UTAMA GHANI</center></b></h3>
	<h4 class="heading"><b>Juli 2022</b></h4>
	<img width="210px" height="200px" src="{{$karyawan->getAvatar()}}" class="img-circle" alt="Avatar">
	<h3 sizes="50x50" class="name">{{$karyawan->nama_depan}} {{$karyawan->nama_belakang}}</h3>
	<span class="online-status status-available">{{$karyawan->nik}}</span>
</div>
<div class="profile-stat">
<div class="row">

	<div class="col-md-4 stat-item"><center>
	Jatah Beras : </center><span><center>{{$karyawan->agama}}</center></span>
    </div>
	<div class="col-md-8 stat-item"><center>
	Masa Kerja : </center><span><center>{{$karyawan->pendidikan}}</center></span>
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
	<h4 class="heading"><b><center>DETAIL ABSENSI</center></b></h4>
  	<table class="table">
			
		<thead>
			<tr>
			 <td><b>JENIS ABSESNSI</b></td>
			 <td align="right"><center><b>JUMLAH</center></b></td>
		</tr>
		</thead>
	<tbody>
		<tr>
			<td>Hari dalam 1 bulan</td>
			<td><center>31</center></td>
		</tr>
		@foreach($bulanini as $abs)
		<tr>
		 <td>{{$abs->jenis}}</td>
		 <td align="right"><center>{{$abs->pivot->jumlah}}</center></td>
		</tr>
		 @endforeach
		 
 			</thead>
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

<script src="bootstrap-editable/js/bootstrap-editable.js"></script>
<script >
$(document).ready(function() {
        $('.nominal').editable({
            mode: 'inline',
        });
});
          </script>



@stop
