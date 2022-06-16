<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('dashboard-admin');
    }

    public function index_2()
    {
        return view('data-guru');
    }

    public function index_3()
    {
        return view('data-kelas');
    }

    public function index_4()
    {
        return view('data-agenda');
    }
}
