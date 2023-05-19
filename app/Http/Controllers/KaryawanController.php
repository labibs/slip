<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\KaryawanExport;
use Maatwebsite\Excel\Facades\Excel;
use DataTables;
use PDF;

class KaryawanController extends Controller
{
	 public function dasbor(Request $request)
	 {
	  return view('dasbor');
	 }
  public function index(Request $request)
     {

       if($request->has('cari')){
         $data_karyawan = \App\Karyawan::where('nama_depan','LIKE','%'.$request->cari.'%')->paginate(20);
       }else {
         $data_karyawan = \App\Karyawan::all();

       }
         $no = 1;
         $kantor = \App\Kantor::all();
         $jabatan = \App\Jabatan::all();
         $user = \App\User::all();

     	return view('karyawan.index',['data_karyawan'=>$data_karyawan],['kantor'=>$kantor,'jabatan'=>$jabatan,'user'=>$user,'no'=>$no]);
     }
     public function usersList()
    {
        $karyawane = \App\Karyawan::all()->select('*');
        return datatables()->of($karyawane)
            ->make(true);
    }
     public function user(Request $request)
        {

          if($request->has('cari')){
            $data_user = \App\User::where('name','LIKE','%'.$request->cari.'%')->get();
          }else {
            $data_user = \App\User::all();

          }
            $no = 1;
            $kantor = \App\Kantor::all();
            $jabatan = \App\Jabatan::all();
            $user = \App\User::all();

        	return view('karyawan.d_user',['data_user'=>$data_user],['kantor'=>$kantor,'jabatan'=>$jabatan,'user'=>$user,'no'=>$no]);
        }
        public function jabatan(Request $request)
           {

             if($request->has('cari')){
               $data_jabatan = \App\Jabatan::where('nama','LIKE','%'.$request->cari.'%')->get();
             }else {
               $data_jabatan = \App\Jabatan::all();

             }
               $no = 1;

               $kantor = \App\Kantor::all();
               $user = \App\User::all();

           	return view('karyawan.d_jabatan',['data_jabatan'=>$data_jabatan],['kantor'=>$kantor,'no'=>$no]);
           }
           public function kantor(Request $request)
              {

                if($request->has('cari')){
                  $data_kantor = \App\Kantor::where('nama','LIKE','%'.$request->cari.'%')->get();
                }else {
                  $data_kantor = \App\Kantor::all();

                }
                  $no = 1;


                  $user = \App\User::all();

              	return view('karyawan.d_kantor',['data_kantor'=>$data_kantor],['no'=>$no]);
              }
     public function laporan_gaji(Request $request)
        {

          if($request->has('cari')){
            $data_karyawan = \App\Karyawan::where('nama_depan','LIKE','%'.$request->cari.'%')->get();
          }else {
            $data_karyawan = \App\Karyawan::all();

          }
            $no = 1;
            $kantor = \App\Kantor::all();
            $jabatan = \App\Jabatan::all();
            $user = \App\User::all();

        	return view('karyawan.laporan_gaji',['data_karyawan'=>$data_karyawan],['kantor'=>$kantor,'jabatan'=>$jabatan,'user'=>$user,'no'=>$no]);
        }

        public function potongan(Request $request)
           {
             if($request->has('cari')){
               $data_karyawan = \App\Karyawan::where('nama_depan','LIKE','%'.$request->cari.'%')->get();
             }else {
               $data_karyawan = \App\Karyawan::all();
             }
               $no = 1;
               $kantor = \App\Kantor::all();
               $jabatan = \App\Jabatan::all();

           	return view('karyawan.potongan',['data_karyawan'=>$data_karyawan],['kantor'=>$kantor,'jabatan'=>$jabatan,'no'=>$no]);
           }

              public function kesejahteraan(Request $request)
                 {
                   if($request->has('cari')){
                     $data_karyawan = \App\Karyawan::where('nama_depan','LIKE','%'.$request->cari.'%')->get();
                   }else {
                     $data_karyawan = \App\Karyawan::all();
                   }

                     $kantor = \App\Kantor::all();
                     $jabatan = \App\Jabatan::all();

                 	return view('karyawan.kesejahteraan',['data_karyawan'=>$data_karyawan],['kantor'=>$kantor,'jabatan'=>$jabatan]);
                 }
     public function d_inventaris(Request $request )
     {
       $data_karyawan = \App\Karyawan::all();
       $mapel = \App\mapel::all();
        $pivoot = $data_karyawan->mapel()->get();


       //dd($pivoot);
       return view('karyawan.d_inventaris',['data_karyawan'=>$data_karyawan]);

     }
     function rupiah($angka)
     {
       $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
	     return $hasil_rupiah;
     }
     public function homes(Request $request)
     {
      $kelamin_p = \App\Karyawan::whereJenisKelamin('Pria')->get();
      $kelamin_w = \App\Karyawan::whereJenisKelamin('Wanita')->get();
      $crowdsourching = \App\Karyawan::whereJabatan('Rdr Crowdsourcing')->get();
      $peakseason = \App\Karyawan::whereJabatan('Peakseason')->get();
      $cilacap = \App\Karyawan::whereKantor('cilacap')->get();
      $kesugihan = \App\Karyawan::whereKantor('kesugihan')->get();
      $bantarsari= \App\Karyawan::whereKantor('bantarsari')->get();
      $sidareja = \App\Karyawan::whereKantor('sidareja')->get();
      $cimanggu = \App\Karyawan::whereKantor('cimanggu')->get();
      $jeruklegi = \App\Karyawan::whereKantor('jeruklegi')->get();
       //dd($kelamin_w);
       $data_karyawan = \App\Karyawan::all();
		 

       return view('karyawan.homes',['data_karyawan'=>$data_karyawan],['kelamin_w'=>$kelamin_w,'kelamin_p'=>$kelamin_p,'cilacap'=>$cilacap,'kesugihan'=>$kesugihan,'sidareja'=>$sidareja,'cimanggu'=>$cimanggu,'bantarsari'=>$bantarsari,'jeruklegi'=>$jeruklegi,'crowdsourching'=>$crowdsourching,'peakseason'=>$peakseason]);
     }
	
     public function create(Request $request)
     {

       //insert ke tabel user
       $user = new \App\User;
       $user->role = $request->role;
       $user->name = $request->nama_depan;
       $user->email = $request->email;
       $user->password = bcrypt($request->password) ;
       $user->password1 =$request->password;
       $user->remember_token = bcrypt(60);
       $user->save();

       //insert ke tabel karyawan
       $request->request->add(['user_id' => $user->id]);
       $karyawan = \App\Karyawan::create($request->all());
       return redirect('/karyawant')->with('sukses','Data Berhasil di input');

     }
     public function create_jabatan(Request $request)
     {

       //insert ke tabel karyawan

       $jabatan = \App\Jabatan::create($request->all());
       return redirect('/jabatant')->with('sukses','Data Berhasil di input');
     }
	
	public function create_fasilitas(Request $request)
     {

       //insert ke tabel karyawan

       $fasilitas = \App\Fasilitas::create($request->all());
       return redirect('/fasilitast')->with('sukses','Data Berhasil di input');
     }
	
     public function create_kantor(Request $request)
     {

       //insert ke tabel karyawan

       $kantor = \App\Kantor::create($request->all());
       return redirect('/kantort')->with('sukses','Data Berhasil di input');
     }
     public function delete_kantor($id)
     {
       $kantor = \App\Kantor::find($id);
       $kantor->delete($kantor);

       return redirect('/kantort')->with('sukses','Data Berhasil di Hapus');
     }
     public function delete_jabatan($id)
     {
       $jabatan = \App\Jabatan::find($id);
       $jabatan->delete($jabatan);

       return redirect('/jabatant')->with('sukses','Data Berhasil di Hapus');
     }
	public function delete_fasilitas($id)
     {
       $fasilitas = \App\Fasilitas::find($id);
       $fasilitas->delete($fasilitas);

       return redirect('/fasilitast')->with('sukses','Data Berhasil di Hapus');
     }
     public function edit($id)
     {
         $karyawan = \App\Karyawan::find($id);
         $kantor = \App\Kantor::all();
         $jabatan = \App\Jabatan::all();
         return view('karyawan/edit',['karyawan' =>$karyawan],['jabatan'=>$jabatan,'kantor'=>$kantor]);
     }
     public function editfoto($id)
     {
         $karyawan = \App\Karyawan::find($id);
         $kantor = \App\Kantor::all();
         $jabatan = \App\Jabatan::all();
         return view('karyawan/editfoto',['karyawan' =>$karyawan],['jabatan'=>$jabatan,'kantor'=>$kantor]);
     }
     public function update(Request $request,$id)
     {
       //dd($request->all());

       $karyawan = \App\Karyawan::find($id);

       $karyawan->update($request->all());
       if($request->hasFile('avatar')){
         $imag = $request->file('avatar');
         $namafile = 'foto-'. time().'.'. $imag->getClientOriginalExtension();
         $request->file('avatar')->move('images/',$namafile);
         $karyawan->avatar = $namafile;
         $karyawan->save();
       }
       elseif(
        $request->hasFile('absen')){
        $abse = $request->file('absen');
        $namascan = 'absen-'. time().'.'. $abse->getClientOriginalExtension();
        $request->file('absen')->move('absen/',$namascan);
        $karyawan->absen = $namascan;
        $karyawan->save();
        }elseif(
        $request->hasFile('bpjstk')){
        $bpjskt = $request->file('bpjstk');
        $namakart = 'bpjstk-'. time().'.'. $bpjskt->getClientOriginalExtension();
        $request->file('bpjstk')->move('bpjstk/',$namakart);
        $karyawan->bpjstk = $namakart;
        $karyawan->save();
       }
       $jabatan = \App\Jabatan::find($id);
       $kantor =\App\Kantor::find($id);
       $user = \App\User::find($id);
       $user->name = $request->nama_depan;
       $user->save();

       return redirect('/karyawant')->with('sukses','Data Berhasil di Update');

     }
     public function delete($id)
     {
       $karyawan = \App\Karyawan::find($id);
       $karyawan->delete($karyawan);
       $karyawan = \App\User::find($id);
       $karyawan->delete($karyawan);
       return redirect('/karyawant')->with('sukses','Data Berhasil di Hapus');
     }

