@extends('layout.layout')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-info">Data Agenda</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <a href="/tambahdata-agenda" class="btn btn-info mb-3">Tambah <i class="fas fa-user-plus"></i></a>
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
                        <th>Materi Pembelajaran</th>
                        <th>Pembelajaran</th>
                        <th>Link Pembelajaran</th>
                        <th>Absensi Siswa</th>
                        <th>Keterangan</th>
                        <th>Dokumentasi</th>
                        <th>Kelas</th>
                        <th>Mulai Pembelajaran</th>
                        <th>Selesai Pembelajaran</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                    <tr>
                        <th>{{ $loop->iteration }}</th>
                        <td>{{ $item->teacher->teacher }}</td>
                        <td>{{ $item->subject->subject }}</td>
                        <td>{{ $item->materi }}</td>
                        <td>{{ $item->jenis }}</td>
                        <td>{{ $item->link }}</td>
                        <td>{{ $item->absensi }}</td>
                        <td>{{ $item->keterangan }}</td>
                        <td>
                            <img src="{{ asset('dokumentasi/'.$item->foto) }}" style="width: 100px;" alt="">
                        </td>
                        <td>{{ $item->grade->grade }}</td>
                        <td>{{ $item->mulai }}</td>
                        <td>{{ $item->selesai }}</td>
                        <td>
                            <a href="{{ url('/edit-agenda', $item->id) }}" class="btn btn-warning mb-2"><i
                                    class="fas fa-edit"></i></a>
                            <form action="{{ url('delete-agenda', $item->id) }}" method="POST">
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