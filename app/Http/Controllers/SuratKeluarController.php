<?php

namespace App\Http\Controllers;
use App\Models\SuratKeluar;
use App\Models\Jenis;
use App\Models\Instansi;
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
        ->select('surat_keluar.id_surat_keluar','surat_keluar.no_surat_keluar','surat_keluar.tgl_surat','surat_keluar.perihal','surat_keluar.file','jenis.nama_jenis','instansi.nama_instansi','pegawai.nama_pegawai')
        ->join('jenis', 'surat_keluar.id_jenis_surat', '=' , 'jenis.id_jenis_surat')
        ->join('instansi', 'surat_keluar.id_instansi','=', 'instansi.id_instansi')
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
        $jenis=Jenis::orderBy('id_jenis_surat','desc')->paginate();
        $instansi=Instansi::orderBy('id_instansi','desc')->paginate();
        return view('admin_pegawai.SuratKeluar.tambah',compact('jenis','instansi'));
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
            'no_surat_keluar' => 'required|unique:surat_keluar',
            'id_jenis_surat' => 'required',
            'id_instansi' => 'required',
            'id_pegawai' => 'required',
            'perihal' => 'required',
            'tgl_surat' => 'required',
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
        $jenis=Jenis::orderBy('id_jenis_surat','desc')->paginate();
        $instansi=Instansi::orderBy('id_instansi','desc')->paginate();
        $suratkeluar=DB::table('surat_keluar')
        ->select('surat_keluar.id_surat_keluar','surat_keluar.id_jenis_surat','surat_keluar.id_instansi','surat_keluar.no_surat_keluar','surat_keluar.tgl_surat','surat_keluar.perihal','surat_keluar.file','jenis.nama_jenis','instansi.nama_instansi')
        ->join('jenis', 'surat_keluar.id_jenis_surat', '=' , 'jenis.id_jenis_surat')
        ->join('instansi', 'surat_keluar.id_instansi','=', 'instansi.id_instansi')
        ->where('surat_keluar.id_surat_keluar',$id)
        ->first();
        return view('admin_pegawai.SuratKeluar.edit')
        ->with(compact('suratkeluar'))
        ->with(compact('jenis'))
        ->with(compact('instansi'));
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
            'no_surat_keluar' => 'required',
            'id_jenis_surat' => 'required',
            'id_instansi' => 'required',
            'perihal' => 'required',
            'tgl_surat' => 'required',
          ]);   
          $suratkeluar = $request->only(["no_surat_keluar","id_jenis_surat","id_instansi","perihal","tgl_surat"]);
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