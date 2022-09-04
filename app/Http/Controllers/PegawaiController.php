<?php

namespace App\Http\Controllers;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use DB;


class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pegawais=Pegawai::orderBy('id_pegawai','desc')->paginate(10);
        return view('admin.Pegawai.lihat',compact('pegawais'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.Pegawai.tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
          $pegawai = new Pegawai ([
            'nama_pegawai' => $request->nama_pegawai,
            'nip'=>$request->nip,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            ]);
            $pegawai->save();
            return redirect()->route('pegawais.index')->with('success', 'Pegawai success save');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data=DB::table('pegawai')
        ->where('id_pegawai', $id)
        ->get();


        return view('admin_pegawai.Pegawai.lihat')->with('data', $data);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pegawai = Pegawai::findOrFail($id);
        $cek = Auth::guard('pgw')->user()->nip;
        if ($cek == ''){ 
        return view('admin.Pegawai.edit', ['pegawai' => $pegawai]);   
        } else {
        return view('admin_pegawai.Pegawai.edit', ['pegawai' => $pegawai]);
        }
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
        
        $userData = $request->only(["nama_pegawai","nip","username","password"]);
        $userData['password'] = Hash::make($userData['password']);
        Pegawai::find($id)->update($userData);
        $cek = Auth::guard('pgw')->user()->nip;
        if ($cek == ''){ 
        return redirect()->route('pegawais.index')
                        ->with('success','pegawai has been update successfully.');
        } else {
            $data=Pegawai::orderBy('id_pegawai','desc')->paginate(10);
            return view('admin_pegawai.Pegawai.lihat',compact('data'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pegawai = Pegawai::find($id)->delete();

        return redirect()->route('pegawais.index')
                        ->with('success','Pegawai deleted successfully');
    }
}
