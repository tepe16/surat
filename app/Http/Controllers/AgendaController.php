<?php

namespace App\Http\Controllers;
use App\Models\Agenda;
use App\Models\Pegawai;
use DB ;
use Illuminate\Http\Request;

class AgendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $agendas = DB::table('agenda')
        ->select('agenda.id_agenda','agenda.tgl_agenda','agenda.isi_acara','agenda.tempat','agenda.peserta','agenda.waktu','pegawai.nama_pegawai')
        ->join('pegawai', 'agenda.id_pegawai','=', 'pegawai.id_pegawai')
        ->orderBy('agenda.id_agenda','desc')->paginate(10);
        return view('admin_pegawai.Agenda.index',compact('agendas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin_pegawai.Agenda.tambah');
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
            'id_pegawai' => 'required',
            'tgl_agenda' => 'required',
            'isi_acara' => 'required',
            'peserta' => 'required',
            'tempat' => 'required',
            'waktu' => 'required'
        ]);
        $input =$request->all();
        Agenda::create($input);
        return redirect()->route('agenda.index')
                         ->with('success', 'Agenda Surat has been created successfully.');
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
        $agendas= Agenda::findOrFail($id);
        return view('admin_pegawai.Agenda.edit', ['agendas' =>$agendas]);
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
            'id_pegawai' => 'required',
            'tgl_agenda' => 'required',
            'isi_acara' => 'required',
            'peserta' => 'required',
            'tempat' => 'required',
            'waktu' => 'required'
          ]);   
          $agendas = $request->only(["id_pegawai","tgl_agenda","isi_acara","tempat","waktu"]);
          Agenda::find($id)->update($agendas);
          return redirect()->route('agenda.index')
                           ->with('success','Agenda Surat Has Been update successfully');       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $agendas= Agenda::find($id)->delete();
        return redirect()->route('agenda.index')
                         ->with('success','Agenda Surat Delete successfully');
    }
}
