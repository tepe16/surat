<?php

namespace App\Http\Controllers;

use App\Models\PegawaiCamat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PegawaiCamatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $camat=PegawaiCamat::orderBy('id_pegawai_camat','desc')->paginate(10);
        return view('admin.Camat.index',compact('camat'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.Camat.tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $camat = new PegawaiCamat ([
            'nama_pegawai_camat' => $request->nama_pegawai_camat,
            'nip'=>$request->nip,
            'level'=>$request->level,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            ]);
            $camat->save();
            return redirect()->route('camats.index')->with('success', 'Pegawai Camat success save');
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
        $camat = PegawaiCamat::findOrFail($id);
        return view('admin.Camat.edit', ['camat' => $camat]);   
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
        $userData = $request->only(["nama_pegawai_camat","nip","level","username","password"]);
        $userData['password'] = Hash::make($userData['password']);
        PegawaiCamat::find($id)->update($userData);
        return redirect()->route('camats.index')
                        ->with('success','pegawai camat has been update successfully.');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $camat = PegawaiCamat::find($id)->delete();

        return redirect()->route('camats.index')
                        ->with('success','Pegawai Camat deleted successfully');
    }
}