     public function profile($id)
     {
       $karyawan = \App\Karyawan::find($id);
       return view('karyawan.profile',['karyawan' =>$karyawan]);
     }
	
	public function undangan($id)
	{
	   $tamu = \App\Fasilitas::find($id);
		
	   
		
		return view('undangan',['tamu'=>$tamu]);}
	
		public function ukaryawanjne($id)
	{
	   $karyawan = \App\Karyawan::find($id);
		
	   
		
		return view('undanganjne',['karyawan'=>$karyawan]);
	}
	public function isiundangan()
	{
	  return view('isiundangan');
	}
	
	 public function slip()
	 {
		 return view('slipgaji.slipgaji');
	 }
	public function slipjan($id)
     {
	   $karyawan = \App\Karyawan::find($id);
       $tunjang = \App\Pendapatan::all();
	   $kurang = \App\Potongan::all();
		 
      
       //dd($bulanan1);
       $rentang = $karyawan->pendapatan()->wherePeriode('Januari 2023')->get();
       $jumlah=0;
       $total=0;
       foreach ($karyawan->pendapatan()->wherePeriode('Januari 2023')->get() as $kp){
       $jumlah += $kp->pivot->nominal;
       $total ++;}
		
		$umakan=0;
		foreach ($karyawan->pendapatan()->wherePeriode('Januari 2023')->wherePendapatan_id('4')->get() as $makan){
		$umakan = $makan->pivot->nominal;
		}
		
		$bbm=0;
		foreach ($karyawan->pendapatan()->wherePeriode('Januari 2023')->wherePendapatan_id('12')->get() as $bensin){
		$bbm = $bensin->pivot->nominal;
		}
		     
           $rentang1 = $karyawan->potongan()->wherePeriode('Januari 2023')->get();
           $jumlah1=0;
           $total1=0;
           foreach ($karyawan->potongan()->wherePeriode('Januari 2023')->get() as $kp1){
           $jumlah1 += $kp1->pivot->nominal;
           $total1 ++;}
			  
       return view('slipgaji.slipjan',['karyawan' =>$karyawan,'tunjang'=>$tunjang, 'rentang'=>$rentang ,'jumlah'=>$jumlah, 'total'=>$total,'kurang'=>$kurang,'rentang1'=>$rentang1,'jumlah1'=>$jumlah1,'umakan'=>$umakan, 'bbm'=>$bbm,     'total1'=>$total1]);
     }

	public function slipfeb($id)
     {
	   $karyawan = \App\Karyawan::find($id);
       $tunjang = \App\Pendapatan::all();
	   $kurang = \App\Potongan::all();
		 
      
       //dd($bulanan1);
       $rentang = $karyawan->pendapatan()->wherePeriode('Februari 2023')->get();
       $jumlah=0;
       $total=0;
       foreach ($karyawan->pendapatan()->wherePeriode('Februari 2023')->get() as $kp){
       $jumlah += $kp->pivot->nominal;
       $total ++;}
		
		$umakan=0;
		foreach ($karyawan->pendapatan()->wherePeriode('Februari 2023')->wherePendapatan_id('4')->get() as $makan){
		$umakan = $makan->pivot->nominal;
		}
		
		$bbm=0;
		foreach ($karyawan->pendapatan()->wherePeriode('Februari 2023')->wherePendapatan_id('12')->get() as $bensin){
		$bbm = $bensin->pivot->nominal;
		}
		     
           $rentang1 = $karyawan->potongan()->wherePeriode('Februari 2023')->get();
           $jumlah1=0;
           $total1=0;
           foreach ($karyawan->potongan()->wherePeriode('Februari 2023')->get() as $kp1){
           $jumlah1 += $kp1->pivot->nominal;
           $total1 ++;}
			  
       return view('slipgaji.slipfeb',['karyawan' =>$karyawan,'tunjang'=>$tunjang, 'rentang'=>$rentang ,'jumlah'=>$jumlah, 'total'=>$total,'kurang'=>$kurang,'rentang1'=>$rentang1,'jumlah1'=>$jumlah1,'umakan'=>$umakan, 'bbm'=>$bbm,     'total1'=>$total1]);
     }

