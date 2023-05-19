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
	
	<h2 class="heading"><b><center>BPJS Ketenagakerjaan</center></b></h2>
	<h4 class="heading"><b><center>Untuk mendapatkan informasi lengkap tentang layanan BPJS Ketenagakerjaan ( info saldo, Kartu digital dll ), silahkan klik <a href="https://sso.bpjsketenagakerjaan.go.id">versi WEB</a>/ download aplikasi BPJSTKU di  </center></b></h4>
	 
	<a href="https://play.google.com/store/apps/details?id=com.bpjstku&hl=in"><img width="150px" height="40px"  src="{{asset('/admin/assets/img/android.png')}}" class="col-md-6 mt-2" alt="Avatar"></a>
	<h4> </h4>
	<a href="https://apps.apple.com/id/app/bpjstku/id1444834757">
    <img width="150px" height="40px" src="{{asset('/admin/assets/img/appstore.png')}}" class="col-md-6 mt-2" alt="Avatar">
	</a>	
	<h4> </h4>
	<img width="280px" height="300px" src="{{asset('/admin/assets/img/bpjstku.png')}}" class="" alt="Avatar">
	<h3 sizes="50x50" class="name">Nama : {{$karyawan->nama_lengkap}}</h3>
	<h3 sizes="50x50" class="name">Nomer KPJ : {{$karyawan->bpjstk}}</h3>
	
</div>
	
<div class="profile-stat">
<div class="row">


</div>
</div>
</div>
<!-- END PROFILE HEADER -->
<!-- PROFILE DETAIL -->

<!-- END PROFILE DETAIL -->
</div>
<!-- END LEFT COLUMN -->
<!-- RIGHT COLUMN -->

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
<h2 class="heading"><b><center>BPJS Kesehatan</center></b></h2>
	<h4 class="heading"><b><center>Untuk mendapatkan informasi lengkap tentang layanan BPJS Kesehatan ( mengubah faskes, mengetahui anggota keluarga yang terdaftar, Kartu digital dll ), silahkan download aplikasi Mobile JKN di  </center></b></h4>
	 
	<a href="https://play.google.com/store/apps/details?id=app.bpjs.mobile&hl=in"><img width="150px" height="40px"  src="{{asset('/admin/assets/img/android.png')}}" class="col-md-6 mt-2" alt="Avatar"></a>
	<h4> </h4>
	<a href="https://apps.apple.com/id/app/mobile-jkn/id1237601115">
    <img width="150px" height="40px" src="{{asset('/admin/assets/img/appstore.png')}}" class="col-md-6 mt-2" alt="Avatar">
	</a>	
	<h4> </h4>
	<img width="280px" height="300px" src="{{asset('/admin/assets/img/mobilejkn.png')}}" class="" alt="Avatar">
	<h3 sizes="50x50" class="name">Nomer JKN-KIS : {{$karyawan->bpjsks}}</h3>
	</div>
	
<div class="profile-stat">
<div class="row">
<div class="col-md-3 stat-item"><center>

  Catatan : </center><span><center>{{$karyawan->catatan3}}</center></span>
</div>

</div>
</div>
</div>
<!-- END PROFILE HEADER -->
<!-- PROFILE DETAIL -->

<!-- END PROFILE DETAIL -->
</div>
<!-- END LEFT COLUMN -->
<!-- RIGHT COLUMN -->

<!-- END AWARDS -->
<!-- TABBED CONTENT -->
<!-- END TABBED CONTENT -->
</div>
<!-- END RIGHT COLUMN -->
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
