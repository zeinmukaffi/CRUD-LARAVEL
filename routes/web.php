<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TeacherController;
use App\Models\Agenda;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () { // login
//     return view('login');
// });

Route::get('/dashboard',[AdminController::class,'index'])->name('dashboard-admin'); // menuju dashboard

// ============= GURU ============ //
Route::get('/data-guru',[AdminController::class,'index_2'])->name('data-guru'); // menuju data guru
Route::get('/data-guru',[GuruController::class,'index'])->name('data-guru'); // menampilkan data guru
Route::get('/tambahdata-guru',[GuruController::class,'create'])->name('tambahdata-guru'); // menuju tambah data guru
Route::post('save-guru',[GuruController::class,'store'])->name('simpan'); // menyimpan data guru
Route::get('/edit-guru/{id}',[GuruController::class,'edit'])->name('edit'); // mengedit data guru
Route::put('/update-guru/{id}',[GuruController::class,'update'])->name('update'); // menyimpan editan data guru
Route::delete('/delete-guru/{id}',[GuruController::class,'destroy'])->name('delete'); // menghapus data

// ============= KELAS ============ //
Route::get('/data-kelas',[AdminController::class,'index_3'])->name('data-kelas'); // menuju data kelas
Route::get('/data-kelas',[KelasController::class,'index_kelas'])->name('data_kelas'); // menampilkan data kelas
Route::get('/tambahdata-kelas',[KelasController::class,'create_kelas'])->name('tambahdata_kelas'); // menuju tambah data kelas
Route::post('save-kelas',[KelasController::class,'store_kelas'])->name('simpan_kelas'); // menyimpan data kelas
Route::get('/edit-kelas/{id}',[KelasController::class,'edit_kelas'])->name('edit_kelas'); // mengedit data kelas
Route::put('/update-kelas/{id}',[KelasController::class,'update_kelas'])->name('update_kelas'); // menyimpan editan data kelas
Route::delete('/delete-kelas/{id}',[KelasController::class,'destroy_kelas'])->name('delete_kelas'); // menghapus data

// ============= AGENDA ============ //
Route::get('/data-agenda',[AdminController::class,'index_4'])->name('index_4'); // menuju data agenda
Route::get('/data-agenda',[AgendaController::class,'index'])->name('data-agenda'); // menampilkan data agenda
Route::get('/tambahdata-agenda',[AgendaController::class,'create'])->name('tambahdata-agenda'); // menuju tambah data agenda
Route::post('save-agenda',[AgendaController::class,'store'])->name('save-agenda'); // menyimpan data agenda
Route::get('/edit-agenda/{id}',[AgendaController::class,'edit'])->name('edit-agenda'); // mengedit data agenda
Route::put('/update-agenda/{id}',[AgendaController::class,'update'])->name('update-agenda'); // menyimpan editan data agenda
Route::delete('/delete-agenda/{id}',[AgendaController::class,'destroy'])->name('delete-agenda'); // menghapus data

// ============= LOGIN ============ //
Route::get('/', [LoginController::class, 'login'])->name('login');
Route::post('/proses_login', [LoginController::class,'proses_login'])->name('proses_login');
Route::group(['middleware' => ['auth']],function(){
    Route::group(['middleware' => ['Cek_Login:admin']], function(){
        Route::get('admin',[AdminController::class,'index'])->name('admin');
    });
    Route::group(['middleware' => ['Cek_Login:guru']], function(){
        Route::get('guru',[TeacherController::class,'index'])->name('guru');
    });
});
Route::get('/logout',[LoginController::class,'logout'])->name('logout');

// ============= TAMPILAN GURU ============ //
Route::get('/guru',[TeacherController::class,'index'])->name('guru'); // menampilkan data agenda
Route::get('/tambahdata-teacher',[TeacherController::class,'create'])->name('tambahdata-teacher'); // menuju tambah data agenda
Route::post('save-agenda2',[TeacherController::class,'store'])->name('save-agenda2'); // menyimpan data agenda