	public function slipmar($id)
     {
	   $karyawan = \App\Karyawan::find($id);
       $tunjang = \App\Pendapatan::all();
	   $kurang = \App\Potongan::all();
		 
      
       //dd($bulanan1);
       $rentang = $karyawan->pendapatan()->wherePeriode('Maret 2023')->get();
       $jumlah=0;
       $total=0;
       foreach ($karyawan->pendapatan()->wherePeriode('Maret 2023')->get() as $kp){
       $jumlah += $kp->pivot->nominal;
       $total ++;}
		
		$umakan=0;
		foreach ($karyawan->pendapatan()->wherePeriode('Maret 2023')->wherePendapatan_id('4')->get() as $makan){
		$umakan = $makan->pivot->nominal;
		}
		
		$bbm=0;
		foreach ($karyawan->pendapatan()->wherePeriode('Maret 2023')->wherePendapatan_id('12')->get() as $bensin){
		$bbm = $bensin->pivot->nominal;
		}
		     
           $rentang1 = $karyawan->potongan()->wherePeriode('Maret 2023')->get();
           $jumlah1=0;
           $total1=0;
           foreach ($karyawan->potongan()->wherePeriode('Maret 2023')->get() as $kp1){
           $jumlah1 += $kp1->pivot->nominal;
           $total1 ++;}
			  
       return view('slipgaji.slipmar',['karyawan' =>$karyawan,'tunjang'=>$tunjang, 'rentang'=>$rentang ,'jumlah'=>$jumlah, 'total'=>$total,'kurang'=>$kurang,'rentang1'=>$rentang1,'jumlah1'=>$jumlah1,'umakan'=>$umakan, 'bbm'=>$bbm,     'total1'=>$total1]);
     }
	public function slipap($id)
     {
	   $karyawan = \App\Karyawan::find($id);
       $tunjang = \App\Pendapatan::all();
	   $kurang = \App\Potongan::all();
		 
      
       //dd($bulanan1);
       $rentang = $karyawan->pendapatan()->wherePeriode('April 2023')->get();
       $jumlah=0;
       $total=0;
       foreach ($karyawan->pendapatan()->wherePeriode('April 2023')->get() as $kp){
       $jumlah += $kp->pivot->nominal;
       $total ++;}
		
		$umakan=0;
		foreach ($karyawan->pendapatan()->wherePeriode('April 2023')->wherePendapatan_id('4')->get() as $makan){
		$umakan = $makan->pivot->nominal;
		}
		
		$bbm=0;
		foreach ($karyawan->pendapatan()->wherePeriode('April 2023')->wherePendapatan_id('12')->get() as $bensin){
		$bbm = $bensin->pivot->nominal;
		}
		     
           $rentang1 = $karyawan->potongan()->wherePeriode('April 2023')->get();
           $jumlah1=0;
           $total1=0;
           foreach ($karyawan->potongan()->wherePeriode('April 2023')->get() as $kp1){
           $jumlah1 += $kp1->pivot->nominal;
           $total1 ++;}
			  
       return view('slipgaji.slipap',['karyawan' =>$karyawan,'tunjang'=>$tunjang, 'rentang'=>$rentang ,'jumlah'=>$jumlah, 'total'=>$total,'kurang'=>$kurang,'rentang1'=>$rentang1,'jumlah1'=>$jumlah1,'umakan'=>$umakan, 'bbm'=>$bbm,     'total1'=>$total1]);
     }
	public function slipmei($id)
     {
	   $karyawan = \App\Karyawan::find($id);
       $tunjang = \App\Pendapatan::all();
	   $kurang = \App\Potongan::all();
		 
      
       //dd($bulanan1);
       $rentang = $karyawan->pendapatan()->wherePeriode('Mei 2022')->get();
       $jumlah=0;
       $total=0;
       foreach ($karyawan->pendapatan()->wherePeriode('Mei 2022')->get() as $kp){
       $jumlah += $kp->pivot->nominal;
       $total ++;}
		
		$umakan=0;
		foreach ($karyawan->pendapatan()->wherePeriode('Mei 2022')->wherePendapatan_id('4')->get() as $makan){
		$umakan = $makan->pivot->nominal;
		}
		
		$bbm=0;
		foreach ($karyawan->pendapatan()->wherePeriode('Mei 2022')->wherePendapatan_id('12')->get() as $bensin){
		$bbm = $bensin->pivot->nominal;
		}
		     
           $rentang1 = $karyawan->potongan()->wherePeriode('Mei 2022')->get();
           $jumlah1=0;
           $total1=0;
           foreach ($karyawan->potongan()->wherePeriode('Mei 2022')->get() as $kp1){
           $jumlah1 += $kp1->pivot->nominal;
           $total1 ++;}
			  
       return view('karyawan.slipmei',['karyawan' =>$karyawan,'tunjang'=>$tunjang, 'rentang'=>$rentang ,'jumlah'=>$jumlah, 'total'=>$total,'kurang'=>$kurang,'rentang1'=>$rentang1,'jumlah1'=>$jumlah1,'umakan'=>$umakan, 'bbm'=>$bbm,     'total1'=>$total1]);
     }
	public function slipjun($id)
     {
	   $karyawan = \App\Karyawan::find($id);
       $tunjang = \App\Pendapatan::all();
	   $kurang = \App\Potongan::all();
		 
      
       //dd($bulanan1);
       $rentang = $karyawan->pendapatan()->wherePeriode('Juni 2022')->get();
       $jumlah=0;
       $total=0;
       foreach ($karyawan->pendapatan()->wherePeriode('Juni 2022')->get() as $kp){
       $jumlah += $kp->pivot->nominal;
       $total ++;}
		
		$umakan=0;
		foreach ($karyawan->pendapatan()->wherePeriode('Juni 2022')->wherePendapatan_id('4')->get() as $makan){
		$umakan = $makan->pivot->nominal;
		}
		
		$bbm=0;
		foreach ($karyawan->pendapatan()->wherePeriode('Juni 2022')->wherePendapatan_id('12')->get() as $bensin){
		$bbm = $bensin->pivot->nominal;
		}
		     
           $rentang1 = $karyawan->potongan()->wherePeriode('Juni 2022')->get();
           $jumlah1=0;
           $total1=0;
           foreach ($karyawan->potongan()->wherePeriode('Juni 2022')->get() as $kp1){
           $jumlah1 += $kp1->pivot->nominal;
           $total1 ++;}
			  
       return view('karyawan.slipjun',['karyawan' =>$karyawan,'tunjang'=>$tunjang, 'rentang'=>$rentang ,'jumlah'=>$jumlah, 'total'=>$total,'kurang'=>$kurang,'rentang1'=>$rentang1,'jumlah1'=>$jumlah1,'umakan'=>$umakan, 'bbm'=>$bbm,     'total1'=>$total1]);
     }
	public function slipjul($id)
     {
	   $karyawan = \App\Karyawan::find($id);
       $tunjang = \App\Pendapatan::all();
	   $kurang = \App\Potongan::all();
		 
      
       //dd($bulanan1);
       $rentang = $karyawan->pendapatan()->wherePeriode('Juli 2022')->get();
       $jumlah=0;
       $total=0;
       foreach ($karyawan->pendapatan()->wherePeriode('Juli 2022')->get() as $kp){
       $jumlah += $kp->pivot->nominal;
       $total ++;}
		
		$umakan=0;
		foreach ($karyawan->pendapatan()->wherePeriode('Juli 2022')->wherePendapatan_id('4')->get() as $makan){
		$umakan = $makan->pivot->nominal;
		}
		
		$bbm=0;
		foreach ($karyawan->pendapatan()->wherePeriode('Juli 2022')->wherePendapatan_id('12')->get() as $bensin){
		$bbm = $bensin->pivot->nominal;
		}
		     
           $rentang1 = $karyawan->potongan()->wherePeriode('Juli 2022')->get();
           $jumlah1=0;
           $total1=0;
           foreach ($karyawan->potongan()->wherePeriode('Juli 2022')->get() as $kp1){
           $jumlah1 += $kp1->pivot->nominal;
           $total1 ++;}
			  
       return view('karyawan.slipjul',['karyawan' =>$karyawan,'tunjang'=>$tunjang, 'rentang'=>$rentang ,'jumlah'=>$jumlah, 'total'=>$total,'kurang'=>$kurang,'rentang1'=>$rentang1,'jumlah1'=>$jumlah1,'umakan'=>$umakan, 'bbm'=>$bbm,     'total1'=>$total1]);
     }
	public function slipag($id)
     {
	   $karyawan = \App\Karyawan::find($id);
       $tunjang = \App\Pendapatan::all();
	   $kurang = \App\Potongan::all();
		 
      
       //dd($bulanan1);
       $rentang = $karyawan->pendapatan()->wherePeriode('Agustus 2022')->get();
       $jumlah=0;
       $total=0;
       foreach ($karyawan->pendapatan()->wherePeriode('Agustus 2022')->get() as $kp){
       $jumlah += $kp->pivot->nominal;
       $total ++;}
		
		$umakan=0;
		foreach ($karyawan->pendapatan()->wherePeriode('Agustus 2022')->wherePendapatan_id('4')->get() as $makan){
		$umakan = $makan->pivot->nominal;
		}
		
		$bbm=0;
		foreach ($karyawan->pendapatan()->wherePeriode('Agustus 2022')->wherePendapatan_id('12')->get() as $bensin){
		$bbm = $bensin->pivot->nominal;
		}
		     
           $rentang1 = $karyawan->potongan()->wherePeriode('Agustus 2022')->get();
           $jumlah1=0;
           $total1=0;
           foreach ($karyawan->potongan()->wherePeriode('Agustus 2022')->get() as $kp1){
           $jumlah1 += $kp1->pivot->nominal;
           $total1 ++;}
			  
       return view('slipgaji.slipag',['karyawan' =>$karyawan,'tunjang'=>$tunjang, 'rentang'=>$rentang ,'jumlah'=>$jumlah, 'total'=>$total,'kurang'=>$kurang,'rentang1'=>$rentang1,'jumlah1'=>$jumlah1,'umakan'=>$umakan, 'bbm'=>$bbm,     'total1'=>$total1]);
     }
	
	public function slipsep($id)
     {
	   $karyawan = \App\Karyawan::find($id);
       $tunjang = \App\Pendapatan::all();
	   $kurang = \App\Potongan::all();
		 
      
       //dd($bulanan1);
       $rentang = $karyawan->pendapatan()->wherePeriode('September 2022')->get();
       $jumlah=0;
       $total=0;
       foreach ($karyawan->pendapatan()->wherePeriode('September 2022')->get() as $kp){
       $jumlah += $kp->pivot->nominal;
       $total ++;}
		
		$umakan=0;
		foreach ($karyawan->pendapatan()->wherePeriode('September 2022')->wherePendapatan_id('4')->get() as $makan){
		$umakan = $makan->pivot->nominal;
		}
		
		$bbm=0;
		foreach ($karyawan->pendapatan()->wherePeriode('September 2022')->wherePendapatan_id('12')->get() as $bensin){
		$bbm = $bensin->pivot->nominal;
		}
		     
           $rentang1 = $karyawan->potongan()->wherePeriode('September 2022')->get();
           $jumlah1=0;
           $total1=0;
           foreach ($karyawan->potongan()->wherePeriode('September 2022')->get() as $kp1){
           $jumlah1 += $kp1->pivot->nominal;
           $total1 ++;}
			  
       return view('slipgaji.slipsep',['karyawan' =>$karyawan,'tunjang'=>$tunjang, 'rentang'=>$rentang ,'jumlah'=>$jumlah, 'total'=>$total,'kurang'=>$kurang,'rentang1'=>$rentang1,'jumlah1'=>$jumlah1,'umakan'=>$umakan, 'bbm'=>$bbm,     'total1'=>$total1]);
     }
	public function slipok($id)
     {
	   $karyawan = \App\Karyawan::find($id);
       $tunjang = \App\Pendapatan::all();
	   $kurang = \App\Potongan::all();
		 
      
       //dd($bulanan1);
       $rentang = $karyawan->pendapatan()->wherePeriode('Oktober 2022')->get();
       $jumlah=0;
       $total=0;
       foreach ($karyawan->pendapatan()->wherePeriode('Oktober 2022')->get() as $kp){
       $jumlah += $kp->pivot->nominal;
       $total ++;}
		
		$umakan=0;
		foreach ($karyawan->pendapatan()->wherePeriode('Oktober 2022')->wherePendapatan_id('4')->get() as $makan){
		$umakan = $makan->pivot->nominal;
		}
		
		$bbm=0;
		foreach ($karyawan->pendapatan()->wherePeriode('Oktober 2022')->wherePendapatan_id('12')->get() as $bensin){
		$bbm = $bensin->pivot->nominal;
		}
		     
           $rentang1 = $karyawan->potongan()->wherePeriode('Oktober 2022')->get();
           $jumlah1=0;
           $total1=0;
           foreach ($karyawan->potongan()->wherePeriode('Oktober 2022')->get() as $kp1){
           $jumlah1 += $kp1->pivot->nominal;
           $total1 ++;}
			  
       return view('slipgaji.slipok',['karyawan' =>$karyawan,'tunjang'=>$tunjang, 'rentang'=>$rentang ,'jumlah'=>$jumlah, 'total'=>$total,'kurang'=>$kurang,'rentang1'=>$rentang1,'jumlah1'=>$jumlah1,'umakan'=>$umakan, 'bbm'=>$bbm,     'total1'=>$total1]);
     }
	public function slipnov($id)
     {
	   $karyawan = \App\Karyawan::find($id);
       $tunjang = \App\Pendapatan::all();
	   $kurang = \App\Potongan::all();
		 
      
       //dd($bulanan1);
       $rentang = $karyawan->pendapatan()->wherePeriode('November 2022')->get();
       $jumlah=0;
       $total=0;
       foreach ($karyawan->pendapatan()->wherePeriode('November 2022')->get() as $kp){
       $jumlah += $kp->pivot->nominal;
       $total ++;}
		
		$umakan=0;
		foreach ($karyawan->pendapatan()->wherePeriode('November 2022')->wherePendapatan_id('4')->get() as $makan){
		$umakan = $makan->pivot->nominal;
		}
		
		$bbm=0;
		foreach ($karyawan->pendapatan()->wherePeriode('November 2022')->wherePendapatan_id('12')->get() as $bensin){
		$bbm = $bensin->pivot->nominal;
		}
		     
           $rentang1 = $karyawan->potongan()->wherePeriode('November 2022')->get();
           $jumlah1=0;
           $total1=0;
           foreach ($karyawan->potongan()->wherePeriode('November 2022')->get() as $kp1){
           $jumlah1 += $kp1->pivot->nominal;
           $total1 ++;}
			  
       return view('slipgaji.slipnov',['karyawan' =>$karyawan,'tunjang'=>$tunjang, 'rentang'=>$rentang ,'jumlah'=>$jumlah, 'total'=>$total,'kurang'=>$kurang,'rentang1'=>$rentang1,'jumlah1'=>$jumlah1,'umakan'=>$umakan, 'bbm'=>$bbm,     'total1'=>$total1]);
     }
	
