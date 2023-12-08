@extends('layouts/main')
@section('judul')
    Maintenance Barang Inventaris
@endsection
@section('container')
    <div class="container mt-5">
        <h1>Daftar Barang</h1>
        <a href="/add-barang" type="button" class="btn btn-primary">Tambah Barang</a>
        <table class="table table-bordered mt-4">
            <thead class="table-dark">
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Nama Barang</th>
                <th scope="col">Status</th>
                <th scope="col">Opsi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($maintenances as $maintenance)
              <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                 <td>{{ $maintenance->nama_maintenance }}</td>
                 <td>{{ $maintenance->status }}</td>
                 <td><a href="/maintenance/{{ $maintenance->id }}" class="btn btn-info btn-sm items-center">Edit</a> <a href="/qrcode/{{ $maintenance->id }}" class="btn btn-sm btn-info">QR Code</a></td>
               </tr>   
              @endforeach
            </tbody>
          </table>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    
@endsection
