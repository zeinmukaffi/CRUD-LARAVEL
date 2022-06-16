<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\Agenda;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index()
    {
        $tcr = Teacher::all();
        $sub = Subject::all();
        $grd = Grade::all();
        $data = Agenda::with('teacher','subject','grade')->paginate();
        return view('dashboard-guru', compact('data','tcr','sub','grd'));
        // return view('dashboard-guru', compact('data'));
    }

    // public function create()
    // {
    //     $tcr = Teacher::all();
    //     $sub = Subject::all();
    //     $grd = Grade::all();
    //     return view('tambahdata-teacher', compact('tcr','sub','grd'));
    // }

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
        
        return redirect('/guru')->with('sukses','Data Berhasil Di Tambahkan');
    }
}