	public function slipdes($id)
     {
	   $karyawan = \App\Karyawan::find($id);
       $tunjang = \App\Pendapatan::all();
	   $kurang = \App\Potongan::all();
		 
      
       //dd($bulanan1);
       $rentang = $karyawan->pendapatan()->wherePeriode('Desember 2022')->get();
       $jumlah=0;
       $total=0;
       foreach ($karyawan->pendapatan()->wherePeriode('Desember 2022')->get() as $kp){
       $jumlah += $kp->pivot->nominal;
       $total ++;}
		
		$umakan=0;
		foreach ($karyawan->pendapatan()->wherePeriode('Desember 2022')->wherePendapatan_id('4')->get() as $makan){
		$umakan = $makan->pivot->nominal;
		}
		
		$bbm=0;
		foreach ($karyawan->pendapatan()->wherePeriode('Desember 2022')->wherePendapatan_id('12')->get() as $bensin){
		$bbm = $bensin->pivot->nominal;
		}
		     
           $rentang1 = $karyawan->potongan()->wherePeriode('Desember 2022')->get();
           $jumlah1=0;
           $total1=0;
           foreach ($karyawan->potongan()->wherePeriode('Desember 2022')->get() as $kp1){
           $jumlah1 += $kp1->pivot->nominal;
           $total1 ++;}
			  
       return view('slipgaji.slipdes',['karyawan' =>$karyawan,'tunjang'=>$tunjang, 'rentang'=>$rentang ,'jumlah'=>$jumlah, 'total'=>$total,'kurang'=>$kurang,'rentang1'=>$rentang1,'jumlah1'=>$jumlah1,'umakan'=>$umakan, 'bbm'=>$bbm,     'total1'=>$total1]);
     }
	
	
     public function absen($id)
     {
       return view('karyawan.absen');
     }
	 public function absenjan($id)
	 {
	  $karyawan= \App\Karyawan::find($id);
	  $bulanini = $karyawan->abseen()->wherePeriode('Januari 2023')->get();
	  return view('absen.absenjan',['karyawan'=>$karyawan, 'bulanini'=>$bulanini]);	 
	 }
	public function absenfeb($id)
	{
	 $karyawan= \App\Karyawan::find($id);
	 $bulanini = $karyawan->abseen()->wherePeriode('Februari 2023')->get();
	 return view('absen.absenfeb',['karyawan'=>$karyawan, 'bulanini'=>$bulanini]);	
	}	
	 public function absenmar($id)
	{
	 $karyawan= \App\Karyawan::find($id);
	 $bulanini = $karyawan->abseen()->wherePeriode('Maret 2023')->get();
	 return view('absen.absenmar',['karyawan'=>$karyawan, 'bulanini'=>$bulanini]);	
	}	
	public function absenap($id)
	{
	 $karyawan= \App\Karyawan::find($id);
	 $bulanini = $karyawan->abseen()->wherePeriode('April 2023')->get();
	 //dd($bulanini);
	 return view('absen.absenap',['karyawan'=>$karyawan, 'bulanini'=>$bulanini]);	
	}	
	public function absenme($id)
	{
	 $karyawan= \App\Karyawan::find($id);
	 $bulanini = $karyawan->abseen()->wherePeriode('Mei 2022')->get();
	 return view('absen.absenme',['karyawan'=>$karyawan, 'bulanini'=>$bulanini]);	
	}	
	public function absenjun($id)
	{
	 $karyawan= \App\Karyawan::find($id);
	 $bulanini = $karyawan->abseen()->wherePeriode('Juni 2022')->get();
	 return view('absen.absenjun',['karyawan'=>$karyawan, 'bulanini'=>$bulanini]);	
	}
	public function absenjul($id)
	{
	 $karyawan= \App\Karyawan::find($id);
	 $bulanini = $karyawan->abseen()->wherePeriode('Juli 2022')->get();
	 return view('absen.absenjul',['karyawan'=>$karyawan, 'bulanini'=>$bulanini]);	
	}
	public function absenag($id)
	{
	 $karyawan= \App\Karyawan::find($id);
	 $bulanini = $karyawan->abseen()->wherePeriode('Agustus 2022')->get();
	 return view('absen.absenag',['karyawan'=>$karyawan, 'bulanini'=>$bulanini]);	
	}
	public function absensep($id)
	{
	 $karyawan= \App\Karyawan::find($id);
	 $bulanini = $karyawan->abseen()->wherePeriode('September 2022')->get();
	 return view('absen.absensep',['karyawan'=>$karyawan, 'bulanini'=>$bulanini]);	
	}
	public function absenok($id)
	{
	 $karyawan= \App\Karyawan::find($id);
	 $bulanini = $karyawan->abseen()->wherePeriode('Oktober 2022')->get();
	 return view('absen.absenok',['karyawan'=>$karyawan, 'bulanini'=>$bulanini]);	
	}
	public function absennov($id)
	{
	 $karyawan= \App\Karyawan::find($id);
	 $bulanini = $karyawan->abseen()->wherePeriode('November 2022')->get();
	 return view('absen.absennov',['karyawan'=>$karyawan, 'bulanini'=>$bulanini]);	
	}
	public function absendes($id)
	{
	 $karyawan= \App\Karyawan::find($id);
	 $bulanini = $karyawan->abseen()->wherePeriode('Desember 2022')->get();
	 return view('absen.absendes',['karyawan'=>$karyawan, 'bulanini'=>$bulanini]);	
	}
       public function fasilitas($id)
     {
       $karyawan = \App\Karyawan::find($id);
       return view('karyawan.fasilitas1',['karyawan' =>$karyawan]);
     }
     public function pendapatan(Request $request)
        {
          if($request->has('cari')){
            $data_karyawan = \App\Karyawan::where('nama_depan','LIKE','%'.$request->cari.'%')->get();
          }else {
            $data_karyawan = \App\Karyawan::all();

          }
            $no = 1;
            $kantor = \App\Kantor::all();
            $jabatan = \App\Jabatan::all();
            $pendapatan = \App\Pendapatan::all();


          //dd($karyawan);
        	return view('karyawan.Pendapatan',['data_karyawan'=>$data_karyawan],['kantor'=>$kantor,'jabatan'=>$jabatan,'pendapatan'=>$pendapatan,'no'=>$no]);
        }
     public function d_pendapatan(Request $request, $id)
     {
       $karyawan = \App\Karyawan::find($id);
       $tunjang = \App\Pendapatan::all();
       $bulanan1 = $request->bulanan;
       //dd($bulanan1);
       $rentang = $karyawan->pendapatan()->wherePeriode('April 2023')->get();
       $jumlah=0;
       $total=0;
       foreach ($karyawan->pendapatan()->wherePeriode('April 2023')->get() as $kp){
       $jumlah += $kp->pivot->nominal;
       $total ++;
       }
       

       return view('karyawan.d_pendapatan',['karyawan' =>$karyawan ],['tunjang'=>$tunjang, 'rentang'=>$rentang ,'jumlah'=>$jumlah, 'total'=>$total]);
   }
     public function t_pendapatan(Request $request, $idkaryawan)
     {
       $karyawan = \App\Karyawan::find($idkaryawan);
       $karyawan->pendapatan()->where('pendapatan_id', $request->pendapatan)->exists();
       $karyawan->Pendapatan()->attach($request->pendapatan,['nominal'=>$request->nominal,'periode'=>$request->periode]);
       return redirect('karyawan/'.$idkaryawan.'/d_pendapatan')->with('sukses','Data Berhasil di masukan');
     }
     public function deletetunjangan($idkaryawan, $idpendaptan)
     {
       $karyawan = \App\Karyawan::find($idkaryawan);
       $karyawan->Pendapatan()->detach($idpendaptan);

       return redirect()->back()->with('sukses','Data Berhasil Di hapus');

     }
     public function absensi(Request $request)
        {
          if($request->has('cari')){
            $data_karyawan = \App\Karyawan::where('nama_depan','LIKE','%'.$request->cari.'%')->get();
          }else {
            $data_karyawan = \App\Karyawan::all();
          }
             $no = 1;
            $kantor = \App\Kantor::all();
            $jabatan = \App\Jabatan::all();

          return view('karyawan.absensi',['data_karyawan'=>$data_karyawan],['kantor'=>$kantor,'jabatan'=>$jabatan,'no'=>$no]);
        }
        public function d_absen(Request $request, $id)
        {
          $karyawan = \App\Karyawan::find($id);
          $scan = \App\Absen::all();
          $scann = \App\Scan::all();
          $bulanini = $karyawan->abseen()->wherePeriode('April 2023')->get();
          //dd($scann);
          return view('karyawan.d_absen',['karyawan' =>$karyawan,'scan'=>$scan,'bulanini'=>$bulanini,'scann'=>$scann]);

      }
        public function t_absen(Request $request, $idkaryawan)
        {
          $karyawan = \App\Karyawan::find($idkaryawan);
          $karyawan->abseen()->attach($request->absen,['jumlah'=>$request->jumlah,'periode'=>$request->periode]);
          return redirect('karyawan/'.$idkaryawan.'/d_absen')->with('sukses','Data Berhasil di masukan');
		}
        public function deleteabsen($idkaryawan, $idabsen)
        {
          $karyawan = \App\Karyawan::find($idkaryawan);
          $karyawan->abseen()->detach($idabsen);

          return redirect('karyawan/'.$idkaryawan.'/d_absen')->with('sukses','Data Berhasil di hapus');

        }
      public function v_fasilitas(Request $request, $id)
        {
          $karyawan = \App\Karyawan::find($id);
          $fas = \App\Fasilitas::all();
          $bulanini = $karyawan->fasilitasi()->get();
          //dd($bulanini);
          return view('karyawan.v_fasilitas',['karyawan' =>$karyawan,'fas'=>$fas,'bulanini'=>$bulanini]);

      }
	public function d_fasilitasi(Request $request, $id)
        {
          $karyawan = \App\Karyawan::find($id);
          $fas = \App\Fasilitas::all();
          $bulanini = $karyawan->fasilitasi()->get();
          //dd($bulanini);
          return view('karyawan.d_fasilitas',['karyawan' =>$karyawan,'fas'=>$fas,'bulanini'=>$bulanini]);

      }
      
