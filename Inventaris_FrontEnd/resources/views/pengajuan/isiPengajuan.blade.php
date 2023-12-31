@extends("layouts/main")
@section('judul')
    Isi Pengajuan
@endsection
@section("container")
    <!-- tabel informasi -->
    <h1 style="font-size:25px;" class="ms-5 mt-3"><b>PENGAJUAN</b></h1>
    <h1 style="font-size:25px;" align="center"><b>Detail Pengajuan</b></h1>
    <table class="table table-bordered mt-4 ms-4" style="color: #FDF7E4;">
        <colgroup>
            <col span="2" style="background-color: #31304D">
        </colgroup>
        <tbody>
          <tr>
            <th>Nama Barang</th>
            <td>{{ $barang->nama_barang }}</td>
          </tr>

          <tr>
            <th>Merk-Type</th>
            <td>{{ $barang->merk_type }}</td>
          </tr>

          <tr>
            <th>Kategori</th>
            <td>{{ $barang->kategori }}</td>
          </tr>

          <tr>
            <th>Ruang</th>
            <td>{{ $barang->ruangan }}</td>
          </tr>

          <tr>
            <th>Penanggung Jawab</th>
            <td>{{ $barang->penanggung_jawab }}</td>
          </tr>

          <tr>
            <th>Status</th>
            <td>{{ $barang->status }}</td>
          </tr>

        {{-- </tbody>
      </table>
    <!-- tabel informasi -->

    <!-- Detail Pembelian -->
    <h1 style="font-size:25px;" align="center"><b>Detail Pengajuan</b></h1>
    <table class="table  table-bordered mt-4 ms-4" style="color: #FDF7E4;"">
      <colgroup>
          <col span="2" style="background-color: #31304D">
      </colgroup>
      <tbody> --}}

        {{-- <tr>
          <th>Detail Pengajuan</th>
          <td></td>
        </tr> --}}
        <tr>
          <th>Tanggal</th>
          <td>{{ $pengajuan->tanggal_pengajuan }}</td>
        </tr>

        <tr>
          <th>Status</th>
          <td>{{ $pengajuan->status }}</td>
        </tr>

        <tr>
          <th>Isi Pengajuan</th>
          <td>
            <textarea name="isi_pengajuan" style="color: #FDF7E4; background-color: #31304D;" rows="4" cols="50">{{ $pengajuan->isi_pengajuan }}</textarea>
          </td>
        </tr>

        {{-- <tr>
          <th>Nama Pembeli</th>
          <td></td>
        </tr> --}}
      </tbody>
    </table>


    <div class="container">
      <div class="box" ></div>
    </div>




    <!-- button submit -->
    <div class="d-grid gap-2 col-6 mx-auto">
      
      <button type="submit" class="button" ><a href="/pengajuan" class="text-decoration-none">Kembali</a></button>
      {{-- <button type="submit" class="button" >Tolak</button> --}}
    </div>
@endsection
