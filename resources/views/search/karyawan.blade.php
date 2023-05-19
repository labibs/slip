@extends('layouts.master')
@section('header')

<meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Laravel 5.8 - Individual Column Search in Datatables using Ajax</title>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">  
<link  href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
@stop

@section('content')
<div class="main">
<!-- MAIN CONTENT -->
<div class="main-content">
    
  <div class="panel">
  <div class="panel-heading">
     
     <h3 align="center">Data Karyawan PT. Kalisha Utama Ghani</h3>
    
     </div>
            
    <div class="panel-body">
    <div class="container-fluid">
   <div class="table-responsive">
   <table class="table table-bordered" id="karyawan">
               <thead>
                  <tr>
                     <th>Id</th>
                     <th>Name</th>
                     <th>Email</th>
                     <th>Created at</th>
                     <th>Created at</th>
                  </tr>
               </thead>
            </table>
                </div>
   </div>
            
  </div>
  </div>
  </div>
  </div>
  @stop

<script>
$(document).ready( function () {
    $('#karyawan').DataTable({
           processing: true,
           serverSide: true,
           ajax: "{{ url('karyawan-list') }}",
           columns: [
                    { data: 'nik', name: 'nik' },
                    { data: 'nama_depan', name: 'nama_depan' },
                    { data: 'jenis_kelamin', name: 'jenis_kelamin' },
                    { data: 'jabatan', name: 'jabatan' }
                    { data: 'kantor', name: 'kantor' }
                 ]
        });
     });
</script>
</body>
</html>
