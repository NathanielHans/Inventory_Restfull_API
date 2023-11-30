<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <img src="https://belajar.usd.ac.id/pluginfile.php/1/theme_moove/logo/1693193463/logo_usd.png"
            class="img-fluid img-thumbnail" style="width: 10rem">
        <button class="navbar-toggler " type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon "></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-4">
                <li class="nav-item" style="color: white;">
                    @if(session('user'))
                        {{-- Welcome, {{ session('user')->username }} --}}
                        <a class="nav-link disabled" style="color: white" aria-current="page" href="">Welcome, {{ session('user')->username }}</a>
                    @endif
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/home">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/pengajuan">Pengajuan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/barang">Barang</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/logout">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>