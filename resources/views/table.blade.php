@extends('layout')

@section('title', 'Data Table')

@section('content')
<div class="card">
    <div class="card-header bg-success text-white">
        <h4 class="mb-0">Data Mahasiswa</h4>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>NIM</th>
                        <th>Jurusan</th>
                        <th>Email</th>
                        <th>Alamat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($mahasiswa as $key => $mhs)
                    <tr>
                        <td>{{ $mahasiswa->firstItem() + $key }}</td>
                        <td>{{ $mhs->nama }}</td>
                        <td>{{ $mhs->nim }}</td>
                        <td>{{ $mhs->jurusan }}</td>
                        <td>{{ $mhs->email }}</td>
                        <td>{{ $mhs->alamat }}</td>
                        <td>
                            <a href="{{ route('edit', $mhs->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('delete', $mhs->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center">Tidak ada data</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="mt-3">
            {{ $mahasiswa->links('pagination::bootstrap-5') }}
        </div>
    </div>
</div>
@endsection
