<?php

namespace App\Http\Controllers;
use App\Models\Bagian;
use Illuminate\Http\Request;



class BagianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bagians=Bagian::orderBy('id_bagian','desc')->paginate(10);
        return view('admin.Bagian.lihat',compact('bagians'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.Bagian.tambah');
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
            'nama_bagian' => 'required',
        ]);
        $input =$request->all();
        Bagian::create($input);
        return redirect()->route('bagians.index')
                         ->with('success', 'Bagian has been created successfully.');
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
        $bagian= Bagian::findOrFail($id);
        return view('admin.Bagian.edit', ['bagian' =>$bagian]);
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
        'nama_bagian' =>'required',
      ]);   
      $bagian = $request->only(["nama_bagian"]);
      Bagian::find($id)->update($bagian);
      return redirect()->route('bagians.index')
                       ->with('success','Bagian Has Been update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bagian= Bagian::find($id)->delete();
        return redirect()->route('bagians.index')
                         ->with('success','Bagian Delete successfully');
    }
}