        public function t_fasilitas(Request $request, $idkaryawan)
        {
          $karyawan = \App\Karyawan::find($idkaryawan);
          $karyawan->fasilitasi()->where('fasilitas_id', $request->fasilitas)->exists();
          $karyawan->fasilitasi()->attach($request->fasilitas,['deskripsi'=>$request->deskripsi,'keterangan'=>$request->keterangan,'tanggal'=>$request->tanggal]);
          return redirect('karyawan/'.$idkaryawan.'/d_fasilitasi')->with('sukses','Data Berhasil di masukan');
		}

    
        public function deletefasilitas($idkaryawan, $idfasilitas)
        {
          $karyawan = \App\Karyawan::find($idkaryawan);
          $karyawan->fasilitasi()->detach($idfasilitas);

          return redirect()->back()->with('sukses','Data Berhasil Di hapus');

        }
	
        public function d_potongan($id)
        {
   
          $karyawan = \App\Karyawan::find($id);
          $kurang = \App\Potongan::all();
        $rentang1 = $karyawan->potongan()->wherePeriode('April 2023')->get();
        $jumlah1=0;
          $total1=0;
          foreach ($karyawan->potongan()->wherePeriode('April 2023')->get() as $kp1){
          $jumlah1 += $kp1->pivot->nominal;
          $total1 ++;
          }
   
          return view('karyawan.d_potongan',['karyawan' =>$karyawan] ,['kurang'=>$kurang,'rentang1'=>$rentang1,'jumlah1'=>$jumlah1, 'total1'=>$total1]);
        }
     public function t_potongan(Request $request, $idkaryawan)
     {

       $karyawan = \App\Karyawan::find($idkaryawan);

       $karyawan->Potongan()->attach($request->potongan,['nominal'=>$request->nominal,'periode'=>$request->periode]);
       return redirect('karyawan/'.$idkaryawan.'/d_potongan')->with('sukses','Data Berhasil di masukan');
}
     public function deletepengeluaran($idkaryawan, $idpotongan)
     {
       $karyawan = \App\Karyawan::find($idkaryawan);
       $karyawan->Potongan()->detach($idpotongan);

       return redirect()->back()->with('sukses','Data Berhasil Di hapus');

     }

