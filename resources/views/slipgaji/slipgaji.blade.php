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
					<h3 class="panel-title">Slip Gaji :</h3><br>
				</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-md-3 ">
									<div class="item-entry">
                                    <div class="card" data-background="image" style="background-image: url('https://jne-cilacap.com/slip/images/foto-1627002810.jpg')">
                                        <div class="card-body">
                                            <h5 style="opacity: 0.75;">JANUARI</h5>
                                            <div class="card-icon" style="margin-top: 0px; margin-bottom: 40px;">
                                                <h2 style="opacity: 0.75;">2023 </h2>
                                                <p style="color: white; margin-top: 0px;"></p>
                                            </div>
                                                <a href="./karyawan/{{auth()->user()->id}}/slipjan" class="btn btn-danger btn-round">LIHAT</a>
                                        </div>
                                    </div>
                                </div>
								</div>
								<div class="col-md-3">
									<div class="item-entry">
                                    <div class="card" data-background="image" style="background-image: url('https://jne-cilacap.com/slip/images/foto-1627002810.jpg')">
                                        <div class="card-body">
                                            <h5 style="opacity: 0.75;">FEBRUARI</h5>
                                            <div class="card-icon" style="margin-top: 0px; margin-bottom: 40px;">
                                                <h2 style="opacity: 0.75;">2023 </h2>
                                                <p style="color: white; margin-top: 0px;"></p>
                                            </div>
                                                <a href="./karyawan/{{auth()->user()->id}}/slipfeb" class="btn btn-danger btn-round">LIHAT</a>
                                        </div>
                                    </div>
                                </div>
								</div>
								<div class="col-md-3">
									<div class="item-entry">
                                    <div class="card" data-background="image" style="background-image: url('https://jne-cilacap.com/slip/images/foto-1627002810.jpg')">
                                        <div class="card-body">
                                            <h5 style="opacity: 0.75;">MARET</h5>
                                            <div class="card-icon" style="margin-top: 0px; margin-bottom: 40px;">
                                                <h2 style="opacity: 0.75;">2023</h2>
                                                <p style="color: white; margin-top: 0px;"></p>
                                            </div>
                                                <a href="./karyawan/{{auth()->user()->id}}/slipmar" class="btn btn-danger btn-round">LIHAT</a>
                                        </div>
                                    </div>
                                </div>
								</div>
								<div class="col-md-3">
									<div class="item-entry">
                                    <div class="card" data-background="image" style="background-image: url('https://jne-cilacap.com/slip/images/foto-1627002810.jpg')">
                                        <div class="card-body">
                                            <h5 style="opacity: 0.75;">APRIL</h5>
                                            <div class="card-icon" style="margin-top: 0px; margin-bottom: 40px;">
                                                <h2 style="opacity: 0.75;">2023 </h2>
                                                <p style="color: white; margin-top: 0px;"></p>
                                            </div>
                                                <a href="./karyawan/{{auth()->user()->id}}/slipap" class="btn btn-danger btn-round">LIHAT</a>
                                        </div>
                                    </div>
                                </div>
								</div>
								<div class="col-md-3">
									<div class="item-entry">
                                    <div class="card" data-background="image" style="background-image: url('https://jne-cilacap.com/slip/images/foto-1627002810.jpg')">
                                        <div class="card-body">
                                            <h5 style="opacity: 0.75;">MEI</h5>
                                            <div class="card-icon" style="margin-top: 0px; margin-bottom: 40px;">
                                                <h2 style="opacity: 0.75;">2022</h2>
                                                <p style="color: white; margin-top: 0px;"></p>
                                            </div>
                                                <a href="./karyawan/{{auth()->user()->id}}/slipmei" class="btn btn-danger btn-round">LIHAT</a>
                                        </div>
                                    </div>
                                </div>
								</div>
								<div class="col-md-3">
									<div class="item-entry">
                                    <div class="card" data-background="image" style="background-image: url('https://jne-cilacap.com/slip/images/foto-1627002810.jpg')">
                                        <div class="card-body">
                                            <h5 style="opacity: 0.75;">JUNI</h5>
                                            <div class="card-icon" style="margin-top: 0px; margin-bottom: 40px;">
                                                <h2 style="opacity: 0.75;">2022 </h2>
                                                <p style="color: white; margin-top: 0px;"></p>
                                            </div>
                                                <a href="./karyawan/{{auth()->user()->id}}/slipjun" class="btn btn-danger btn-round">LIHAT</a>
                                        </div>
                                    </div>
                                </div>
								</div>
								<div class="col-md-3">
									<div class="item-entry">
                                    <div class="card" data-background="image" style="background-image: url('https://jne-cilacap.com/slip/images/foto-1627002810.jpg')">
                                        <div class="card-body">
                                            <h5 style="opacity: 0.75;">JULI</h5>
                                            <div class="card-icon" style="margin-top: 0px; margin-bottom: 40px;">
                                                <h2 style="opacity: 0.75;">2022</h2>
                                                <p style="color: white; margin-top: 0px;"></p>
                                            </div>
                                                <a href="./karyawan/{{auth()->user()->id}}/slipjul" class="btn btn-danger btn-round">LIHAT</a>
                                        </div>
                                    </div>
                                </div>
								</div>
								
							<div class="col-md-3">
									<div class="item-entry">
                                    <div class="card" data-background="image" style="background-image: url('https://jne-cilacap.com/slip/images/foto-1627002810.jpg')">
                                        <div class="card-body">
                                            <h5 style="opacity: 0.75;">AGUSTUS</h5>
                                            <div class="card-icon" style="margin-top: 0px; margin-bottom: 40px;">
                                                <h2 style="opacity: 0.75;">2022</h2>
                                                <p style="color: white; margin-top: 0px;"></p>
                                            </div>
                                                <a href="./karyawan/{{auth()->user()->id}}/slipag" class="btn btn-danger btn-round">LIHAT</a>
                                        </div>
                                    </div>
                                </div>
								</div>
								<div class="col-md-3">
									<div class="item-entry">
                                    <div class="card" data-background="image" style="background-image: url('https://jne-cilacap.com/slip/images/foto-1627002810.jpg')">
                                        <div class="card-body">
                                            <h5 style="opacity: 0.75;">SEPTEMBER</h5>
                                            <div class="card-icon" style="margin-top: 0px; margin-bottom: 40px;">
                                                <h2 style="opacity: 0.75;">2022</h2>
                                                <p style="color: white; margin-top: 0px;"></p>
                                            </div>
                                                <a href="./karyawan/{{auth()->user()->id}}/slipsep" class="btn btn-danger btn-round">LIHAT</a>
                                        </div>
                                    </div>
                                </div>
								</div>
								<div class="col-md-3">
									<div class="item-entry">
                                    <div class="card" data-background="image" style="background-image: url('https://jne-cilacap.com/slip/images/foto-1627002810.jpg')">
                                        <div class="card-body">
                                            <h5 style="opacity: 0.75;">OKTOBER</h5>
                                            <div class="card-icon" style="margin-top: 0px; margin-bottom: 40px;">
                                                <h2 style="opacity: 0.75;">2022</h2>
                                                <p style="color: white; margin-top: 0px;"></p>
                                            </div>
                                                <a href="./karyawan/{{auth()->user()->id}}/slipok" class="btn btn-danger btn-round">LIHAT</a>
                                        </div>
                                    </div>
                                </div>
								</div>
								<div class="col-md-3">
									<div class="item-entry">
                                    	<div class="card" data-background="image" style="background-image: url('https://jne-cilacap.com/slip/images/foto-1627002810.jpg')">
                                        	<div class="card-body">
                                            	<h5 style="opacity: 0.75;">NOVEMBER</h5>
                                            	<div class="card-icon" style="margin-top: 0px; margin-bottom: 40px;">
                                                	<h2 style="opacity: 0.75;">2022</h2>
                                                	<p style="color: white; margin-top: 0px;"></p>
                                            	</div>
                                                <a href="./karyawan/{{auth()->user()->id}}/slipnov" class="btn btn-danger btn-round">LIHAT</a>
                                        	</div>
                                    	</div>
                                	</div>
								</div>
								<div class="col-md-3">
									<div class="item-entry">
                                    	<div class="card" data-background="image" style="background-image: url('https://jne-cilacap.com/slip/images/foto-1627002810.jpg')">
                                        	<div class="card-body">
                                            	<h5 style="opacity: 0.75;">DESEMBER</h5>
                                            	<div class="card-icon" style="margin-top: 0px; margin-bottom: 40px;">
                                                	<h2 style="opacity: 0.75;">2022</h2>
                                                	<p style="color: white; margin-top: 0px;"></p>
                                            	</div>
                                                <a href="./karyawan/{{auth()->user()->id}}/slipdes" class="btn btn-danger btn-round">LIHAT</a>
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
