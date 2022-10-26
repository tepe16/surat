<?php

namespace App\Http\Controllers;
use App\Models\KodeSurat;
use Illuminate\Http\Request;

class KodeSuratController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kodes = KodeSurat::orderBy('id_kode_surat','desc')->paginate(10);
        return view('admin_pegawai.KodeSurat.index',compact('kodes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin_pegawai.KodeSurat.tambah');
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
            'id_kode_surat' => 'required|unique:kode_surat',
            'nama_kode_surat'=> 'required'
        ]);
        $input =$request->all();
        KodeSurat::create($input);
        return redirect()->route('kode.index')
                         ->with('success', 'Kode Surat has been created successfully.');
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
        $kodes= KodeSurat::findOrFail($id);
        return view('admin_pegawai.KodeSurat.edit', ['kodes' =>$kodes]);
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
            'nama_kode_surat' => 'required',
          ]);   
          $kodes = $request->only(["nama_kode_surat"]);
          KodeSurat::find($id)->update($kodes);
          return redirect()->route('kode.index')
                           ->with('success','Kode Surat Has Been update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kodes= KodeSurat::find($id)->delete();
        return redirect()->route('kode.index')
                         ->with('success','Kode Surat Delete successfully');
    }
}
