<?php

namespace App\Http\Controllers;
use App\Models\Jenis;
use Illuminate\Http\Request;

class JenisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jenis=Jenis::orderBy('id_jenis_surat','desc')->paginate(10);
        return view('admin.Jenis.lihat',compact('jenis'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.Jenis.tambah');
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
            'nama_jenis' => 'required',
        ]);
        $input =$request->all();
        Jenis::create($input);
        return redirect()->route('jenis.index')
                         ->with('success', 'Jenis Surat has been created successfully.');
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
        $jenis= Jenis::findOrFail($id);
        return view('admin.Jenis.edit', ['jenis' =>$jenis]);
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
            'nama_jenis' =>'required',
          ]);   
          $jenis = $request->only(["nama_jenis"]);
          Jenis::find($id)->update($jenis);
          return redirect()->route('jenis.index')
                           ->with('success','Jenis Surat Has Been update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jenis= Jenis::find($id)->delete();
        return redirect()->route('jenis.index')
                         ->with('success','Jenis Surat Delete successfully');
    }
}
