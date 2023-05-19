<html>
<head>
<title>slip</title>
</head>

<body>
<table rules="all"  border="0" cellpadding="5" width="600 px">>
    <tbody>
	  
	   <tr>
	     <td rowspan="3" colspan="2"  width="100px" ><center><img src="{{asset('admin/assets/img/logokug.png')}}" height="100" width="200" align="center"></center></td>
		 <td rowspan="2" colspan="3" width="500px"><center><b><font size="7">SALARY SLIP</font></b></center></td>
		 
	   <tr>
	   </tr>
	   <tr>
	     <td colspan="3"><center><b><font size="5">PT. KALISHA UTAMA GHANI</font></b></center></td> 
	   </tr>
	   </tbody>
	   </table>
	   <table width="700 px" border="1" cellpadding="1" rules="rows" >
	   <tbody>
	   <tr>
	     <td>Nama Karyawan</td>
		 <td>:</td>
		 <td>{{$karyawan->nama_depan}} {{$karyawan->nama_belakang}}</td>
		 <td>Jabatan</td>
		 <td>:</td>
		 <td>{{$karyawan->jabatan}}</td>
		 
	   </tr>
	   <tr>
	     <td>NIK</td>
		 <td>:</td>
		 <td>{{$karyawan->nik}}</td>
		 <td>Kantor</td>
		 <td>:</td>
		 <td>{{$karyawan->kantor}}</td>
		 
	   </tr>
	   <tr>
	     <td>BPJS Kesehatan</td>
		 <td>:</td>
		 <td>{{$karyawan->bpjsks}}</td>
		 <td>BPJS Ketenagakerjaan</td>
		 <td>:</td>
		 <td>{{$karyawan->bpjstk}}</td>	 
	   </tr>
	</tbody>
</table>
	
	<table border="1" rules="all" cellpadding="15" >
  <tbody>
  <tr>
  <center><b>PERINCIAN ABSENSI</b></center>
  </tr>
  </tbody>
</table>
<table class="table-responsive" width="525" border="1" rules="all">
	<thead>
		<tr bgcolor="#6495ED">
					<td width="334"><center><b>JENIS </b></center></td>
				<td align="right"><center><b>JUMLAH</b></center></td>
		</tr>
	</thead>
  <tbody>
	   <tr>
			<td>Hari dalam 1 bulan</td>
			<td><center>31</center></td>
		</tr>
               @foreach($bulanini as $bi)
				<tr>
					<td>{{$bi->jenis}}</td>
					<td align="right"><center>{{$bi->pivot->jumlah}}</center></td>
				</tr>
				@endforeach
	  
	  <tr>
		  <td>Masa Kerja     </td>
		  <td><center>{{$karyawan->pendidikan}}</center></td>
	  </tr>
  </tbody>
</table>

<table border="1" rules="all" cellpadding="15">
  <tbody>
  <tr>
  <center><b>PERINCIAN GAJI</b></center>
  </tr>
  </tbody>
</table>
<table class="table-responsive" width="525" border="1" rules="all">
	<thead>
				
				<tr bgcolor="#7FFF00">
					<td><center><b>PENDAPATAN</b></center></td>
					<td align="right"><center><b>NOMINAL</b></center></td>
				</tr>
			</thead>
		<tbody>
			
				@foreach($rentang as $rt)
				<tr>
					<td>{{$rt->tunjangan}}</td>
					<td align="right">{{formatRupiah($rt->pivot->nominal)}}</td>
				</tr>
				@endforeach
			    <tr>
					<td colspan="2">Beras : {{$karyawan->agama}} Kg</td>
			</tr>
				<tr>
					<td ><b><center>TOTAL PENDAPATAN</center></b></td>
					<td align="right"><b>{{formatRupiah($jumlah)}}</b></td>
				</tr>
        </tbody>
			
			<tr bgcolor="#DC143C">
			 <td ><center><b>POTONGAN</b></center></td>
			 <td align="right"><center><b>NOMINAL</b></center></td>
		</tr>		
	<tbody>
		@foreach($rentang1 as $rt1)
		<tr>
		 <td>{{$rt1->pengurangan}}</td>
		 <td align="right">{{formatRupiah($rt1->pivot->nominal)}}</td>
		</tr>
		 @endforeach
		 <tr><td colspan="2">Catatan : {{$karyawan->catatan8}}</td></tr>
		 <tr>
		  <td ><b><center>TOTAL POTONGAN</center></b></td>
		  <td align="right"><b>{{formatRupiah($jumlah1)}}</b></td>
		</tr>
			</tbody>

	<table width="700 px" border="1" cellpadding="1" rules="rows">
	   <tbody>
		   
	   <tr>
	     <td>Tanggal Transfer</td>
		 <td>:</td>
		 <td>25 Agustus 2022</td>
		 <td colspan="3"  width="250 px" ><center><b>{{formatRupiah($jumlah-($jumlah1+$umakan+$bbm))}}</b></center></td>
	   </tr>
		   <tr>
	     <td>Tanggal Transfer</td>
		 <td>:</td>
		 <td>5 September 2022</td>
		 <td colspan="3"  width="250 px" ><center><b>{{formatRupiah($umakan+$bbm)}}</b></center></td>
	   </tr>
	   <tr>
	     <td>Nama Bank</td>
		 <td>:</td>
		 <td>Mandiri</td>
		   <td colspan="3" rowspan="2" bgcolor="#F0F8FF"><center><b><font size="5">{{formatRupiah($jumlah-$jumlah1)}}</font></b></center></td>
	   </tr>
	   <tr>
	     <td>Nomer Rekening</td>
		 <td>:</td>
		 <td>{{$karyawan->bpjsksi}}</td>
		 
	   </tr>
	   
	</tbody>
</table>
</body>

</html>