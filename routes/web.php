<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');

});
//Route::match(array('GET','POST'),'/login','AuthController@index');
Route::get('/login','AuthController@login')->name('login');
Route::post('/postlogin', 'AuthController@postlogin');
Route::get('/logout', 'AuthController@logout');
Route::get('/fasilitas/{id}/undangan','KaryawanController@undangan');
Route::get('/undangan','KaryawanController@isiundangan');
Route::get('/karyawan/{id}/ukaryawanjne','KaryawanController@ukaryawanjne');

Route::group(['middleware' => ['auth','checkRole:hrd']],function()
{

Route::get('/karyawan','KaryawanController@index');
Route::get('karyawane', 'DatatablesController@index');
Route::get('karyawan-list', 'DatatablesController@karyawanList');
Route::get('/users-list', 'KaryawanController@usersList');
Route::post('/karyawan/create','KaryawanController@create');
Route::get('/karyawan/{id}/edit','KaryawanController@edit');
Route::get('/karyawan/{id}/editfoto','KaryawanController@editfoto');
Route::post('/karyawan/{id}/update','KaryawanController@update');
Route::get('/karyawan/{id}/delete','KaryawanController@delete');
Route::get('/karyawan/{id}/profile','KaryawanController@profile');
Route::get('/pendapatan','KaryawanController@pendapatan');
Route::get('/karyawan/{id}/d_pendapatan','KaryawanController@d_pendapatan');
Route::post('/karyawan/{id}/t_pendapatan','KaryawanController@t_pendapatan');
Route::get('/karyawan/export','KaryawanController@export');
Route::get('/karyawan/{id}/{idpivot}/deletetunjangan','KaryawanController@deletetunjangan');
Route::get('/user','KaryawanController@user');
Route::get('/jabatan','KaryawanController@jabatan');
Route::post('/jabatan/create','KaryawanController@create_jabatan');
Route::get('/jabatan/{id}/delete','KaryawanController@delete_jabatan');
Route::get('/kantor','KaryawanController@kantor');
Route::post('/kantor/create','KaryawanController@create_kantor');
Route::get('/kantor/{id}/delete','KaryawanController@delete_kantor');

Route::post('/fasilitas/create','KaryawanController@create_fasilitas');
Route::get('/fasilitas/{id}/delete','KaryawanController@delete_fasilitas');
	
Route::get('/kesejahteraan','KaryawanController@kesejahteraan');
Route::get('/daterange', 'DateRangeController@index');
Route::get('/absensi','KaryawanController@absensi');
Route::get('/karyawan/{id}/d_absen','KaryawanController@d_absen');
Route::post('/karyawan/{id}/t_absen','KaryawanController@t_absen');

Route::get('/karyawan/{id}/d_fasilitasi','KaryawanController@d_fasilitasi');
Route::post('/karyawan/{id}/t_fasilitas','KaryawanController@t_fasilitas');
Route::get('/karyawan/{id}/{idpivot}/deleteabsen','KaryawanController@deleteabsen');
Route::get('/karyawan/{id}/{idpivot}/deletefasilitas','KaryawanController@deletefasilitas');
Route::post('/daterange/fetch_data', 'DateRangeController@fetch_data')->name('daterange.fetch_data');
Route::get('/live_search', 'LiveSearch@index');
Route::get('/live_search/action', 'LiveSearch@action')->name('live_search.action');
Route::resource('customsearch', 'CustomSearchController');
//Route::resource('karyawan', 'CustomSearchController');
Route::get('karyawant', ['uses'=>'KaryawanController@tables', 'as'=>'karyawan.tables']);
Route::get('pendapatant', ['uses'=>'KaryawanController@tablependapatan', 'as'=>'karyawan.pendapatan']);
Route::get('absent', ['uses'=>'KaryawanController@tableabsen', 'as'=>'karyawan.absen']);
Route::get('potongant', ['uses'=>'KaryawanController@tablepotongan', 'as'=>'karyawan.potongan']);
Route::get('berkast', ['uses'=>'KaryawanController@tableberkas', 'as'=>'karyawan.berkas']);
Route::get('gajit', ['uses'=>'KaryawanController@tablegaji', 'as'=>'karyawan.gaji']);
Route::get('usert', ['uses'=>'KaryawanController@tableuser', 'as'=>'karyawan.user']);
Route::get('jabatant', ['uses'=>'KaryawanController@tablejabatan', 'as'=>'karyawan.jabatan']);
Route::get('kantort', ['uses'=>'KaryawanController@tablekantor', 'as'=>'karyawan.kantor']);
Route::get('fasilitasst', ['uses'=>'KaryawanController@tablefasilitass', 'as'=>'karyawan.fasilitass']);

	
});
Route::group(['middleware' => ['auth','checkRole:hrd,accounting']],function()
{
  Route::get('potongant', ['uses'=>'KaryawanController@tablepotongan', 'as'=>'karyawan.potongan']);
  Route::get('/karyawan/{id}/d_potongan','KaryawanController@d_potongan');
  Route::post('/karyawan/{id}/t_potongan','KaryawanController@t_potongan');
  Route::get('/karyawan/{id}/{idpivot}/deletepengeluaran','KaryawanController@deletepengeluaran');
});

