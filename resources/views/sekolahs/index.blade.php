@extends('home')
@section('student')


<h1>Sekolah</h1>

<a href="{{ route('sekolahs.tambah') }}" class="btn btn-primary">tambah data</a>

<div class="card mt-3">
    <div class="table-responsive">
      <table class="table table-vcenter card-table">



      <thead>
          <tr>
            <th>Nama Sekolah</th>
            <th>Alamat</th>
            <th>Jurusan</th>
            <th>Jumlah Guru</th>
            <th class="w-1"></th>
          </tr>
        </thead>
        <tbody>
          <tr>
            @foreach ($sekolahs as $sekolah)
            
            <td>{{ $sekolah -> nama_sekolah }}</td>
            <td>{{ $sekolah -> alamat }}</td>
            <td>{{ $sekolah -> jurusan }}</td>
            <td>{{ $sekolah -> jumlah_guru }}</td>
            <td>
                <a href="{{ route('sekolahs.edit', $sekolah->id) }}">Edit</a>
                <form action="{{ route('sekolahs.destroy', $sekolah->id) }}" method="post">
                  @csrf
                  @method('DELETE')
                  <input type="submit" value="Hapus" class="btn btn-danger btn-sm">
                </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>

@endsection