     public function exportExcel()
    {
        return Excel::download(new KaryawanExport, 'Karyawan.xlsx');
    }
	public function exportpdfjan($id)
    {
      $karyawan = \App\Karyawan::find($id);
	  $tunjang = \App\Pendapatan::all();
	   $kurang = \App\Potongan::all();
		
		 
      
       //dd($bulanan1);
		$bulanini = $karyawan->abseen()->wherePeriode('Januari 2023')->get();
       $rentang = $karyawan->pendapatan()->wherePeriode('Januari 2023')->get();
       $jumlah=0;
       $total=0;
       foreach ($karyawan->pendapatan()->wherePeriode('Januari 2023')->get() as $kp){
       $jumlah += $kp->pivot->nominal;
       $total ++;}
		
		$umakan=0;
		foreach ($karyawan->pendapatan()->wherePeriode('Januari 2023')->wherePendapatan_id('4')->get() as $makan){
		$umakan = $makan->pivot->nominal;
		}
		
		$bbm=0;
		foreach ($karyawan->pendapatan()->wherePeriode('Januari 2023')->wherePendapatan_id('12')->get() as $bensin){
		$bbm = $bensin->pivot->nominal;
		}
		
		     
           $rentang1 = $karyawan->potongan()->wherePeriode('Januari 2023')->get();
           $jumlah1=0;
           $total1=0;
           foreach ($karyawan->potongan()->wherePeriode('Januari 2023')->get() as $kp1){
           $jumlah1 += $kp1->pivot->nominal;
           $total1 ++;}
			
		
		
       
      $pdf = PDF::loadView('export.gajijan',['karyawan'=>$karyawan,'tunjang'=>$tunjang, 'rentang'=>$rentang ,'jumlah'=>$jumlah, 'total'=>$total,'kurang'=>$kurang,'rentang1'=>$rentang1,'jumlah1'=>$jumlah1,'bulanini'=>$bulanini,'umakan'=>$umakan,'bbm'=>$bbm,'total1'=>$total1]);
      return $pdf->download('Slip gaji Januari 2023.pdf');
    }
	public function exportpdffeb($id)
    {
      $karyawan = \App\Karyawan::find($id);
	  $tunjang = \App\Pendapatan::all();
	   $kurang = \App\Potongan::all();
		
		 
      
       //dd($bulanan1);
		$bulanini = $karyawan->abseen()->wherePeriode('Februari 2023')->get();
       $rentang = $karyawan->pendapatan()->wherePeriode('Februari 2023')->get();
       $jumlah=0;
       $total=0;
       foreach ($karyawan->pendapatan()->wherePeriode('Februari 2023')->get() as $kp){
       $jumlah += $kp->pivot->nominal;
       $total ++;}
		
		$umakan=0;
		foreach ($karyawan->pendapatan()->wherePeriode('Februari 2023')->wherePendapatan_id('4')->get() as $makan){
		$umakan = $makan->pivot->nominal;
		}
		
		$bbm=0;
		foreach ($karyawan->pendapatan()->wherePeriode('Februari 2023')->wherePendapatan_id('12')->get() as $bensin){
		$bbm = $bensin->pivot->nominal;
		}
		
		     
           $rentang1 = $karyawan->potongan()->wherePeriode('Februari 2023')->get();
           $jumlah1=0;
           $total1=0;
           foreach ($karyawan->potongan()->wherePeriode('Februari 2023')->get() as $kp1){
           $jumlah1 += $kp1->pivot->nominal;
           $total1 ++;}
			
		
		
       
      $pdf = PDF::loadView('export.gajifeb',['karyawan'=>$karyawan,'tunjang'=>$tunjang, 'rentang'=>$rentang ,'jumlah'=>$jumlah, 'total'=>$total,'kurang'=>$kurang,'rentang1'=>$rentang1,'jumlah1'=>$jumlah1,'bulanini'=>$bulanini,'umakan'=>$umakan,'bbm'=>$bbm,'total1'=>$total1]);
      return $pdf->download('Slip gaji Februari 2023.pdf');
    }
    public function exportpdfmar($id)
    {
      $karyawan = \App\Karyawan::find($id);
	  $tunjang = \App\Pendapatan::all();
	   $kurang = \App\Potongan::all();
		
		 
      
       //dd($bulanan1);
		$bulanini = $karyawan->abseen()->wherePeriode('Maret 2023')->get();
       $rentang = $karyawan->pendapatan()->wherePeriode('Maret 2023')->get();
       $jumlah=0;
       $total=0;
       foreach ($karyawan->pendapatan()->wherePeriode('Maret 2023')->get() as $kp){
       $jumlah += $kp->pivot->nominal;
       $total ++;}
		
		$umakan=0;
		foreach ($karyawan->pendapatan()->wherePeriode('Maret 2023')->wherePendapatan_id('4')->get() as $makan){
		$umakan = $makan->pivot->nominal;
		}
		
		$bbm=0;
		foreach ($karyawan->pendapatan()->wherePeriode('Maret 2023')->wherePendapatan_id('12')->get() as $bensin){
		$bbm = $bensin->pivot->nominal;
		}
		
		     
           $rentang1 = $karyawan->potongan()->wherePeriode('Maret 2023')->get();
           $jumlah1=0;
           $total1=0;
           foreach ($karyawan->potongan()->wherePeriode('Maret 2023')->get() as $kp1){
           $jumlah1 += $kp1->pivot->nominal;
           $total1 ++;}
			
		
		
       
      $pdf = PDF::loadView('export.gajimar',['karyawan'=>$karyawan,'tunjang'=>$tunjang, 'rentang'=>$rentang ,'jumlah'=>$jumlah, 'total'=>$total,'kurang'=>$kurang,'rentang1'=>$rentang1,'jumlah1'=>$jumlah1,'bulanini'=>$bulanini,'umakan'=>$umakan,'bbm'=>$bbm,'total1'=>$total1]);
      return $pdf->download('Slip gaji Maret 2023.pdf');
    }
	public function exportpdfap($id)
    {
      $karyawan = \App\Karyawan::find($id);
	  $tunjang = \App\Pendapatan::all();
	   $kurang = \App\Potongan::all();
		
		 
      
       //dd($bulanan1);
		$bulanini = $karyawan->abseen()->wherePeriode('April 2023')->get();
       $rentang = $karyawan->pendapatan()->wherePeriode('April 2023')->get();
       $jumlah=0;
       $total=0;
       foreach ($karyawan->pendapatan()->wherePeriode('April 2023')->get() as $kp){
       $jumlah += $kp->pivot->nominal;
       $total ++;}
		
		$umakan=0;
		foreach ($karyawan->pendapatan()->wherePeriode('April 2023')->wherePendapatan_id('4')->get() as $makan){
		$umakan = $makan->pivot->nominal;
		}
		
		$bbm=0;
		foreach ($karyawan->pendapatan()->wherePeriode('April 2023')->wherePendapatan_id('12')->get() as $bensin){
		$bbm = $bensin->pivot->nominal;
		}
		
		     
           $rentang1 = $karyawan->potongan()->wherePeriode('April 2023')->get();
           $jumlah1=0;
           $total1=0;
           foreach ($karyawan->potongan()->wherePeriode('April 2023')->get() as $kp1){
           $jumlah1 += $kp1->pivot->nominal;
           $total1 ++;}
			
		
		
       
      $pdf = PDF::loadView('export.gajiap',['karyawan'=>$karyawan,'tunjang'=>$tunjang, 'rentang'=>$rentang ,'jumlah'=>$jumlah, 'total'=>$total,'kurang'=>$kurang,'rentang1'=>$rentang1,'jumlah1'=>$jumlah1,'bulanini'=>$bulanini,'umakan'=>$umakan,'bbm'=>$bbm,'total1'=>$total1]);
      return $pdf->download('Slip gaji April 2023.pdf');
    }
	public function exportpdfmei($id)
    {
      $karyawan = \App\Karyawan::find($id);
	  $tunjang = \App\Pendapatan::all();
	   $kurang = \App\Potongan::all();
		
		 
      
       //dd($bulanan1);
		$bulanini = $karyawan->abseen()->wherePeriode('Mei 2022')->get();
       $rentang = $karyawan->pendapatan()->wherePeriode('Mei 2022')->get();
       $jumlah=0;
       $total=0;
       foreach ($karyawan->pendapatan()->wherePeriode('Mei 2022')->get() as $kp){
       $jumlah += $kp->pivot->nominal;
       $total ++;}
		
		$umakan=0;
		foreach ($karyawan->pendapatan()->wherePeriode('Mei 2022')->wherePendapatan_id('4')->get() as $makan){
		$umakan = $makan->pivot->nominal;
		}
		
		$bbm=0;
		foreach ($karyawan->pendapatan()->wherePeriode('Mei 2022')->wherePendapatan_id('12')->get() as $bensin){
		$bbm = $bensin->pivot->nominal;
		}
		
		     
           $rentang1 = $karyawan->potongan()->wherePeriode('Mei 2022')->get();
           $jumlah1=0;
           $total1=0;
           foreach ($karyawan->potongan()->wherePeriode('Mei 2022')->get() as $kp1){
           $jumlah1 += $kp1->pivot->nominal;
           $total1 ++;}
			
		
		
       
      $pdf = PDF::loadView('export.gajimei',['karyawan'=>$karyawan,'tunjang'=>$tunjang, 'rentang'=>$rentang ,'jumlah'=>$jumlah, 'total'=>$total,'kurang'=>$kurang,'rentang1'=>$rentang1,'jumlah1'=>$jumlah1,'bulanini'=>$bulanini,'umakan'=>$umakan,'bbm'=>$bbm,'total1'=>$total1]);
      return $pdf->download('Slip gaji Mei 2022.pdf');
    }
	public function exportpdfjun($id)
    {
      $karyawan = \App\Karyawan::find($id);
	  $tunjang = \App\Pendapatan::all();
	   $kurang = \App\Potongan::all();
		
		 
      
       //dd($bulanan1);
		$bulanini = $karyawan->abseen()->wherePeriode('Juni 2022')->get();
       $rentang = $karyawan->pendapatan()->wherePeriode('Juni 2022')->get();
       $jumlah=0;
       $total=0;
       foreach ($karyawan->pendapatan()->wherePeriode('Juni 2022')->get() as $kp){
       $jumlah += $kp->pivot->nominal;
       $total ++;}
		
		$umakan=0;
		foreach ($karyawan->pendapatan()->wherePeriode('Juni 2022')->wherePendapatan_id('4')->get() as $makan){
		$umakan = $makan->pivot->nominal;
		}
		
		$bbm=0;
		foreach ($karyawan->pendapatan()->wherePeriode('Juni 2022')->wherePendapatan_id('12')->get() as $bensin){
		$bbm = $bensin->pivot->nominal;
		}
		
		     
           $rentang1 = $karyawan->potongan()->wherePeriode('Juni 2022')->get();
           $jumlah1=0;
           $total1=0;
           foreach ($karyawan->potongan()->wherePeriode('Juni 2022')->get() as $kp1){
           $jumlah1 += $kp1->pivot->nominal;
           $total1 ++;}
			
		
		
       
      $pdf = PDF::loadView('export.gajijun',['karyawan'=>$karyawan,'tunjang'=>$tunjang, 'rentang'=>$rentang ,'jumlah'=>$jumlah, 'total'=>$total,'kurang'=>$kurang,'rentang1'=>$rentang1,'jumlah1'=>$jumlah1,'bulanini'=>$bulanini,'umakan'=>$umakan,'bbm'=>$bbm,'total1'=>$total1]);
      return $pdf->download('Slip gaji Juni 2022.pdf');
    }
	public function exportpdfjul($id)
    {
      $karyawan = \App\Karyawan::find($id);
	  $tunjang = \App\Pendapatan::all();
	   $kurang = \App\Potongan::all();
		
		 
      
       //dd($bulanan1);
		$bulanini = $karyawan->abseen()->wherePeriode('Juli 2022')->get();
       $rentang = $karyawan->pendapatan()->wherePeriode('Juli 2022')->get();
       $jumlah=0;
       $total=0;
       foreach ($karyawan->pendapatan()->wherePeriode('Juli 2022')->get() as $kp){
       $jumlah += $kp->pivot->nominal;
       $total ++;}
		
		$umakan=0;
		foreach ($karyawan->pendapatan()->wherePeriode('Juli 2022')->wherePendapatan_id('4')->get() as $makan){
		$umakan = $makan->pivot->nominal;
		}
		
		$bbm=0;
		foreach ($karyawan->pendapatan()->wherePeriode('Juli 2022')->wherePendapatan_id('12')->get() as $bensin){
		$bbm = $bensin->pivot->nominal;
		}
		
		     
           $rentang1 = $karyawan->potongan()->wherePeriode('Juli 2022')->get();
           $jumlah1=0;
           $total1=0;
           foreach ($karyawan->potongan()->wherePeriode('Juli 2022')->get() as $kp1){
           $jumlah1 += $kp1->pivot->nominal;
           $total1 ++;}
			
		
		
       
      $pdf = PDF::loadView('export.gajijul',['karyawan'=>$karyawan,'tunjang'=>$tunjang, 'rentang'=>$rentang ,'jumlah'=>$jumlah, 'total'=>$total,'kurang'=>$kurang,'rentang1'=>$rentang1,'jumlah1'=>$jumlah1,'bulanini'=>$bulanini,'umakan'=>$umakan,'bbm'=>$bbm,'total1'=>$total1]);
      return $pdf->download('Slip gaji Juli 2022.pdf');
    }
    
	public function exportpdfag($id)
    {
      $karyawan = \App\Karyawan::find($id);
	  $tunjang = \App\Pendapatan::all();
	   $kurang = \App\Potongan::all();
		
		 
      
       //dd($bulanan1);
		$bulanini = $karyawan->abseen()->wherePeriode('Agustus 2022')->get();
       $rentang = $karyawan->pendapatan()->wherePeriode('Agustus 2022')->get();
       $jumlah=0;
       $total=0;
       foreach ($karyawan->pendapatan()->wherePeriode('Agustus 2022')->get() as $kp){
       $jumlah += $kp->pivot->nominal;
       $total ++;}
		
		$umakan=0;
		foreach ($karyawan->pendapatan()->wherePeriode('Agustus 2022')->wherePendapatan_id('4')->get() as $makan){
		$umakan = $makan->pivot->nominal;
		}
		
		$bbm=0;
		foreach ($karyawan->pendapatan()->wherePeriode('Agustus 2022')->wherePendapatan_id('12')->get() as $bensin){
		$bbm = $bensin->pivot->nominal;
		}
		
		     
           $rentang1 = $karyawan->potongan()->wherePeriode('Agustus 2022')->get();
           $jumlah1=0;
           $total1=0;
           foreach ($karyawan->potongan()->wherePeriode('Agustus 2022')->get() as $kp1){
           $jumlah1 += $kp1->pivot->nominal;
           $total1 ++;}
			
		
		
       
      $pdf = PDF::loadView('export.gajiag',['karyawan'=>$karyawan,'tunjang'=>$tunjang, 'rentang'=>$rentang ,'jumlah'=>$jumlah, 'total'=>$total,'kurang'=>$kurang,'rentang1'=>$rentang1,'jumlah1'=>$jumlah1,'bulanini'=>$bulanini,'umakan'=>$umakan,'bbm'=>$bbm,'total1'=>$total1]);
      return $pdf->download('Slip gaji Agustus 2022.pdf');
    }
	
