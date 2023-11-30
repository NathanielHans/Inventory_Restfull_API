@extends('layouts/main')
@section('judul')
    Pengajuan
@endsection
@section("container")
<div class="container mt-5">
    <h1>Daftar Pengajuan</h1>
    <table class="table table-bordered mt-4">
        <thead class="table-dark">
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Nama Barang</th>
            <th scope="col">Status</th>
            <th scope="col">Tanggal Ajuan</th>
            <th scope="col">Opsi</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($pengajuans as $pengajuan)
          <tr>
            <th scope="row">{{ $loop->iteration }}</th>
             <td>{{ $pengajuan->isi_pengajuan }}</td>
             <td>{{ $pengajuan->status }}</td>
             <td>{{ $pengajuan->tanggal_pengajuan }}</td>
             <td><a href="/pengajuan/{{ $pengajuan->id }}" class="btn btn-info btn-sm items-center">Edit</a> <a href="" class="btn btn-sm btn-info">Konfirmasi</a></td>
           </tr>   
          @endforeach
        </tbody>
      </table>
</div>
@endsection