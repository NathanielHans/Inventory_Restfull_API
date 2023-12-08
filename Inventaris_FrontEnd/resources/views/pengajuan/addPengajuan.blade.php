@extends("layouts/mainPublic")
@section('judul')
    Pengajuan Barang
@endsection
@section("container")
<div class="container mt-5">
    <form method="POST" action="/pengajuan/add-pengajuan">
      @csrf
      <fieldset>
        <h3 class="text-center mb-4">Formulir Pengajuan</h3>
        <div class="mb-3">
          <label for="Nama" class="form-label">Nama Lengkap</label>
          <input class="form-control" type="text" name="nama" placeholder="Write here..." aria-label="Write here..." />
        </div>
        <div class="mb-3">
          <label for="Pesan" class="form-label">Pesan</label>
          <input class="form-control" type="textbox" name="isi_pengajuan" placeholder="Write here..." aria-label="Write here..." />
        </div>
        <input type="hidden" name="id_barang" value="{{ $barang->id }}">
        <input type="hidden" name="tanggal_pengajuan" value="{{  \Carbon\Carbon::now() }}">
        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="{{ url()->previous() }}" class="btn btn-secondary">Kembali</a>
      </fieldset>
    </form>
  </div>
  @endsection