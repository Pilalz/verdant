<!-- warna coklat = 423118
    hijau = 1C2E22
-->

@extends('/template/navbar')
@section('isi')
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

    <section id="contact" class="py-5">
        <div class="container">
            <h2 class="text-center mb-4">Berikan Ulasan</h2>
            <div class="row justify-content-center">
                <div class="col-lg-6">

                    <!-- Pesan Sukses dan Error -->
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            setTimeout(function() {
                                var alerts = document.querySelectorAll('.alert');
                                alerts.forEach(function(alert) {
                                    alert.style.transition = 'opacity 0.5s ease';
                                    alert.style.opacity = '0';
                                    setTimeout(function() {
                                        alert.style.display = 'none';
                                    }, 500); // waktu untuk transisi
                                });
                            }, 5000); // waktu dalam milidetik (3000ms = 3 detik)
                        });
                    </script>

                    <form class="contact-form" action="{{ route('ulasan.save') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan Email">
                        </div>
                        <div class="form-group">
                            <label for="pesan">Ulasan</label>
                            <textarea class="form-control" id="pesan" name="pesan" rows="5" placeholder="Masukkan Ulasan"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3 " style="background-color: #423118;">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
