<?php

namespace App\Http\Controllers;
use App\Models\SuratMasuk;
use App\Models\KodeSurat;
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
        ->select('surat_masuk.id_surat_masuk','surat_masuk.id_kode_surat','surat_masuk.tgl_masuk','surat_masuk.asal_surat','surat_masuk.perihal','surat_masuk.lembar_surat','surat_masuk.lampiran','pegawai.nama_pegawai','kode_surat.nama_kode_surat','surat_masuk.file')
        ->join('kode_surat', 'surat_masuk.id_kode_surat', '=' , 'kode_surat.id_kode_surat')
        ->join('pegawai', 'surat_masuk.id_pegawai', '=' , 'pegawai.id_pegawai')
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
        $kode=KodeSurat::orderBy('id_kode_surat','desc')->paginate();
        return view('admin_pegawai.SuratMasuk.tambah',compact('kode'));
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
            'id_kode_surat' => 'required|unique:surat_masuk',
            'id_pegawai' => 'required',
            'tgl_masuk' => 'required',
            'perihal' => 'required',
            'asal_surat' => 'required',
            'lembar_surat' => 'required',
            'lampiran' => 'required',
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
        $kode=KodeSurat::orderBy('id_kode_surat','desc')->paginate();
        $suratmasuk=DB::table('surat_masuk')
        ->select('surat_masuk.id_surat_masuk','surat_masuk.id_kode_surat','surat_masuk.tgl_masuk','surat_masuk.asal_surat','surat_masuk.perihal','surat_masuk.lembar_surat','surat_masuk.lampiran','pegawai.nama_pegawai','kode_surat.nama_kode_surat','surat_masuk.file')
        ->join('kode_surat', 'surat_masuk.id_kode_surat', '=' , 'kode_surat.id_kode_surat')
        ->join('pegawai', 'surat_masuk.id_pegawai', '=' , 'pegawai.id_pegawai')
        ->where('surat_masuk.id_surat_masuk',$id)
        ->first();
        return view('admin_pegawai.SuratMasuk.edit')
        ->with(compact('suratmasuk'))
        ->with(compact('kode'));
        
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
            'id_kode_surat' => 'required|unique:surat_masuk',
            'id_pegawai' => 'required',
            'tgl_masuk' => 'required',
            'perihal' => 'required',
            'asal_surat' => 'required',
            'lembar_surat' => 'required',
            'lampiran' => 'required',
        ]);
        $suratmasuk = $request->only(["no_surat_masuk","id_kode_surat","asal_surat","perihal","tgl_masuk","lembar_surat","lampiran"]);
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
