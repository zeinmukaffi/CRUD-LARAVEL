@extends('layout.layout')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-info">Tambah Data Agenda</h6>
    </div>
    <div class="card-body">
        <form action="{{ route('update-agenda', $agenda->id) }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            @method('put')
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nama Lengkap</label>
                <select name="teacher_id" class="form-select form-control">
                    <option selected value="{{ $agenda->teacher_id }}">{{ $agenda->teacher->teacher }}</option>
                    @foreach($tcr as $item)
                    <option value="{{ $item->id }}">{{ $item->teacher }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Mata Pelajaran</label>
                <select name="subject_id" class="form-select form-control">
                    <option selected value="{{ $agenda->subject_id }}">{{ $agenda->subject->subject }}</option>
                    @foreach($sub as $item)
                    <option value="{{ $item->id }}">{{ $item->subject }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Materi </label>
                <input type="text" class="form-control" name="materi" value="{{ $agenda->materi }}">
                @error('materi')
                <div class="text-danger"> {{ $message }} </div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Jenis Pembelajaran </label>
                <select name="jenis" class="form-select form-control mb-3" aria-label="Default select example">
                    <option selected>{{ $agenda->jenis }}</option>
                    <option>PTM</option>
                    <option>PJJ</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Link </label>
                <input type="text" class="form-control" name="link" value="{{ $agenda->link }}">
                @error('link')
                <div class="text-danger"> {{ $message }} </div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Absensi </label>
                <input type="text" class="form-control" name="absensi" value="{{ $agenda->absensi }}">
                @error('absensi')
                <div class="text-danger"> {{ $message }} </div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Dokumentasi </label>
                <div class="card">
                    <div class="card-body">
                        <input type="file" name="foto" value="{{ $agenda->foto }}">
                        <img src="{{ asset('dokumentasi/'.$agenda->foto) }}" style="width: 100px" ; alt="">
                    </div>
                </div>
                @error('foto')
                <div class="text-danger"> {{ $message }} </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Kelas</label>
                <select name="grade_id" class="form-select form-control">
                    <option selected value="{{ $agenda->grade_id }}">{{ $agenda->grade->grade }}</option>
                    @foreach($grd as $item)
                    <option value="{{ $item->id }}">{{ $item->grade }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Dimulai </label>
                <input type="time" class="form-control" name="mulai" value="{{ $agenda->mulai }}">
                @error('mulai')
                <div class="text-danger"> {{ $message }} </div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Berakhir </label>
                <input type="time" class="form-control" name="selesai" value="{{ $agenda->selesai }}">
                @error('selesai')
                <div class="text-danger"> {{ $message }} </div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Keterangan </label>
                <div class="form-floating">
                    <textarea class="form-control" style="height: 100px" name="keterangan">{{ $agenda->keterangan }}
                    </textarea>
                </div>
            </div>
            <button type="submit" class="btn btn-info">Submit</button>
        </form>
    </div>
</div>
@endsection
