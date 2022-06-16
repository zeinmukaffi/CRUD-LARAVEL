@extends('layout.layout')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-info">Tambah Data Guru</h6>
    </div>
    <div class="card-body">
        <form action="{{ route('simpan') }}" method="POST">
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
            <button type="submit" class="btn btn-info">Submit</button>
        </form>
    </div>
</div>
@endsection
