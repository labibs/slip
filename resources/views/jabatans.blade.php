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

<div class="panel-heading"><h1>Data Jabatan </h1>

<div class="card">
  
</div>
</div>
<center>
<button type="button" data-toggle="modal" data-target="#exampleModal"  class="btn btn-success">Tambah Data Jabatan</button>
</center><div class="panel-body">

<div class="table-responsive">

    <table class="table table-bordered table-striped data-table">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode</th>
                <th>Nama Jabatan</th>
                <th>Di Tambahkan</th>
                
                <th width="100px">Action</th>
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
  <h5 class="modal-title" id="exampleModalLabel">Tambah Jabatan</h5>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
  <span aria-hidden="true">&times;</span>
  </button>
</div>
<div class="modal-body">
<form action="/jabatan/create" method="POST">
{{csrf_field()}}
<div class="form-group">
<label for="exampleInputEmail1">Kode</label>
<input name="kode" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukan Kode Jabatan">
</div>
<div class="form-group">
<label for="exampleInputEmail1">Nama Jabatan</label>
<input name="nama" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukan Nama Jabatan">
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
        ajax: "{{ route('karyawan.jabatan') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'kode', name: 'kode'},
            {data: 'nama', name: 'nama'},
            {data: 'created_at', name: 'created_at'},
            
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
    
  });
</script>
