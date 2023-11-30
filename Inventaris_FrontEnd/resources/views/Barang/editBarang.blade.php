@extends('layouts/main')
@section('judul')
    Edit Barang
@endsection
@section('container')
    
    <h1 style="font-size:25px;" class="ms-4 mt-3"><b>TAMBAH BARANG</b></h1>

    <!-- tabel tambah barang-->
    <form method="POST" action="/add-barang" >
        @csrf
        @method('PUT')
        <div class="row mb-3 mt-3">
            <label for="inputNamaBarang" class="col-sm-2 col-form-label ms-5">Nama Barang</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" id="inputNamaBarang" name="nama_barang" value="{{ $barang->nama_barang }}">
            </div>
        </div>
    
        <div class="row mb-3">
            <label for="inputMerk" class="col-sm-2 col-form-label ms-5">Merk-Type</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" id="inputMerk" name="merk_type" value="{{ $barang->merk_type }}">
            </div>
        </div>
    
        <div class="row mb-3">
            <label for="inputKategori" class="col-sm-2 col-form-label ms-5">Kategori Barang</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" id="inputKategori" name="kategori" value="{{ $barang->kategori }}">
            </div>
        </div>
    
        <div class="row mb-3">
            <label for="inputStatus" class="col-sm-2 col-form-label ms-5">Status</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" id="inputStatus" name="status" value="{{ $barang->status }}">
            </div>
        </div>
    
        <div class="row mb-3">
            <label for="inputHargaBeli" class="col-sm-2 col-form-label ms-5">Harga Beli</label>
            <div class="col-sm-5">
                <input type="number" class="form-control" id="inputHargaBeli" name="harga_beli" value="{{ $barang->harga_beli }}">
            </div>
        </div>
    
        <div class="row mb-3">
            <label for="inputTanggalBeli" class="col-sm-2 col-form-label ms-5">Tanggal Beli</label>
            <div class="col-sm-5">
                <input type="date" class="form-control" id="inputTanggalBeli" name="tanggal_pembelian" value="{{ $barang->tanggal_pembelian }}">
            </div>
        </div>
    
        <div class="row mb-3">
            <label for="inputTanggalRegis" class="col-sm-2 col-form-label ms-5">Tanggal Registrasi</label>
            <div class="col-sm-5">
                <input type="date" class="form-control" id="inputTanggalRegis" name="tanggal_registrasi" value="{{ $barang->tanggal_registrasi }}">
            </div>
        </div>
    
        <div class="row mb-3">
            <label for="inputRuang" class="col-sm-2 col-form-label ms-5">Lokasi Ruangan</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" id="inputRuang" name="ruangan" value="{{ $barang->ruangan }}">
            </div>
        </div>
    
        <div class="row mb-3">
            <label for="inputPJ" class="col-sm-2 col-form-label ms-5">Penanggung Jawab</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" id="inputPJ" name="penanggung_jawab" value="{{ $barang->penanggung_jawab }}">
            </div>
        </div>
    
        <!-- button submit -->
        <div class="d-grid gap-2 col-6 mx-auto mt-5">
            <button type="submit" class="button">Edit Barang</button>
        </div>
    </form>    
@endsection