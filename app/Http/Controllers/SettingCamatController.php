<?php

namespace App\Http\Controllers;
use App\Models\PegawaiCamat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use DB;

class SettingCamatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $camat=DB::table('pegawai_camat')
        ->select('pegawai_camat.id_pegawai_camat','pegawai_camat.nama_pegawai_camat','pegawai_camat.nip','pegawai_camat.username','pegawai_camat.level')
        ->where('pegawai_camat.id_pegawai_camat',$id)
        ->paginate(1);
        return view('pengelola_camat.Setting.index',compact('camat'));
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
        return view('pengelola_camat.Setting.edit', ['camat' => $camat]); 
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
        return redirect()->route('settingcamat.show',$id)
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
        //
    }
}
