@extends("layouts/main")
@section('judul')
    Barcode
@endsection
@section("container")
    <!-- tempat show barcode-->
    <h1 style="text-align:center;" class="mt-5"><b>QR Code {{ $data->data->nama_barang }}</b></h1>
    <div class="d-grid gap-2 col-6 mx-auto">
        <img class= "mx-auto mt-3 mb-3"src="data:image/png;base64, {!! base64_encode($qrCode) !!}" alt="QR Code">
        <a class="btn btn-primary" href="/barang">Kembali</a>
    </div>
@endsection