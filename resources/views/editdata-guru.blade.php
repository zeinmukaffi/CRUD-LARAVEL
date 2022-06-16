@extends('layout.layout')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-info">Edit Data Guru</h6>
    </div>
    <div class="card-body">
        <form action="{{ route('update', $guru->id) }}" method="POST">
            {{ csrf_field() }}
            @method('put')
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nama Lengkap</label>
                <select name="teacher_id" class="form-select form-control">
                    <option selected value="{{ $guru->teacher_id }}">{{ $guru->teacher->teacher }}</option>
                    @foreach($tcr as $item)
                    <option value="{{ $item->id }}">{{ $item->teacher }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Mata Pelajaran</label>
                <select name="subject_id" class="form-select form-control">
                    <option selected value="{{ $guru->subject_id }}">{{ $guru->subject->subject }}</option>
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