	public function exportpdfsep($id)
    {
      $karyawan = \App\Karyawan::find($id);
	  $tunjang = \App\Pendapatan::all();
	   $kurang = \App\Potongan::all();
		
		 
      
       //dd($bulanan1);
		$bulanini = $karyawan->abseen()->wherePeriode('September 2022')->get();
       $rentang = $karyawan->pendapatan()->wherePeriode('September 2022')->get();
       $jumlah=0;
       $total=0;
       foreach ($karyawan->pendapatan()->wherePeriode('September 2022')->get() as $kp){
       $jumlah += $kp->pivot->nominal;
       $total ++;}
		
		$umakan=0;
		foreach ($karyawan->pendapatan()->wherePeriode('September 2022')->wherePendapatan_id('4')->get() as $makan){
		$umakan = $makan->pivot->nominal;
		}
		
		$bbm=0;
		foreach ($karyawan->pendapatan()->wherePeriode('September 2022')->wherePendapatan_id('12')->get() as $bensin){
		$bbm = $bensin->pivot->nominal;
		}
		
		     
           $rentang1 = $karyawan->potongan()->wherePeriode('September 2022')->get();
           $jumlah1=0;
           $total1=0;
           foreach ($karyawan->potongan()->wherePeriode('September 2022')->get() as $kp1){
           $jumlah1 += $kp1->pivot->nominal;
           $total1 ++;}
			
		
		
       
      $pdf = PDF::loadView('export.gajisep',['karyawan'=>$karyawan,'tunjang'=>$tunjang, 'rentang'=>$rentang ,'jumlah'=>$jumlah, 'total'=>$total,'kurang'=>$kurang,'rentang1'=>$rentang1,'jumlah1'=>$jumlah1,'bulanini'=>$bulanini,'umakan'=>$umakan,'bbm'=>$bbm,'total1'=>$total1]);
      return $pdf->download('Slip gaji September 2022.pdf');
    }
	public function exportpdfok($id)
    {
      $karyawan = \App\Karyawan::find($id);
	  $tunjang = \App\Pendapatan::all();
	   $kurang = \App\Potongan::all();
		
		 
      
       //dd($bulanan1);
		$bulanini = $karyawan->abseen()->wherePeriode('Oktober 2022')->get();
       $rentang = $karyawan->pendapatan()->wherePeriode('Oktober 2022')->get();
       $jumlah=0;
       $total=0;
       foreach ($karyawan->pendapatan()->wherePeriode('Oktober 2022')->get() as $kp){
       $jumlah += $kp->pivot->nominal;
       $total ++;}
		
		$umakan=0;
		foreach ($karyawan->pendapatan()->wherePeriode('Oktober 2022')->wherePendapatan_id('4')->get() as $makan){
		$umakan = $makan->pivot->nominal;
		}
		
		$bbm=0;
		foreach ($karyawan->pendapatan()->wherePeriode('Oktober 2022')->wherePendapatan_id('12')->get() as $bensin){
		$bbm = $bensin->pivot->nominal;
		}
		
		     
           $rentang1 = $karyawan->potongan()->wherePeriode('Oktober 2022')->get();
           $jumlah1=0;
           $total1=0;
           foreach ($karyawan->potongan()->wherePeriode('Oktober 2022')->get() as $kp1){
           $jumlah1 += $kp1->pivot->nominal;
           $total1 ++;}
			
		
		
       
      $pdf = PDF::loadView('export.gajipdfok',['karyawan'=>$karyawan,'tunjang'=>$tunjang, 'rentang'=>$rentang ,'jumlah'=>$jumlah, 'total'=>$total,'kurang'=>$kurang,'rentang1'=>$rentang1,'jumlah1'=>$jumlah1,'bulanini'=>$bulanini,'umakan'=>$umakan,'bbm'=>$bbm,'total1'=>$total1]);
      return $pdf->download('Slip gaji Oktober 2022.pdf');
    }
	public function exportpdfnov($id)
    {
      $karyawan = \App\Karyawan::find($id);
	  $tunjang = \App\Pendapatan::all();
	   $kurang = \App\Potongan::all();
		
		 
      
       //dd($bulanan1);
		$bulanini = $karyawan->abseen()->wherePeriode('November 2022')->get();
       $rentang = $karyawan->pendapatan()->wherePeriode('November 2022')->get();
       $jumlah=0;
       $total=0;
       foreach ($karyawan->pendapatan()->wherePeriode('November 2022')->get() as $kp){
       $jumlah += $kp->pivot->nominal;
       $total ++;}
		
		$umakan=0;
		foreach ($karyawan->pendapatan()->wherePeriode('November 2022')->wherePendapatan_id('4')->get() as $makan){
		$umakan = $makan->pivot->nominal;
		}
		
		$bbm=0;
		foreach ($karyawan->pendapatan()->wherePeriode('November 2022')->wherePendapatan_id('12')->get() as $bensin){
		$bbm = $bensin->pivot->nominal;
		}
		
		     
           $rentang1 = $karyawan->potongan()->wherePeriode('November 2022')->get();
           $jumlah1=0;
           $total1=0;
           foreach ($karyawan->potongan()->wherePeriode('November 2022')->get() as $kp1){
           $jumlah1 += $kp1->pivot->nominal;
           $total1 ++;}
			
		
		
       
      $pdf = PDF::loadView('export.gajipdfnop',['karyawan'=>$karyawan,'tunjang'=>$tunjang, 'rentang'=>$rentang ,'jumlah'=>$jumlah, 'total'=>$total,'kurang'=>$kurang,'rentang1'=>$rentang1,'jumlah1'=>$jumlah1,'bulanini'=>$bulanini,'umakan'=>$umakan,'bbm'=>$bbm,'total1'=>$total1]);
      return $pdf->download('Slip gaji November 2022.pdf');
    }
	public function exportpdfdes($id)
    {
      $karyawan = \App\Karyawan::find($id);
	  $tunjang = \App\Pendapatan::all();
	   $kurang = \App\Potongan::all();
		
		 
      
       //dd($bulanan1);
		$bulanini = $karyawan->abseen()->wherePeriode('Desember 2022')->get();
       $rentang = $karyawan->pendapatan()->wherePeriode('Desember 2022')->get();
       $jumlah=0;
       $total=0;
       foreach ($karyawan->pendapatan()->wherePeriode('Desember 2022')->get() as $kp){
       $jumlah += $kp->pivot->nominal;
       $total ++;}
		
		$umakan=0;
		foreach ($karyawan->pendapatan()->wherePeriode('Desember 2022')->wherePendapatan_id('4')->get() as $makan){
		$umakan = $makan->pivot->nominal;
		}
		
		$bbm=0;
		foreach ($karyawan->pendapatan()->wherePeriode('Desember 2022')->wherePendapatan_id('12')->get() as $bensin){
		$bbm = $bensin->pivot->nominal;
		}
		
		     
           $rentang1 = $karyawan->potongan()->wherePeriode('Desember 2022')->get();
           $jumlah1=0;
           $total1=0;
           foreach ($karyawan->potongan()->wherePeriode('Desember 2022')->get() as $kp1){
           $jumlah1 += $kp1->pivot->nominal;
           $total1 ++;}
			
		
		
       
      $pdf = PDF::loadView('export.gajides',['karyawan'=>$karyawan,'tunjang'=>$tunjang, 'rentang'=>$rentang ,'jumlah'=>$jumlah, 'total'=>$total,'kurang'=>$kurang,'rentang1'=>$rentang1,'jumlah1'=>$jumlah1,'bulanini'=>$bulanini,'umakan'=>$umakan,'bbm'=>$bbm,'total1'=>$total1]);
      return $pdf->download('Slip gaji Desember 2022.pdf');
    }
    public function rentang()
   {
     $pendapatan1 = \App\Karyawan_pendapatan::whereBetween('periode',['2020-01-01','2020-01-30'])->get();
     dd($pendapatan1);

   }
	
	

