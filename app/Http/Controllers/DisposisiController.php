<?php

namespace App\Http\Controllers;
use App\Models\Disposisi;
use App\Models\Jenis;
use App\Models\Instansi;
use App\Models\Bagian;
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
        ->select('disposisi.id_disposisi','disposisi.no_surat','disposisi.tgl_surat','disposisi.tgl_terima','disposisi.perihal','disposisi.sifat','disposisi.rahasia','disposisi.tujuan','jenis.nama_jenis','instansi.nama_instansi','bagian.nama_bagian','pegawai.nama_pegawai')
        ->join('jenis', 'disposisi.id_jenis_surat', '=' , 'jenis.id_jenis_surat')
        ->join('instansi', 'disposisi.id_instansi','=', 'instansi.id_instansi')
        ->join('bagian', 'disposisi.id_bagian','=', 'bagian.id_bagian')
        ->join('pegawai', 'disposisi.id_pegawai','=', 'pegawai.id_pegawai')
        ->orderBy('disposisi.id_disposisi','desc')->paginate(10);
        return view('admin_pegawai.Disposisi.lihat',compact('disposisi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jenis=Jenis::orderBy('id_jenis_surat','desc')->paginate();
        $instansi=Instansi::orderBy('id_instansi','desc')->paginate();
        $bagian=Bagian::orderBy('id_bagian','desc')->paginate();
        $surat_masuk=SuratMasuk::orderBy('id_surat_masuk','desc')->paginate();
        return view('admin_pegawai.Disposisi.tambah',compact('jenis','instansi','bagian','surat_masuk'));
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
            'no_surat' => 'required|unique:disposisi',
            'id_jenis_surat' => 'required',
            'id_instansi' => 'required',
            'id_bagian' => 'required',
            'id_pegawai' => 'required',
            'perihal' => 'required',
            'sifat' => 'required',
            'rahasia' => 'required',
            'tujuan' => 'required',
            'tgl_surat' => 'required',
            'tgl_terima' => 'required',
            
            
        ]);
        $input = $request->all();

        if ($file = $request->file('file')) {
            $destinationPath = 'document/';
            $NameFile = date('YmdHis') . "." . $file->getClientOriginalExtension();
            $file->move($destinationPath, $NameFile);
            $input['file'] = "$NameFile";
        }

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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jenis=Jenis::orderBy('id_jenis_surat','desc')->paginate();
        $instansi=Instansi::orderBy('id_instansi','desc')->paginate();
        $bagian=Bagian::orderBy('id_bagian','desc')->paginate();
        $surat_masuk=SuratMasuk::orderBy('id_surat_masuk','desc')->paginate();
        $disposisi=DB::table('disposisi')
        ->select('disposisi.id_disposisi','disposisi.no_surat','disposisi.id_jenis_surat','disposisi.id_instansi','disposisi.id_bagian','disposisi.tgl_surat','disposisi.tgl_terima','disposisi.perihal','disposisi.sifat','disposisi.rahasia','disposisi.tujuan','jenis.nama_jenis','instansi.nama_instansi','bagian.nama_bagian')
        ->join('jenis', 'disposisi.id_jenis_surat', '=' , 'jenis.id_jenis_surat')
        ->join('instansi', 'disposisi.id_instansi','=', 'instansi.id_instansi')
        ->join('bagian', 'disposisi.id_bagian','=', 'bagian.id_bagian')
        ->where('disposisi.id_disposisi',$id)
        ->first();
        return view('admin_pegawai.Disposisi.edit')
        ->with(compact('disposisi'))
        ->with(compact('jenis'))
        ->with(compact('instansi'))
        ->with(compact('bagian'))
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
            'no_surat' => 'required',
            'id_jenis_surat' => 'required',
            'id_instansi' => 'required',
            'id_bagian' => 'required',
            'perihal' => 'required',
            'sifat' => 'required',
            'rahasia' => 'required',
            'tujuan' => 'required',
            'tgl_surat' => 'required',
            'tgl_terima' => 'required',
        ]);
        $disposisi = $request->only(["no_surat","id_jenis_surat","id_instansi","id_bagian","perihal","sifat","rahasia","tujuan","tgl_surat","tgl_terima"]);
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
