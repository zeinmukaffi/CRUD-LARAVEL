@extends('layout.layout-guru')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-info">Data Agenda</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <button type="button" class="btn btn-info mb-3" data-bs-toggle="modal" data-bs-target="#tambahdata">
                Tambah Data
            </button>
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
                        {{-- <th>Action</th> --}}
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
                        {{-- <td>
                            <a href="{{ url('/edit-agenda', $item->id) }}" class="btn btn-warning mb-2"><i
                                    class="fas fa-edit"></i></a>
                            <form action="{{ url('delete-agenda', $item->id) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger"><i class="fas fa-trash"></i></button>
                            </form>
                        </td> --}}
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="modal" id="tambahdata" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Tambah Agenda</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="{{ route('save-agenda2') }}" method="POST" enctype="multipart/form-data">
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
    </div>
  </div>
@endsection