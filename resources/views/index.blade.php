@extends('/template/navbar')
@section('isi')
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" /> -->
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <div id="carouselExampleIndicators" class="carousel slide">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="/image/kverdant 1.png" class="d-block w-100" alt="..." />
            </div>
            <div class="carousel-item">
                <img src="/image/kverdant 1.png" class="d-block w-100" alt="..." />
            </div>
            <div class="carousel-item">
                <img src="/image/kverdant 1.png " class="d-block w-100" alt="..." />
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <div class="container mt-5 mb-5" id="indexScan">
        <div class="row justify-content-center">
            <div class="col-lg-auto">
                <div class="btn-group row" style="border-radius: 10px" role="group" aria-label="Basic example">
                    @foreach ($kategoris as $item)
                        <div class="btn btn-dark me-5 col-md-3 mt-3 {{ $item->id == $kategori->id ? 'active' : '' }}" style="border-radius: 10px">
                            <a style="text-decoration: none; color: white" href="{{ route('index.kategori', $item->id) }}">{{ $item->nama_kategori }}</a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="container" style="margin-top: 5%">
    @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <h3 class="mb-2">{{ $kategori->nama_kategori }}</h3>

        <!-- Tampilkan Menu -->
        <div class="row mt-4">
            @foreach ($sub as $submenu)
                <h3 class="mb-5 ">{{ $submenu->nama_sub }}</h3>
                @foreach ($menus->where('kategori_menu', $submenu->id) as $menu)
                    <div class="col-md-3 mb-5">
                        <div class="card-sl">
                            <div class="card-image">
                                <img src="/image/{{ $menu->gambar_menu }}" style="width: 100%; height: 250px" alt="{{ $menu->judul_menu }}" />
                            </div>
                            <div class="card-heading text-center">{{ $menu->judul_menu }}</div>
                            <div class="card-text" style="text-align: justify">
                                {{ $menu->deskripsi_menu }}
                            </div>
                            <div class="card-text text-center">
                                <b>RP. {{ number_format($menu->harga_menu, 0, ',', '.') }}</b>
                            </div>
                            <a href="{{ route('cart.add', $menu->id) }}" class="card-button"><i class="bi bi-plus-lg"></i></a>
                        </div>
                    </div>
                @endforeach
            @endforeach
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
@endsection