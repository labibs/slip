@extends('layouts.master')
@section('header')

<meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Laravel 5.8 - Individual Column Search in Datatables using Ajax</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
 <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>  
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> -->
@stop

@section('content')
<div class="main">
<!-- MAIN CONTENT -->
<div class="main-content">
  <div class="container-fluid">  
  <div class="panel"  >
  <div class="panel-heading">
     
     <h3 align="center">Data Karyawan PT. Kalisha Utama Ghani</h3>
    
     </div>
            
            
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <div class="form-group">
                        <select name="filter_periode" id="filter_periode" class="form-control" required>
                        <option value="Januari 2020">Januari 2020</option>
                            <option value="Februari 2020">Februari 2020</option>
                            <option value="aret 2020">Maret 2020</option>
                        </select> 
                        </div>
                    
                    
                    <div class="form-group" align="center">
                    <button type="button" name="filter" id="filter" class="btn btn-info">Filter</button>

<button type="button" name="reset" id="reset" class="btn btn-default">Reset</button>

                    </div>
                </div>
                <div class="col-md-4"></div>
            </div>
            <br />
            <div class="panel-body">
   <div class="table-responsive">
    <table id="customer_data" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Karyawan id</th>
                            <th>Pendapatan id</th>
                            <th>Periode</th>
                            <th>Nominal</th>
                        </tr>
                    </thead>
                </table>
                </div>
   </div>
            <br />
            <br />
  </div>
  </div>
  </div>
  </div>


 </body>

</html>

<script>
$(document).ready(function(){

    fill_datatable();

    function fill_datatable(filter_periode = '')
    {
        var dataTable = $('#customer_data').DataTable({
            processing: true,
            serverSide: true,
            ajax:{
                url: "{{ route('customsearch.index') }}",
                data:{filter_periode:filter_periode }
            },
            columns: [
                {
                    data:'karyawan_id',
                    name:'karyawan_id'
                },
                {
                    data:'pendapatan_id',
                    name:'pendapatan_id'
                },
                {
                    data:'periode',
                    name:'periode'
                },
                {
                    data:'nominal',
                    name:'nominal'
                }
            ]
        });
    }

    $('#filter').click(function(){
        var filter_periode = $('#filter_periode').val();
       

        if(filter_periode != '' &&  filter_periode != '')
        {
            $('#customer_data').DataTable().destroy();
            fill_datatable(filter_periode);
        }
        else
        {
            alert('Select Both filter option');
        }
    });

    $('#reset').click(function(){
        $('#filter_periode').val('');
        
        $('#customer_data').DataTable().destroy();
        fill_datatable();
    });

});
</script>
@stop
