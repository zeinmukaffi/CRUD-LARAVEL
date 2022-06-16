@extends('layout.layout')

@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-info">Data Guru</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <a href="/tambahdata-guru" class="btn btn-info mb-3">Tambah <i class="fas fa-user-plus"></i></a>
            @if ($pesan = Session::get('sukses'))
            <div class="alert alert-success mt-1" role="alert">
                {{ $pesan }}
            </div>
            @endif
            @if ($pesan = Session::get('destroy'))
            <div class="alert alert-success mt-1" role="alert">
                {{ $pesan }}
            </div>
            @endif
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Guru</th>
                        <th>Mata Pelajaran</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dataGuru as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->teacher->teacher }}</td>
                        <td>{{ $item->subject->subject }}</td>
                        <td>
                            <a href="{{ url('/edit-guru', $item->id) }}" class="btn btn-warning mb-2"><i
                                    class="fas fa-edit"></i></a>
                            <form action="{{ url('delete-guru', $item->id) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
