<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class LiveSearch extends Controller
{
    function index()
    {
     return view('live_search');
    }

    function action(Request $request)
    {
     if($request->ajax())
     {
      $output = '';
      $query = $request->get('query');
      if($query != '')
      {
       $data = DB::table('karyawan_pendapatan')
         ->where('karyawan_id', 'like', '%'.$query.'%')
         ->orWhere('pendapatan_id', 'like', '%'.$query.'%')
         ->orWhere('periode', 'like', '%'.$query.'%')
         ->orWhere('nominal', 'like', '%'.$query.'%')
         ->orderBy('id', 'desc')
         ->get();
         
      }
      else
      {
       $data = DB::table('karyawan_pendapatan')
         ->orderBy('id', 'desc')
         ->get();
      }
      $total_row = $data->count();
      if($total_row > 0)
      {
       foreach($data as $row)
       {
        $output .= '
        <tr>
         <td>'.$row->karyawan_id.'</td>
         <td>'.$row->pendapatan_id.'</td>
         <td>'.$row->periode.'</td>
         <td>'.$row->nominal.'</td>
         
        </tr>
        ';
       }
      }
      else
      {
       $output = '
       <tr>
        <td align="center" colspan="5">No Data Found</td>
       </tr>
       ';
      }
      $data = array(
       'table_data'  => $output,
       'total_data'  => $total_row
      );

      echo json_encode($data);
     }
    }
}
