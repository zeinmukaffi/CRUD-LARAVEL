@extends('layout.layout')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-info">Tambah Data Agenda</h6>
    </div>
    <div class="card-body">
        <form action="{{ route('save-agenda') }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nama Lengkap</label>
                <select name="teacher_id" class="form-select form-control">
                    <option selected disabled>Pilih Guru</option>
                    @foreach($tcr as $item)
                    <option value="{{ $item->id }}">{{ $item->teacher }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Mata Pelajaran</label>
                <select name="subject_id" class="form-select form-control">
                    <option selected disabled>Pilih Mapel</option>
                    @foreach($sub as $item)
                    <option value="{{ $item->id }}">{{ $item->subject }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Materi </label>
                <input type="text" class="form-control" name="materi" placeholder="Materi Pembelajaran">
                @error('materi')
                <div class="text-danger"> {{ $message }} </div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Jenis Pembelajaran </label>
                <select name="jenis" class="form-select form-control mb-3" aria-label="Default select example">
                    <option selected disabled>Pilih Jenis Pembelajaran</option>
                    <option>PTM</option>
                    <option>PJJ</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Link Pembelajaran (Zoom/Youtube)</label>
                <input type="text" class="form-control" name="link" placeholder="Isi Strip (-) Bila Tidak Ada">
                @error('link')
                <div class="text-danger"> {{ $message }} </div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Absensi </label>
                <input type="text" class="form-control" name="absensi" placeholder="cth: 39 Hadir, 1 Izin">
                @error('absensi')
                <div class="text-danger"> {{ $message }} </div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Keterangan </label>
                <div class="form-floating">
                    <textarea class="form-control" style="height: 100px" name="keterangan" placeholder="cth: Abdul (S)"></textarea>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">Dokumentasi</label>
                <div class="card">
                    <div class="card-body">
                        <input type="file" name="foto">
                        @error('foto')
                        <div class="text-danger"> {{ $message }} </div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Kelas</label>
                <select name="grade_id" class="form-select form-control">
                    <option selected disabled>Pilih Kelas</option>
                    @foreach($grd as $item)
                    <option value="{{ $item->id }}">{{ $item->grade }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Jam Mulai Belajar </label>
                <input type="time" class="form-control" name="mulai">
                @error('mulai')
                <div class="text-danger"> {{ $message }} </div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Jam Selesai Belajar </label>
                <input type="time" class="form-control" name="selesai">
                @error('selesai')
                <div class="text-danger"> {{ $message }} </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-info">Submit</button>
        </form>
    </div>
</div>
@endsection
