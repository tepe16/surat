<?php

namespace App\Http\Controllers;
use App\Models\SuratMasuk;
use App\Models\Jenis;
use App\Models\Instansi;
use App\Models\Bagian;
use DB ;
use Illuminate\Http\Request;

class SuratMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $surat_masuk=DB::table('surat_masuk')
        ->select('surat_masuk.id_surat_masuk','surat_masuk.no_surat_masuk','surat_masuk.tgl_surat','surat_masuk.tgl_masuk','surat_masuk.perihal','surat_masuk.file','jenis.nama_jenis','instansi.nama_instansi','bagian.nama_bagian','pegawai.nama_pegawai')
        ->join('jenis', 'surat_masuk.id_jenis_surat', '=' , 'jenis.id_jenis_surat')
        ->join('instansi', 'surat_masuk.id_instansi','=', 'instansi.id_instansi')
        ->join('bagian', 'surat_masuk.id_bagian','=', 'bagian.id_bagian')
        ->join('pegawai', 'surat_masuk.id_pegawai','=', 'pegawai.id_pegawai')
        ->orderBy('surat_masuk.id_surat_masuk','desc')->paginate(10);
        return view('admin_pegawai.SuratMasuk.lihat',compact('surat_masuk'));
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
        return view('admin_pegawai.SuratMasuk.tambah',compact('jenis','instansi','bagian'));
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
            'no_surat_masuk' => 'required|unique:surat_masuk',
            'id_jenis_surat' => 'required',
            'id_instansi' => 'required',
            'id_bagian' => 'required',
            'id_pegawai' => 'required',
            'perihal' => 'required',
            'tgl_surat' => 'required',
            'tgl_masuk' => 'required',
            'file' => 'required|mimes:csv,txt,xlx,xls,pdf,doc,docx|max:2048',
            
        ]);
        $input = $request->all();

        if ($file = $request->file('file')) {
            $destinationPath = 'document/';
            $NameFile = date('YmdHis') . "." . $file->getClientOriginalExtension();
            $file->move($destinationPath, $NameFile);
            $input['file'] = "$NameFile";
        }

        SuratMasuk::create($input);

        return redirect()->route('suratmasuk.index')
                        ->with('success','Surat Masuk has been created successfully.');
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
        $suratmasuk=DB::table('surat_masuk')
        ->select('surat_masuk.id_surat_masuk','surat_masuk.no_surat_masuk','surat_masuk.id_jenis_surat','surat_masuk.id_instansi','surat_masuk.id_bagian','surat_masuk.tgl_surat','surat_masuk.tgl_masuk','surat_masuk.perihal','surat_masuk.file','jenis.nama_jenis','instansi.nama_instansi','bagian.nama_bagian')
        ->join('jenis', 'surat_masuk.id_jenis_surat', '=' , 'jenis.id_jenis_surat')
        ->join('instansi', 'surat_masuk.id_instansi','=', 'instansi.id_instansi')
        ->join('bagian', 'surat_masuk.id_bagian','=', 'bagian.id_bagian')
        ->where('surat_masuk.id_surat_masuk',$id)
        ->first();
        return view('admin_pegawai.SuratMasuk.edit')
        ->with(compact('suratmasuk'))
        ->with(compact('jenis'))
        ->with(compact('instansi'))
        ->with(compact('bagian'));
        
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
            'no_surat_masuk' => 'required',
            'id_jenis_surat' => 'required',
            'id_instansi' => 'required',
            'id_bagian' => 'required',
            'perihal' => 'required',
            'tgl_surat' => 'required',
            'tgl_masuk' => 'required',
        ]);
        $suratmasuk = $request->only(["no_surat_masuk","id_jenis_surat","id_instansi","id_bagian","perihal","tgl_surat","tgl_masuk"]);
        SuratMasuk::find($id)->update($suratmasuk);
        return redirect()->route('suratmasuk.index')
                         ->with('success','Surat Masuk Has Been update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $suratmasuk= SuratMasuk::find($id)->delete();
        return redirect()->route('suratmasuk.index')
                         ->with('success','Surat Masuk Delete successfully');
    }
}
