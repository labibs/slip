<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect,Response,DB,Config;
use Datatables;
class DatatablesController extends Controller
{
    public function index()
    {
        return view('search.karyawan');
    }
    public function karyawanList()
    {
        $karyawann = DB::table('karyawan')->select('nik','nama_depan','jenis_kelamin','jabatan','kantor')->get();
        return datatables()->of($karyawann)
            ->make(true);
    }
}
