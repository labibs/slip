@extends('layouts.master')
    
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

    @section('content')	
<body>
<div class="main"> 
<div class="main-content">   
<div class="container-fluid">
@if(session('sukses'))
<div class="alert alert-success alert-dismissible" role="alert">
  {{session('sukses')}}
</div>
  @endif
<div class="panel">

<div class="panel-heading"><h1>Data Karyawan </h1>

<div class="card">
  
</div>
</div>
<center>
<button type="button" data-toggle="modal" data-target="#exampleModal"  class="btn btn-success">Tambah Data Karyawan</button>
</center><div class="panel-body">

<div class="table-responsive">

    <table class="table table-bordered table-striped data-table">
        <thead>
            <tr>
                <th>No</th>
                <th>NIK</th>
                <th>Nama Karyawan</th>
                <th>Jenis Kelamin</th>
                <th>Jabatan</th>
                <th>Kantor</th>
                
                <th width="180px">Action</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>
</div>
</div>
</div>
</div>
</div>
</body>
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
<form action="/slip/public/karyawan/create" method="POST">
{{csrf_field()}}
<div class="form-group">
<label for="exampleInputEmail1">NIK</label>
<input name="nik" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukan NIK">
</div>
<div class="form-group">
<label for="exampleInputEmail1">Nama Depan</label>
<input name="nama_depan" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukan Nama Depan" required>
</div>
<div class="form-group">
<label for="exampleInputEmail1">Nama Belakang</label>
<input name="nama_belakang" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukan Nama Belakang" required>
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
<label for="karyawan">Pilih Jenis Kelamin</label>
<select name="jenis_kelamin" class="form-control" id="jenis_kelamin">
<option value="Pria">Pria</option>
<option value="Wanita">Wanita</option>
</select>
</div>
<div class="form-group">
<label for="karyawan">Jabatan</label>
<select name="jabatan" class="form-control" id="jabatan">
<option value="Accounting">Accounting</option>
<option value="HC">Human Capital</option>
<option value="Direktur">Direktur</option>
<option value="Driver">Driver</option>
<option value="Rider">Rider</option>
<option value="Inbound">Inbound</option>
<option value="Outbound">Outbound</option>
<option value="SCO">SCO</option>
<option value="Pick-up">Pick-up</option>
<option value="Sales Coorporate">Sales Coorporate</option>
<option value="Sales Marketing">Sales Marketing</option>
<option value="Customer Service">Customer Service</option>
<option value="Finance">Finance</option>
<option value="Admin Support">Admin Support</option>
<option value="Admin Delivery">Admin Delivery</option>
<option value="POD dan Undel">POD dan Undel</option>
<option value="Office Boy">Office Boy</option>
<option value="Rdr Crowdsourcing">Rdr Crowdsourcing</option>
<option value="Peakseason">Peakseason</option>
<option value="GA & IT">GA & IT</option>
</select>
</div>
<div class="form-group">
<label for="karyawan">Kantor</label>
<select name="kantor" class="form-control" id="mapel">
<option value="Cilacap">Cilacap</option>
<option value="Bantarsari">Bantarsari</option>
<option value="Sidareja">Sidareja</option>
<option value="Cimanggu">Cimanggu</option>
<option value="Kesugihan">Kesugihan</option>
<option value="Jeruklegi">Jeruklegi</option>
</select>
</div>


<div class="form-group">
<label for="exampleInputEmail1">Email</label>
<input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukan Email" required>
</div>
<div class="form-group">
<label for="exampleInputEmail1">Password</label>
<input name="password" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukan password" required>
</div>
<div class="form-group">
<label for="exampleFormControlTextarea1">Alamat</label>
<textarea name="alamat" class="form-control" id="exampleFormControlTextarea1" rows="3" required></textarea>
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
<script type="text/javascript">
  $(function () {
    
    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('karyawan.tables') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'nik', name: 'nik'},
            {data: 'nama', name: 'nama'},
            {data: 'jenis_kelamin', name: 'jenis_kelamin'},
            {data: 'jabatan', name: 'jabatan'},
            {data: 'kantor', name: 'kantor'},
            {data: 'action', name: 'action', orderable: false, searchable: false}
			
        ]
    });
    
  });
</script>
