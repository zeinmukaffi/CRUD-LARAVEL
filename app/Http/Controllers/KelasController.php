<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\Kelas;
use App\Models\Teacher;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index_kelas()
    {
        $dataKelas = Kelas::with('grade','teacher')->paginate();
        return view('data-kelas', compact('dataKelas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create_kelas()
    {
        $tcr = Teacher::all();
        $grd = Grade::all();
        return view('tambahdata-kelas', compact('tcr','grd'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_kelas(Request $request)
    {
        $this->validate($request,[
            'grade_id' => 'required',
            'teacher_id' => 'required',
        ]);

        Kelas::create([
            'grade_id' => $request->grade_id,
            'teacher_id' => $request->teacher_id,
        ]);
        
        return redirect('/data-kelas')->with('sukses','Data Berhasil Di Tambahkan');
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
    public function edit_kelas($id)
    {
        $tcr = Teacher::all();
        $grd = Grade::all();
        $kelas = Kelas::findorfail($id);
        return view('editdata-kelas',compact('kelas','tcr','grd'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_kelas(Request $request, $id)
    {
        $this->validate($request,[
            'grade_id' => 'required',
            'teacher_id' => 'required',
        ]);

        $kelas = Kelas::findorfail($id);
        $kelas -> update($request->all());
        return redirect('/data-kelas')->with('sukses','Data Berhasil Di Edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy_kelas($id)
    {
        $kelas = Kelas::findorfail($id);
        $kelas -> delete();
        return back()->with('destroy','Data Telah Di Hapus');
    }
}
