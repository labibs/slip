@extends('layouts.master')

@section('content')
	


<link rel="stylesheet" href="https://multi.co.id/assets/shop2/css/paper-kit.css?v=2.1.0">

<link rel="stylesheet" href="https://multi.co.id/assets/shop/css/style.css">

	<style type="text/css">
		div{	}			
	</style>
<!-- Dashboard Profile -->
<div class="main">
	<!-- MAIN CONTENT -->
	<div class="main-content">
		<div class="container-fluid">
		<!-- OVERVIEW -->
			<div class="panel panel-headline">
				<div class="panel-heading">
					<h3 class="panel-title">BPJS :</h3><br>
				</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-md-6">
									<div class="item-entry">
                                    <div class="card" data-background="image" style="background-image: url('https://jne-cilacap.com/slip/images/bpjstku.jpg')">
                                        <div class="card-body">
                                            <h5 style="opacity: 0.75;">BPJS KETENAGAKERJAAN</h5>
                                            <div class="card-icon" style="margin-top: 0px; margin-bottom: 40px;">
												<h5 style="opacity: 0.75;"> Nama : {{$karyawan->nama_depan}} {{$karyawan->nama_belakang}}</h5>
                                                <h5 style="opacity: 0.75;"> Nomer KPJ : {{$karyawan->bpjstk}}</h5>
                                                <p style="color: white; margin-top: 0px;">Untuk mendapatkan informasi lengkap tentang layanan BPJS Ketenagakerjaan ( info saldo, Kartu digital dll ), silahkan klik <a href="https://sso.bpjsketenagakerjaan.go.id"class="btn btn-info btn-round">versi WEB</a></p>
												<p>atau download di</p>
                                            </div>
                                                <a href="https://play.google.com/store/apps/details?id=com.bpjstku&hl=in" class="btn btn-primary btn-round">PLAYSTORE</a>
											
											<a href="https://apps.apple.com/id/app/bpjstku/id1444834757" class="btn btn-danger btn-round">APPSTORE</a>
                                        </div>
                                    </div>
                                </div>
								</div>
								<div class="col-md-6">
									<div class="item-entry">
                                    <div class="card" data-background="image" style="background-image: url('https://jne-cilacap.com/slip/images/bpjsks.png')">
                                        <div class="card-body">
                                            <h5 style="opacity: 0.75;">BPJS KESEHATAN</h5>
                                            <div class="card-icon" style="margin-top: 0px; margin-bottom: 40px;">
												<h5 style="opacity: 0.75;"> Nama : {{$karyawan->nama_depan}} {{$karyawan->nama_belakang}}</h5>
                                                <h5 style="opacity: 0.75;"> Nomer JKN-KIS : {{$karyawan->bpjsks}}</h5>
                                                <p style="color: white; margin-top: 0px;">Untuk mendapatkan informasi lengkap tentang layanan BPJS Kesehatan ( mengubah faskes, mengetahui anggota keluarga yang terdaftar, Kartu digital dll ), silahkan download aplikasi Mobile JKN di </p><br>
                                            </div>
                                                <a href="https://play.google.com/store/apps/details?id=app.bpjs.mobile&hl=in" class="btn btn-primary btn-round">PLAYSTORE</a>
											<a href="https://apps.apple.com/id/app/mobile-jkn/id1237601115" class="btn btn-danger btn-round">APPSTORE</a>
                                        </div>
                                    </div>
                                </div>
								</div>
								</div>
						</div>
								
			</div>
		</div>
	</div>
</div>

								
@stop
