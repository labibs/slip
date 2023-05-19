
<div id="sidebar-nav" class="sidebar">
  <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 95%;"><div class="sidebar-scroll" style="overflow: hidden; width: auto; height: 95%;">
    <nav>
		
      <ul class="nav">
        
        @if(auth()->user()->role == 'karyawan')
		  
		<li><a href="/slip/public/home" class=""><i class="lnr lnr-home"></i> <span>Home</span></a></li>
		
       <li><a href="/slip/public/karyawan/{{auth()->user()->id}}/absen" class=""><i class="lnr lnr-calendar-full"></i> <span>Absensi</span></a></li>
	  <li><a href="/slip/public/slipgaji" class=""><i class="lnr lnr-license"></i> <span>Slip Gaji</span></a></li>
    <li><a href="/slip/public/karyawan/{{auth()->user()->id}}/v_fasilitas" class=""><i class="lnr lnr-shirt"></i> <span>Fasilitas (project)</span></a></li>
		<li><a href="/slip/public/karyawan/{{auth()->user()->id}}/fasilitas" class=""><i class="lnr lnr-leaf"></i> <span>BPJS</span></a></li>
		<!-- <li> <a href="#subPages" data-toggle="collapse" class="" aria-expanded="true"><i class="lnr lnr-license"></i> <span>Slip Gaji</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
        <div id="subPages" class="collapse " aria-expanded="true" style="">
        	<ul class="nav">	 
		<li><a href="/karyawan/{{auth()->user()->id}}/slipap" class=""><i class="lnr lnr-license"></i> <span>April 2021</span></a></li>
		<li><a href="/karyawan/{{auth()->user()->id}}/slipmei" class=""><i class="lnr lnr-license"></i> <span>Mei 2021</span></a></li>
		<li><a href="/karyawan/{{auth()->user()->id}}/slipjun" class=""><i class="lnr lnr-license"></i> <span>Juni 2021</span></a></li>
		<li><a href="/karyawan/{{auth()->user()->id}}/slipjul" class=""><i class="lnr lnr-license"></i> <span>Juli 2021</span></a></li> -->
		   @elseif(auth()->user()->role == 'karyawan pic')
		  
		<li><a href="/slip/public/home" class=""><i class="lnr lnr-home"></i> <span>Home</span></a></li>
		<li><a href="/slip/public/dasbor" class=""><i class="lnr lnr-screen"></i> <span>Kumpulan Dashboard</span></a></li>
       <li><a href="/slip/public/karyawan/{{auth()->user()->id}}/absen" class=""><i class="lnr lnr-calendar-full"></i> <span>Absensi</span></a></li>
	  <li><a href="/slip/public/slipgaji" class=""><i class="lnr lnr-license"></i> <span>Slip Gaji</span></a></li>
		
		<li><a href="/slip/public/karyawan/{{auth()->user()->id}}/fasilitas" class=""><i class="lnr lnr-shirt"></i> <span>BPJS</span></a></li>
				
        @elseif(auth()->user()->role == 'accounting')
		<li><a href="/slip/public/home" class=""><i class="lnr lnr-home"></i> <span>Home</span></a></li>
		<li><a href="/slip/public/dasbor" class=""><i class="lnr lnr-screen"></i> <span>Kumpulan Dashboard</span></a></li>
        <li><a href="/slip/public/karyawan/{{auth()->user()->id}}/absen" class=""><i class="lnr lnr-calendar-full"></i> <span>Absensi</span></a></li>
		<li><a href="/slip/public/slipgaji" class=""><i class="lnr lnr-license"></i> <span>Slip Gaji</span></a></li>
        <li><a href="/slip/public/karyawan/{{auth()->user()->id}}/fasilitas" class=""><i class="lnr lnr-shirt"></i> <span>BPJS</span></a></li>
        <li><a href="/slip/public/potongant" class="" ><i class="lnr lnr-circle-minus"></i> <span>Data Potongan</span></a></li>
				
				@elseif(auth()->user()->role == 'koordinator')
		<li><a href="/slip/public/home" class=""><i class="lnr lnr-home"></i> <span>Home</span></a></li>
		<li><a href="/slip/public/dasbor" class=""><i class="lnr lnr-screen"></i> <span>Kumpulan Dashboard</span></a></li>
        <li><a href="/slip/public/karyawan/{{auth()->user()->id}}/absen" class=""><i class="lnr lnr-calendar-full"></i> <span>Absensi</span></a></li>
		<li><a href="/slip/public/slipgaji" class=""><i class="lnr lnr-license"></i> <span>Slip Gaji</span></a></li>
        <li><a href="/slip/public/karyawan/{{auth()->user()->id}}/fasilitas" class=""><i class="lnr lnr-shirt"></i> <span>BPJS</span></a></li>
        <li><a href="/slip/public/berkast" class="" ><i class="lnr lnr-file-add"></i> <span>Data Human Capital</span></a></li>
					
        @elseif(auth()->user()->role == 'direktur')
		<li><a href="/slip/public/home" class="active"><i class="lnr lnr-home"></i> <span>Home</span></a></li>
		<li><a href="/slip/public/dasbor" class=""><i class="lnr lnr-screen"></i> <span>Kumpulan Dashboard</span></a></li>
        <li><a href="/slip/public/gajit" class="" ><i class="lnr lnr-printer"></i> <span>Laporan Gaji</span></a></li>
		<li><a href="/slip/public/slipgaji" class=""><i class="lnr lnr-license"></i> <span>Slip Gaji</span></a></li>
		<li><a href="/slip/public/karyawan/{{auth()->user()->id}}/fasilitas" class=""><i class="lnr lnr-shirt"></i> <span>BPJS</span></a></li>
		
        @elseif(auth()->user()->role == 'hc')
		<li><a href="/slip/public/home" class="active"><i class="lnr lnr-home"></i> <span>Home</span></a></li>
		<li><a href="/slip/public/dasbor" class=""><i class="lnr lnr-screen"></i> <span>Kumpulan Dashboard</span></a></li>
        <li><a href="/slip/public/karyawan/{{auth()->user()->id}}/absen" class=""><i class="lnr lnr-calendar-full"></i> <span>Absensi</span></a></li>
	    <li><a href="/slip/public/slipgaji" class=""><i class="lnr lnr-license"></i> <span>Slip Gaji</span></a></li>
        <li><a href="/slip/public/karyawan/{{auth()->user()->id}}/fasilitas" class=""><i class="lnr lnr-shirt"></i> <span>BPJS</span></a></li>
        <li>
        <a href="#subPages" data-toggle="collapse" class="" aria-expanded="true"><i class="lnr lnr-database"></i> <span>Master Data</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
        <div id="subPages" class="collapse " aria-expanded="true" style="">
        	<ul class="nav">
        <li><a href="/slip/public/karyawant" class="" ><i class="lnr lnr-users"></i> <span>Data Karyawan</span></a></li>
        <li><a href="/slip/public/absent" class=""><i class="lnr lnr-calendar-full"></i> <span>Data Absensi</span></a></li>
        <li><a href="/slip/public/usert" class="" ><i class="lnr lnr-user"></i> <span>Data User</span></a></li>
        <li><a href="/slip/public/karyawan/{{auth()->user()->id}}/v_fasilitas" class=""><i class="lnr lnr-license"></i> <span>Inventaris</span></a></li>
        <li><a href="/slip/public/jabatant" class="" ><i class="lnr lnr-mustache"></i> <span>Data Jabatan</span></a></li>
        <li><a href="/slip/public/kantor" class="" ><i class="lnr lnr-apartment"></i> <span>Data Kantor</span></a></li>
        @else(auth()->user()->role == 'hrd')
		 <li><a href="/slip/public/home" class="active"><i class="lnr lnr-home"></i> <span>Home</span></a></li>
		 <li><a href="/slip/public/dasbor" class=""><i class="lnr lnr-screen"></i> <span>Kumpulan Dashboard</span></a></li>
         
         <li>
        <a href="#subPages" data-toggle="collapse" class="" aria-expanded="true"><i class="lnr lnr-database"></i> <span>Master Data</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
        <div id="subPages" class="collapse " aria-expanded="true" style="">
        	<ul class="nav">
        <li><a href="/slip/public/karyawant" class="" ><i class="lnr lnr-users"></i> <span>Data Karyawan</span></a></li>
				 <li><a href="/slip/public/usert" class="" ><i class="lnr lnr-user"></i> <span>Data User</span></a></li>
				 
        <li><a href="/slip/public/absent" class=""><i class="lnr lnr-calendar-full"></i> <span>Data Absensi</span></a></li>
				 <li><a href="/slip/public/gajit" class="" ><i class="lnr lnr-printer"></i> <span>Laporan Gaji</span></a></li>
				<li><a href="/slip/public/slipgaji" class=""><i class="lnr lnr-license"></i> <span>Slip Gaji</span></a></li>
        
      <li><a href="/slip/public/karyawan/{{auth()->user()->id}}/v_fasilitas" class=""><i class="lnr lnr-shirt"></i> <span>Inventaris</span></a></li>
         <li><a href="/slip/public/karyawan/{{auth()->user()->id}}/absen" class=""><i class="lnr lnr-calendar-full"></i> <span>Absensi</span></a></li>
         <li><a href="/slip/public/karyawan/{{auth()->user()->id}}/fasilitas" class=""><i class="lnr lnr-leaf"></i> <span>BPJS</span></a></li>
        
        
				 <li><a href="./berkast" class="" ><i class="lnr lnr-file-add"></i> <span>Data Human Capital</span></a></li>
       
			<!--	 <li><a href="/fasilitast" class="" ><i class="lnr lnr-mustache"></i> <span>Data Undangan</span></a></li>
        <li><a href="/jabatant" class="" ><i class="lnr lnr-mustache"></i> <span>Data Jabatan</span></a></li>
        <li><a href="/kantor" class="" ><i class="lnr lnr-apartment"></i> <span>Data Kantor</span></a></li> -->
         @endif
      </ul>
    </nav>
			
  </div>
			
  <div class="slimScrollBar" style="background: rgb(0, 0, 0); width: 7px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 572px;"></div>
  			<div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;"></div>
  		</div>

  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
  <script src="assets/vendor/toastr/toastr.min.js"></script>
  <script src="assets/scripts/klorofil-common.js"></script>

</div>
