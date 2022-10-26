<?php

namespace App\Http\Controllers;
use App\Models\SuratKeluar;
use App\Models\KodeSurat;
use DB ;
use Illuminate\Http\Request;

class SuratKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $surat_keluar=DB::table('surat_keluar')
        ->select('surat_keluar.id_surat_keluar','surat_keluar.id_kode_surat','surat_keluar.tgl_keluar','surat_keluar.perihal','surat_keluar.tujuan_surat','surat_keluar.lembar_surat','surat_keluar.lampiran','surat_keluar.isi_ringkas','surat_keluar.file','kode_surat.nama_kode_surat','pegawai.nama_pegawai')
        ->join('kode_surat', 'surat_keluar.id_kode_surat', '=' , 'kode_surat.id_kode_surat')
        ->join('pegawai', 'surat_keluar.id_pegawai','=', 'pegawai.id_pegawai')
        ->orderBy('surat_keluar.id_surat_keluar','desc')->paginate(10);
        return view('admin_pegawai.SuratKeluar.lihat',compact('surat_keluar'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kode=KodeSurat::orderBy('id_kode_surat','desc')->paginate();
        return view('admin_pegawai.SuratKeluar.tambah',compact('kode'));
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
            'id_kode_surat' => 'required|unique:surat_keluar',
            'id_pegawai' => 'required',
            'tgl_keluar' => 'required',
            'perihal' => 'required',
            'tujuan_surat' => 'required',
            'lembar_surat' => 'required',
            'lampiran' => 'required',
            'isi_ringkas' => 'required',
            'file' => 'required|mimes:csv,txt,xlx,xls,pdf,doc,docx|max:2048',
            
        ]);
        $input = $request->all();

        if ($file = $request->file('file')) {
            $destinationPath = 'document/';
            $NameFile = date('YmdHis') . "." . $file->getClientOriginalExtension();
            $file->move($destinationPath, $NameFile);
            $input['file'] = "$NameFile";
        }

        SuratKeluar::create($input);

        return redirect()->route('suratkeluar.index')
                        ->with('success','Surat Keluar has been created successfully.');
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
        $suratkeluar=DB::table('surat_keluar')
        ->select('surat_keluar.id_surat_keluar','surat_keluar.id_kode_surat','surat_keluar.tgl_keluar','surat_keluar.perihal','surat_keluar.tujuan_surat','surat_keluar.lembar_surat','surat_keluar.lampiran','surat_keluar.isi_ringkas','surat_keluar.file','kode_surat.nama_kode_surat','pegawai.nama_pegawai')
        ->join('kode_surat', 'surat_keluar.id_kode_surat', '=' , 'kode_surat.id_kode_surat')
        ->join('pegawai', 'surat_keluar.id_pegawai','=', 'pegawai.id_pegawai')
        ->where('surat_keluar.id_surat_keluar',$id)
        ->first();
        return view('admin_pegawai.SuratKeluar.edit')
        ->with(compact('suratkeluar'))
        ->with(compact('kode'));
        ;
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
            'id_kode_surat' => 'required|unique:surat_keluar',
            'id_pegawai' => 'required',
            'tgl_keluar' => 'required',
            'perihal' => 'required',
            'tujuan_surat' => 'required',
            'lembar_surat' => 'required',
            'lampiran' => 'required',
            'isi_ringkas' => 'required',
          ]);   
          $suratkeluar = $request->only(["id_kode_surat","id_kode_surat","id_pegawai","tgl_surat","perihal","tujuan_surat","lembar_surat","lampiran","isi_ringkas"]);
          SuratKeluar::find($id)->update($suratkeluar);
          return redirect()->route('suratkeluar.index')
                           ->with('success','Surat Keluar Has Been update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $suratkeluar= SuratKeluar::find($id)->delete();
        return redirect()->route('suratkeluar.index')
                         ->with('success','Surat Keluar Delete successfully');
    }
}