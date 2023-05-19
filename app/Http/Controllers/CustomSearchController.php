<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class CustomSearchController extends Controller
{
    function index(Request $request)
    {
     if(request()->ajax())
     {
      if(!empty($request->filter_periode))
      {
       $data = DB::table('karyawan_pendapatan')
         ->select('karyawan_id', 'pendapatan_id', 'periode', 'nominal')
         ->where('periode', $request->filter_periode)
         ->get();
      }
      else
      {
       $data = DB::table('karyawan_pendapatan')
         ->select('karyawan_id', 'pendapatan_id', 'periode', 'nominal')
         ->get();
      }
      return datatables()->of($data)->make(true);
     }
     $kantor_name = DB::table('karyawan')
          ->select('kantor')
          ->groupBy('kantor')
          ->orderBy('kantor', 'ASC')
          ->get();
     return view('custom_search', compact('kantor_name'));
    }
    

}
