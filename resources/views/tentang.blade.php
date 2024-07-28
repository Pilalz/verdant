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

<section id="about" class="py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 text-center text-lg-start mb-4 mb-lg-0">
                <h2 class="mb-4" style="color: #423118">Tentang Kami</h2>
                <p class="mb-4" style="text-align: justify">
                    Verdant Cafe merupakan tempat yang menawarkan pengalaman unik
                    dengan gabungan kopi berkualitas tinggi dan masakan Padang yang
                    lezat. Dengan suasana yang hangat dan ramah, cafe ini menjadi
                    tempat yang cocok untuk bersantai sambil menikmati hidangan dan
                    minuman yang disajikan dengan penuh keahlian. Salah satu hal yang
                    membuat Verdant Cafe istimewa adalah pelayanannya yang ramah dan
                    berorientasi pada kepuasan pelanggan. Setiap pengunjung diterima
                    dengan senyum hangat dan dilayani dengan baik, menciptakan suasana
                    yang menyenangkan dan santai. Meskipun terkenal dengan kopi
                    mereka, Verdant Cafe juga dikenal karena masakan Padang autentik
                    mereka. Setiap hidangan disajikan dengan cita rasa yang khas dan
                    bahan-bahan berkualitas tinggi, menciptakan pengalaman kuliner
                    yang tak terlupakan bagi para pengunjung. Verdant Cafe juga
                    berkomitmen untuk meningkatkan pengalaman pelanggan melalui
                    penggunaan teknologi. Mereka berencana untuk mengembangkan sistem
                    informasi untuk pendaftaran pengunjung dan umpan balik, sehingga
                    dapat meningkatkan efisiensi operasional dan memastikan bahwa
                    setiap pengunjung mendapatkan pengalaman terbaik saat mengunjungi
                    cafe ini. Dengan kombinasi kopi yang lezat, masakan Padang yang
                    autentik, pelayanan yang ramah, dan komitmen untuk meningkatkan
                    pengalaman pelanggan, Verdant Cafe menjadi tempat yang sempurna
                    untuk bersantai dan menikmati momen-momen istimewa bersama teman
                    dan keluarga.
                </p>
            </div>
            <div class="col-lg-6">
                <div class="d-flex justify-content-center justify-content-lg-end">
                    <img src="/image/kverdant 1.png" class="img-fluid rounded" alt="Tentang Kami" />
                </div>
            </div>
        </div>
    </div>
</section>
@endsection