Route::group(['middleware' => ['auth','checkRole:hrd,koordinator']],function()
{
  Route::get('berkast', ['uses'=>'KaryawanController@tableberkas', 'as'=>'karyawan.berkas']);
  Route::get('/karyawan/{id}/d_potongan','KaryawanController@d_potongan');
  Route::post('/karyawan/{id}/t_potongan','KaryawanController@t_potongan');
  Route::get('/karyawan/{id}/{idpivot}/deletepengeluaran','KaryawanController@deletepengeluaran');
});

Route::group(['middleware' => ['auth','checkRole:hrd,accounting,karyawan,direktur,koordinator']],function()
{
Route::get('/slipgaji','KaryawanController@slip');
Route::get('/dasbor','KaryawanController@dasbor');	
Route::get('/karyawan/{id}/slipjan','KaryawanController@slipjan');	
Route::get('/karyawan/{id}/slipfeb','KaryawanController@slipfeb');
Route::get('/karyawan/{id}/slipmar','KaryawanController@slipmar');
Route::get('/karyawan/{id}/slipap','KaryawanController@slipap');	
Route::get('/karyawan/{id}/slipmei','KaryawanController@slipmei');
Route::get('/karyawan/{id}/slipjun','KaryawanController@slipjun');
Route::get('/karyawan/{id}/slipjul','KaryawanController@slipjul');
Route::get('/karyawan/{id}/slipag','KaryawanController@slipag');
Route::get('/karyawan/{id}/slipsep','KaryawanController@slipsep');
Route::get('/karyawan/{id}/slipok','KaryawanController@slipok');
Route::get('/karyawan/{id}/slipnov','KaryawanController@slipnov');
Route::get('/karyawan/{id}/slipdes','KaryawanController@slipdes');
Route::get('/karyawan/{id}/exportpdfjan','KaryawanController@exportpdfjan');
Route::get('/karyawan/{id}/exportpdffeb','KaryawanController@exportpdffeb');
Route::get('/karyawan/{id}/exportpdfmar','KaryawanController@exportpdfmar');
Route::get('/karyawan/{id}/exportpdfap','KaryawanController@exportpdfap');	
Route::get('/karyawan/{id}/exportpdfmei','KaryawanController@exportpdfmei');
Route::get('/karyawan/{id}/exportpdfjun','KaryawanController@exportpdfjun');
Route::get('/karyawan/{id}/exportpdfjul','KaryawanController@exportpdfjul');
Route::get('/karyawan/{id}/exportpdfag','KaryawanController@exportpdfag');	
Route::get('/karyawan/{id}/exportpdfsep','KaryawanController@exportpdfsep');
Route::get('/karyawan/{id}/exportpdfok','KaryawanController@exportpdfok');
Route::get('/karyawan/{id}/exportpdfnov','KaryawanController@exportpdfnov');
Route::get('/karyawan/{id}/exportpdfdes','KaryawanController@exportPdfdes');
Route::get('/karyawan/{id}/absen','KaryawanController@absen');
Route::get('/karyawan/{id}/absenjan','KaryawanController@absenjan');
Route::get('/karyawan/{id}/absenfeb','KaryawanController@absenfeb');
Route::get('/karyawan/{id}/absenmar','KaryawanController@absenmar');
Route::get('/karyawan/{id}/absenap','KaryawanController@absenap');	
Route::get('/karyawan/{id}/absenme','KaryawanController@absenme');
Route::get('/karyawan/{id}/absenjun','KaryawanController@absenjun');
Route::get('/karyawan/{id}/absenjul','KaryawanController@absenjul');
Route::get('/karyawan/{id}/absenag','KaryawanController@absenag');
Route::get('/karyawan/{id}/absensep','KaryawanController@absensep');
Route::get('/karyawan/{id}/absenok','KaryawanController@absenok');
Route::get('/karyawan/{id}/absennov','KaryawanController@absennov');
Route::get('/karyawan/{id}/absendes','KaryawanController@absendes');	
Route::get('/karyawan/{id}/fasilitas','KaryawanController@fasilitas');
Route::get('/karyawan/{id}/v_fasilitas','KaryawanController@v_fasilitas');
Route::get('/dashboard','DashboardController@index');
Route::get('/home','KaryawanController@homes');
});
Route::group(['middleware' => ['auth','checkRole:hrd,direktur']],function()
{
Route::get('/laporan_gaji','KaryawanController@laporan_gaji');
Route::get('/gaji/exportexcel','KaryawanController@exportExcel');
Route::get('/gaji/exportpdf','KaryawanController@exportPdf');
Route::get('/gaji/exportpdfjan','KaryawanController@exportpdfjan');
//Route::get('/tes','KaryawanController@rentang');
});
