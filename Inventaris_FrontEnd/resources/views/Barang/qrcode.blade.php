@extends("layouts/mainPublic")
@section('judul')
    Inventaris Barang
@endsection
@section("container")
    <!-- tempat show barcode-->
    <section id="landing" style="">
        <div class="container">
          <div class="row text-center">
            <div class="col">
              <p> </p>
              <h3>Inventory Website</h3>
              <h4 class="text-dark">Keterangan Barang</h4>
              <img class= "mx-auto mt-3 mb-3"src="data:image/png;base64, {!! base64_encode($qrCode) !!}" alt="QR Code">
              <div class="card" style="background-color: #FF9B50; color: #FFF">
                    <div class="card-body">
                        <p>Nama Barang          : {{ $data->data->nama_barang }}</p>
                        <p>Merk-Type            : {{ $data->data->merk_type }}</p>
                        <p>Kategori Barang      : {{ $data->data->kategori }}</p>
                        <p>Status               : {{ $data->data->status }}</p>
                        <p>Harga Beli           : {{ $data->data->harga_beli }}</p>
                        <p>Tanggal Beli         : {{ $data->data->tanggal_pembelian }}</p>
                        <p>Tanggal Registrasi   : {{ $data->data->tanggal_registrasi }}</p>
                        <p>Lokasi Ruangan       : {{ $data->data->ruangan }}</p>
                        <p>Penanggung Jawab     : {{ $data->data->penanggung_jawab }}</p>
                        <p>Terakhir Maintenace : <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Maintenance
                          </button>
                        </p>
                        <p>Apakah terdapat Barang yang Rusak? jika, ada silahkan klik Pengajuan</p>
                        <a href="/pengajuan/add-pengajuan/{{ $data->data->id }}" class="btn btn-danger">Pengajuan</a>
                        {{-- <button type="button" class="btn btn-danger">Pengajuan</button> --}}
                        
                    </div>
                </div>
            </div>
            
  
          </div>
        </div>
       </section>
       <!-- Button trigger modal -->

  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Maintenance {{ $data->data->nama_barang }}</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
    {{-- <h1 style="text-align:center;" class="mt-5"><b>QR Code {{ $data->data->nama_barang }}</b></h1>
    <div class="d-grid gap-2 col-6 mx-auto">
        <img class= "mx-auto mt-3 mb-3"src="data:image/png;base64, {!! base64_encode($qrCode) !!}" alt="QR Code">
        <a class="btn btn-primary" href="/barang">Kembali</a>
    </div> --}}
@endsection
