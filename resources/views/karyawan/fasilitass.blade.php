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

<div class="panel">
<div class="panel-heading"><h1>Data Fasilitas </h1>


<div class="panel-body">

<div class="table-responsive">

    <table class="table table-bordered table-striped data-table">
        <thead>
            <tr>
                <th>No</th>
                <th>NIK</th>
                <th>Nama Karyawan</th>
                <th>Jabatan</th>
                <th>Kantor</th>
				<th>Baju</th>
				<th>Orion</th>
                <th>Email</th>
                
                
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
@stop  
<script type="text/javascript">
  $(function () {
    
    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('karyawan.fasilitass') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'nik', name: 'nik'},
            {data: 'nama',name: 'nama'},
            
            {data: 'jabatan', name: 'jabatan'},
            {data: 'kantor', name: 'kantor'},
			{data: 'tambah', name: 'tambah'},
            {data: 'tambah1', name: 'tambah1'},
            {data: 'tambah2', name: 'tambah2'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
    
  });
</script>
<!-- Modal -->

<div class="modal fade" id="modal-detail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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

