<?php

namespace App\Http\Controllers;
use App\Models\Instansi;
use Illuminate\Http\Request;

class InstansiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $instansi=Instansi::orderBy('id_instansi','desc')->paginate(10);
        return view('admin.Instansi.lihat',compact('instansi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.Instansi.tambah');
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
            'nama_instansi' => 'required',
        ]);
        $input =$request->all();
        Instansi::create($input);
        return redirect()->route('instansi.index')
                         ->with('success', 'Instansi has been created successfully.');
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
        $instansi= Instansi::findOrFail($id);
        return view('admin.Instansi.edit', ['instansi' =>$instansi]);
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
            'nama_instansi' =>'required',
          ]);   
          $instansi = $request->only(["nama_instansi"]);
          Instansi::find($id)->update($instansi);
          return redirect()->route('instansi.index')
                           ->with('success','Instansi Has Been update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $instansi= Instansi::find($id)->delete();
        return redirect()->route('instansi.index')
                         ->with('success','Instansi Delete successfully');
    }
}