   public function tables(Request $request)
    {
        if ($request->ajax()) {
            $data = \App\Karyawan::all();
            $jabatan = \App\Jabatan::all();
            
            
            return Datatables::of($data)
            ->addIndexColumn()
				    ->addColumn('nama', function($row){
   
                           $nl = $row->nama_depan.' '.$row->nama_belakang;
              
                            return $nl;
                          })
                    ->rawColumns(['nama'])
                    ->addColumn('action', function($row){
						
   
                           $btn = '<a href="./karyawan/'.$row->id.'/edit" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-warning btn-sm editItem">Edit</a>';
                           $btn = $btn.' <a href="./karyawan/'.$row->id.'/delete" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteItem">Hapus</a>';
						$btn = $btn.' <a href="./karyawan/'.$row->id.'/d_fasilitasi" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-primary btn-sm deleteItem">Inventaris</a>';
                          $btn = $btn.' <a href="./karyawan/'.$row->id.'/fasilitas" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-primary btn-sm deleteItem">BPJS</a>';
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
                    
        }
      
        return view('users');
    }
    public function tablependapatan(Request $request)
    {
        if ($request->ajax()) {
            $data = \App\Karyawan::all();
            $jabatan = \App\Jabatan::all();
            
            
            return Datatables::of($data)
            ->addIndexColumn()
				    ->addColumn('nama', function($row){
   
                           $nl = $row->nama_depan.' '.$row->nama_belakang;
              
                            return $nl;
                          })
                    ->rawColumns(['nama'])
				    
                    ->addColumn('tambah', function($row){
   
                           $nominal = formatRupiah($row->tot_pendapatan());
              
                            return $nominal;
                          })
                    ->rawColumns(['tambah'])
                    ->addColumn('action', function($row){
   
                           $btn = '<a href="./karyawan/'.$row->id.'/d_pendapatan" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit Pendapatan" class="edit btn btn-warning btn-sm editItem">Edit</a>';
                           //$btn = $btn.' <a href="/karyawan/'.$row->id.'/d_pendapatan" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-success btn-sm deleteItem">Lihat Data</a>';

                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
                    
                   
                    
        }
      
        return view('pendapatans');
    }
	public function tablefasilitass(Request $request)
    {
        if ($request->ajax()) {
            $data = \App\Karyawan::all();
            $jabatan = \App\Jabatan::all();
            
            
            return Datatables::of($data)
            ->addIndexColumn()
				    ->addColumn('nama', function($row){
   
                           $nl = $row->nama_depan.' '.$row->nama_belakang;
              
                            return $nl;
                          })
                    ->rawColumns(['nama'])
				    ->addColumn('tambah', function($row){
   
                           $baju = $row->sragam();
              
                            return $baju;
                          })
                    ->rawColumns(['tambah'])
				            ->addColumn('tambah1', function($row){
   
                          $orio = $row->orion();
              
                           return $orio;
                         })
                    ->rawColumns(['tambah1'])
                    ->addColumn('tambah2', function($row){
   
                      $orio = $row->email();
          
                       return $orio;
                     })
                ->rawColumns(['tambah2'])
                    ->addColumn('action', function($row){
   
                           $btn = '<a href="/slip/public/karyawan/'.$row->id.'/d_fasilitasi" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit Pendapatan" class="edit btn btn-warning btn-sm editItem">Proses</a>';
                           $btn = $btn.' <a href="/slip/public/karyawan/'.$row->id.'/v_fasilitas" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-success btn-sm deleteItem">Lihat</a>';

                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
                    
        }
      
        return view('karyawan.fasilitass');
    }
    public function tableabsen(Request $request)
    {
        if ($request->ajax()) {
            $data = \App\Karyawan::all();
            $jabatan = \App\Jabatan::all();
            
            
            return Datatables::of($data)
            ->addIndexColumn()
				    ->addColumn('nama', function($row){
   
                           $nl = $row->nama_depan.' '.$row->nama_belakang;
              
                            return $nl;
                          })
                    ->rawColumns(['nama'])
				    ->addColumn('tambah', function($row){
   
                           $hkj = $row->hari_kerja();
              
                            return $hkj;
                          })
                    ->rawColumns(['tambah'])
				   ->addColumn('tambah1', function($row){
   
                           $hkj1 = $row->di_rumah();
              
                            return $hkj1;
                          })
                    ->rawColumns(['tambah1'])
                    ->addColumn('action', function($row){
   
                           $btn = '<a href="./karyawan/'.$row->id.'/d_absen" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit Pendapatan" class="edit btn btn-warning btn-sm editItem">Proses</a>';
                           //$btn = $btn.' <a class="edit btn btn-success btn-sm data-toggle="modal"  data-targer="#modal-detail" >Lihat</a>';

                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
                    
        }
      
        return view('absens');
    }
    public function tablepotongan(Request $request)
    {
        if ($request->ajax()) {
            $data = \App\Karyawan::all();
            $jabatan = \App\Jabatan::all();
            
            
            return Datatables::of($data)
            ->addIndexColumn()
				    ->addColumn('nama', function($row){
   
                           $nl = $row->nama_depan.' '.$row->nama_belakang;
              
                            return $nl;
                          })
                    ->rawColumns(['nama'])
                    ->addColumn('tambah', function($row){
   
                           $nominal = formatRupiah($row->tot_potongan());
              
                            return $nominal;
                          })
                    ->rawColumns(['tambah'])
                    ->addColumn('action', function($row){
   
                           $btn = '<a href="./karyawan/'.$row->id.'/d_potongan" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit Pendapatan" class="edit btn btn-warning btn-sm editItem">Edit</a>';
                           //$btn = $btn.' <a href="/karyawan/'.$row->id.'/d_absen" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-success btn-sm deleteItem">Lihat Data</a>';

                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);

                    
        }
      
        return view('potongans');
    }
	public function tableberkas(Request $request)
	{
	
		return view('berkas1');
	
	}
	
    public function tablegaji(Request $request)
    {
        if ($request->ajax()) {
            $data = \App\Karyawan::all();
            $jabatan = \App\Jabatan::all();
            
            
            return Datatables::of($data)
            ->addIndexColumn()
				   ->addColumn('nama', function($row){
   
                           $nl = $row->nama_depan.' '.$row->nama_belakang;
              
                            return $nl;
                          })
                    ->rawColumns(['nama'])
				->addColumn('dual', function($row){
   
                           $dl = formatRupiah($row->tot_pendapatan()-($row->uang_makan()+$row->bbm()));
              
                            return $dl;
                          })
                    ->rawColumns(['dual'])
				->addColumn('lima', function($row){
   
                           $lm = formatRupiah($row->uang_makan()+$row->bbm());
              
                            return $lm;
                          })
                    ->rawColumns(['lima'])
				->addColumn('dapat', function($row){
   
                           $nl = formatRupiah($row->tot_pendapatan());
              
                            return $nl;
                          })
                    ->rawColumns(['dapat'])
				->addColumn('potong', function($row){
   
                           $ml = formatRupiah($row->tot_potongan());
              
                            return $ml;
                          })
                    ->rawColumns(['potong'])
				   ->addColumn('tambah', function($row){
   
                           $nominal = formatRupiah($row->tot_pendapatan()-$row->tot_potongan());
              
                            return $nominal;
                          })
                    ->rawColumns(['tambah'])
                    ->addColumn('action', function($row){
   							 $btn = '<a href="./karyawan/'.$row->id.'/d_pendapatan" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit Pendapatan" class="edit btn btn-success btn-sm editItem">+</a>';
						 	$btn = $btn.'<a href="./karyawan/'.$row->id.'/d_potongan" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit Pendapatan" class="edit btn btn-danger btn-sm editItem">-</a>';
                           $btn = $btn.'<a href="./karyawan/'.$row->id.'/slipap" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit Pendapatan" class="edit btn btn-info btn-sm editItem">=</a>';
                           

                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
                    
        }
      
        return view('gajis');
    }
    public function tableuser(Request $request)
    {
        if ($request->ajax()) {
            $data = \App\User::all();
            $jabatan = \App\Jabatan::all();
            
            
            return Datatables::of($data)
            ->addIndexColumn()
                    ->addColumn('action', function($row){
   
                           $btn = '<a href="https://api.whatsapp.com/send?phone='.$row->nohp.'&amp;text=https://jne-cilacap.com/slip/public/login%20Dengan%20Email%20:%20'.$row->email.'%20dan%20Password%20:%20'.$row->password1.'%20,%20Untuk%20Cek%20Slip%20Gaji%20" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-success btn-sm deleteItem">Kirim ke WA</a>';
                           

                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
                    
        }
      
        return view('userss');
    }
    public function tablejabatan(Request $request)
    {
        if ($request->ajax()) {
            $data = \App\Jabatan::all();
            return Datatables::of($data)
            ->addIndexColumn()
                    ->addColumn('action', function($row){
   
                           $btn = '<a href="/jabatan/'.$row->id.'/delete" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Hapus" class="edit btn btn-danger btn-sm editItem">Hapus</a>';
                           

                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
                    
        }
      
        return view('jabatans');
    }
    public function tablekantor(Request $request)
    {
        if ($request->ajax()) {
            $data = \App\Kantor::all();
            return Datatables::of($data)
            ->addIndexColumn()
                    ->addColumn('action', function($row){
   
                           $btn = '<a href="/kantor/'.$row->id.'/delete" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Hapus" class="edit btn btn-danger btn-sm editItem">Hapus</a>';
                           

                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
                    
        }
      
        return view('kantors');
    }
	public function tablefasilitas(Request $request)
    {
        if ($request->ajax()) {
            $data = \App\Fasilitas::all();
            return Datatables::of($data)
            ->addIndexColumn()
                   // ->addColumn('action', function($row){
						
						
						->addColumn('action', function($row){
   
                           $btn = '<a href="/fasilitas/'.$row->id.'/delete" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-danger btn-sm editItem">Hapus Tamu</a>';
                           $btn = $btn.' <a href="/fasilitas/'.$row->id.'/undangan" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-primary btn-sm deleteItem">Buka Undangan</a>';
							$btn = $btn.' <a href="https://api.whatsapp.com/send?phone='.$row->nohp.'>nohp.&amp;text=http://penggajiankug.online/fasilitas/'.$row->id.'/undangan" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-success btn-sm deleteItem">Kirim ke WA</a>';
                           //$btn = $btn.' <a href=" class="btn btn-primary btn-sm deleteItem">W</a>';
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
   
                           //$btn = '<a href="/fasilitas/'.$row->id.'/delete" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Hapus" class="edit btn btn-danger btn-sm editItem">Hapus</a>';
						//$btn = '<a href="/fasilitas/'.$row->id.'/undangan" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit Pendapatan" class="edit btn btn-warning btn-sm editItem">undangan</a>';
                           

                            //return $btn;
                    //})
                   //->rawColumns(['action'])
                    //->make(true);
                    
        }
      
        return view('fasilitass');
    }
}
