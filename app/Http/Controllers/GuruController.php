<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $dataGuru = Guru::with('teacher','subject')->paginate();
        return view('data-guru', compact('dataGuru'));
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
        return view('tambahdata-guru', compact('tcr','sub'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'teacher_id' => 'required',
            'subject_id' => 'required',
        ]);

        Guru::create([
            'teacher_id' => $request->teacher_id,
            'subject_id' => $request->subject_id,
        ]);
        
        return redirect('/data-guru')->with('sukses','Data Berhasil Di Tambahkan');
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
        $tcr = Teacher::all();
        $sub = Subject::all();
        $guru = Guru::with('teacher','subject')->findorfail($id);
        return view('editdata-guru',compact('guru','tcr','sub'));
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
        $this->validate($request,[
            'teacher_id' => 'required',
            'subject_id' => 'required',
        ]);

        $guru = Guru::findorfail($id);
        $guru -> update($request->all());
        return redirect('/data-guru')->with('sukses','Data Berhasil Di Edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $guru = Guru::findorfail($id);
        $guru -> delete();
        return back()->with('destroy','Data Telah Di Hapus');
    }
}
