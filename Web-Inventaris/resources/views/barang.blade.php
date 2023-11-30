<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
    <h1>Hello, world!</h1>
    @foreach ($Barang as $barang)
        <h2>{{ $barang->nama_barang }}</h2>
        <a href="../qrcode/{{ $barang->id }}">QR Code</a>
    @endforeach
    <form action="" method="post">
        @csrf
        <label for="nama_barang" class="form-label fs-4">Nama Barang</label>
        <input type="text" class="form-control  @error('kode') is-invalid @enderror" id="nama_barang" name="nama_barang" placeholder="Masukkan Nama Barang">
        @error('nama_barang')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
        <label for="merk_type" class="form-label fs-4 ">Merk Type</label>
        <input type="text" class="form-control @error('merk_type') is-invalid @enderror" id="merk_type" name="merk_type" placeholder="Masukkan Tipe Merek">
        @error('merk_type')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
        <label for="harga_beli" class="form-label fs-4 ">Harga Beli</label>
        <input type="int" class="form-control @error('harga_beli') is-invalid @enderror" id="harga_beli" name="harga_beli" placeholder="Masukkan Harga Beli Barang">
        @error('harga_beli')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
        <label for="tanggal_pembelian" class="form-label fs-4 ">Tanggal Pembelian</label>
        <input type="date" class="form-control @error('tanggal_pembelian') is-invalid @enderror" id="tanggal_pembelian" name="tanggal_pembelian" placeholder="Masukkan Tanggal Pembelian">
        @error('tanggal_pembelian')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
        <label for="id_ruangan" class="form-label fs-4 ">Ruangan</label>
        <div class="col-sm-5">
            <select class="form-select" id="specificSizeSelect" name="id_ruangan">
                <option selected>Choose...</option>
                @foreach ($Ruangans as $ruangan)
                    <option value="{{ $ruangan->id }}">{{ $ruangan->nama_ruangan }}</option>
                @endforeach
              </select>
        </div>
        @error('tanggal_pembelian')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
        <button class="btn-primary mt-3" type="submit">Tambah</button>
      </form> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>
