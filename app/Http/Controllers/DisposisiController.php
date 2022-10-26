<?php

namespace App\Http\Controllers;
use App\Models\Disposisi;
use App\Models\PegawaiCamat;
use App\Models\SuratMasuk;
use DB ;
use Illuminate\Http\Request;

class DisposisiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $disposisi=DB::table('disposisi')
        ->select('disposisi.id_disposisi','disposisi.tgl_penyelesaian','disposisi.tgl_kembali','disposisi.kembali_kepada','disposisi.intruksi','disposisi.sifat','disposisi.tujuan','pegawai_camat.nama_pegawai_camat','surat_masuk.id_kode_surat')
        ->join('surat_masuk', 'disposisi.id_surat_masuk', '=' , 'surat_masuk.id_surat_masuk')
        ->join('pegawai_camat', 'disposisi.id_pegawai_camat','=', 'pegawai_camat.id_pegawai_camat')
        ->orderBy('disposisi.id_disposisi','desc')->paginate(10);
        return view('pengelola_camat.Disposisi.index',compact('disposisi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $suratmasuk=SuratMasuk::orderBy('id_surat_masuk','desc')->paginate();
        return view('pengelola_camat.Disposisi.tambah',compact('suratmasuk'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_surat_masuk' => 'required|unique:disposisi',
            'id_pegawai_camat' => 'required',
            'tgl_penyelesaian' => 'required',
            'tgl_kembali' => 'required',
            'kembali_kepada' => 'required',
            'sifat' => 'required',
            'intruksi' => 'required',
            'tujuan' => 'required',
        ]);
        $input = $request->all();
        Disposisi::create($input);

        return redirect()->route('disposisi.index')
                        ->with('success','Disposisi has been created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $disposisi=DB::table('disposisi')
        ->select('disposisi.id_disposisi','disposisi.tgl_penyelesaian','disposisi.tgl_kembali','disposisi.kembali_kepada','disposisi.intruksi','disposisi.sifat','disposisi.tujuan','surat_masuk.id_kode_surat','surat_masuk.tgl_masuk','surat_masuk.asal_surat')
        ->join('surat_masuk', 'disposisi.id_surat_masuk', '=' , 'surat_masuk.id_surat_masuk')
        ->where('disposisi.id_disposisi', $id)
        ->get();


        return view('pengelola_camat.Disposisi.print')->with('disposisi', $disposisi);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      
        $surat_masuk=SuratMasuk::orderBy('id_surat_masuk','desc')->paginate(10);
        $disposisi=DB::table('disposisi')
        ->select('disposisi.id_disposisi','surat_masuk.id_surat_masuk','disposisi.tgl_penyelesaian','disposisi.tgl_kembali','disposisi.kembali_kepada','disposisi.intruksi','disposisi.sifat','disposisi.tujuan','pegawai_camat.nama_pegawai_camat','surat_masuk.id_kode_surat')
        ->join('surat_masuk', 'disposisi.id_surat_masuk', '=' , 'surat_masuk.id_surat_masuk')
        ->join('pegawai_camat', 'disposisi.id_pegawai_camat','=', 'pegawai_camat.id_pegawai_camat')
        ->where('disposisi.id_disposisi',$id)
        ->first();
        return view('pengelola_camat.Disposisi.edit')
        ->with(compact('disposisi'))
        ->with(compact('surat_masuk'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'id_surat_masuk' => 'required',
            'id_pegawai_camat' => 'required',
            'tgl_penyelesaian' => 'required',
            'tgl_kembali' => 'required',
            'kembali_kepada' => 'required',
            'sifat' => 'required',
            'intruksi' => 'required',
            'tujuan' => 'required',
        ]);
        $disposisi = $request->only(["id_surat_masuk","tgl_penyelesaian","tgl_kembali","kembali_kepada","intruksi","sifat","tujuan"]);
        Disposisi::find($id)->update($disposisi);
        return redirect()->route('disposisi.index')
                         ->with('success','Disposisi Has Been update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $disposisi= Disposisi::find($id)->delete();
        return redirect()->route('disposisi.index')
                         ->with('success','Disposisi Delete successfully');
    }
}
