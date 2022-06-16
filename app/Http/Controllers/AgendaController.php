<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\Agenda;
use App\Models\Subject;
use App\Models\Teacher;
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
        $data = Agenda::with('teacher','subject','grade')->paginate();
        return view('data-agenda', compact('data'));
        // return view('dashboard-guru', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tcr = Teacher::all();
        $sub = Subject::all();
        $grd = Grade::all();
        return view('tambahdata-agenda', compact('tcr','sub','grd'));
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $this->validate($request,[
        //     'teacher_id' => 'required', 
        //     'subject_id' => 'required', 
        //     'materi' => 'required', 
        //     'jenis' => 'required', 
        //     'link' => 'required', 
        //     'absensi' => 'required', 
        //     'foto' => 'mimes:jpg,png,jpeg|image|max:2048', 
        //     'grade_id' => 'required', 
        //     'mulai' => 'required', 
        //     'selesai' => 'required', 
        //     'keterangan' => 'required', 
        // ]);

        $data = Agenda::create($request->all());
        if($request->hasFile('foto')){
            $request->file('foto')->move('dokumentasi/', $request->file('foto')->getClientOriginalName());
            $data->foto = $request->file('foto')->getClientOriginalName();
            $data -> save();
        }
        
        return redirect('/data-agenda')->with('sukses','Data Berhasil Di Tambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Agenda  $agenda
     * @return \Illuminate\Http\Response
     */
    public function show(Agenda $agenda)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Agenda  $agenda
     * @return \Illuminate\Http\Response
     */
    public function edit(Agenda $agenda, $id)
    {
        $tcr = Teacher::all();
        $sub = Subject::all();
        $grd = Grade::all();
        $agenda = Agenda::find($id);
        return view('editdata-agenda',compact('agenda','tcr','sub','grd'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Agenda  $agenda
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Agenda $agenda, $id)
    {
        // $this->validate($request,[
        //     'teacher_id' => 'required', 
        //     'subject_id' => 'required', 
        //     'materi' => 'required', 
        //     'jenis' => 'required', 
        //     'link' => 'required', 
        //     'absensi' => 'required', 
        //     // 'foto' => 'required',
        //     'grade_id' => 'required', 
        //     'mulai' => 'required', 
        //     'selesai' => 'required', 
        //     'keterangan' => 'required',
        // ]);

        $agenda = Agenda::findorfail($id);
        $agenda -> update($request->all());
        if($request->hasFile('foto')){
            $request->file('foto')->move('dokumentasi/', $request->file('foto')->getClientOriginalName());
            $agenda->foto = $request->file('foto')->getClientOriginalName();
            $agenda -> save();
        }
        
        return redirect('/data-agenda')->with('sukses','Data Berhasil Di Edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Agenda  $agenda
     * @return \Illuminate\Http\Response
     */
    public function destroy(Agenda $agenda, $id)
    {
        $agenda = Agenda::find($id);
        $agenda -> delete();
        return back()->with('destroy','Data Telah Di Hapus');
    }
}
