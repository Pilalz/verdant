<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Verdant</title>
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
</head>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container">
        <a class="navbar-brand" href="#"><img src="/image/Logo.png" style="width: 70px" alt="" /></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item m-2 pe-5">
                    <a class="nav-link active"
                        style="
                    font-weight: bold;
                    color: #423118;
                    "
                        aria-current="page" href="/">Menu</a>
                </li>
                <li class="nav-item m-2 pe-5">
                    <a class="nav-link" href="/cart" style="font-weight: bold; color: #423118">Cart</a>
                </li>
                <li class="nav-item m-2 pe-5">
                    <a class="nav-link" href="/ulasan" style="font-weight: bold; color: #423118">Ulasan</a>
                </li>
                <li class="nav-item m-2 pe-5">
                    <a class="nav-link" href="{{ url('/tentang') }}" style="font-weight: bold; color: #423118">Tentang</a>
                </li>
            </ul>
        </div>
    </div>
</nav>



<body>
    @yield('isi')
    <section class="" style="color: white">
        <!-- Footer -->
        <footer class="" style="background-color: #906331">
            <!-- Grid container -->
            <div class="container p-4">
                <!--Grid row-->
                <div class="row">
                    <!--Grid column-->
                    <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
                        <h5 class="text-uppercase" style="border-bottom: 1px solid white; width: 28%">
                            Hubungi Kami
                        </h5>
                        <p>What'sApp : +62 821-6221-8343</p>
                        <p>Senin - Minggu</p>
                        <p>10.00 - 21.00 WIB</p>
                        <p>
                            Jl. Pangkalan Raya 1 No.18, Warung Jambu, Kec. Bogor Utara, Kota
                            Bogor, Jawa Barat 16151
                        </p>
                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-lg-3 col-md-6 mb-4 mb-md-0" style="color: white">
                        <h5 class="text-uppercase" style="border-bottom: 1px solid white; width: 38%">
                            Bantuan
                        </h5>

                        <ul class="list-unstyled mb-0" style="color: white">
                            <li>
                                <a href="/kebijakan" style="text-decoration: none; color: white" class="text-body">
                                    <p style="color: white">Kebijakan Privasi</p>
                                </a>
                            </li>
                            <li>
                                <a href="/ulasan" style="text-decoration: none; color: white" class="text-body">
                                    <p style="color: white">Ulasan</p>
                                </a>
                            </li>
                            <li>
                                <a href="/syarat" style="text-decoration: none; color: white" class="text-body">
                                    <p style="color: white">Syarat dan Ketentuan</p>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                        <h5 class="text-uppercase mb-0" style="border-bottom: 1px solid white; width: 35%">
                            Verdant
                        </h5>

                        <ul class="list-unstyled">
                            <li>
                                <a href="{{ route('index') }}#indexScan" style="text-decoration: none" class="text-body">
                                    <p style="color: white">Menu</p>
                                </a>
                            </li>
                            <li>
                                <a href="/ulasan" style="text-decoration: none" class="text-body">
                                    <p style="color: white">Ulasan</p>
                                </a>
                            </li>
                            <li>
                                <a href="/tentang" style="text-decoration: none" class="text-body">
                                    <p style="color: white">Tentang</p>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!--Grid column-->
                </div>
                <!--Grid row-->
            </div>
            <!-- Grid container -->

            <!-- Copyright -->
            <div class="text-center p-3"
                style="
            background-color: rgba(0, 0, 0, 0.05);
            border-top: 1px solid white;
            ">
                © 2024 By :
                <a class="text-body" href="" style="text-decoration: none">
                    <p style="color: white">Verdant</p>
                </a>
            </div>
            <!-- Copyright -->
        </footer>
        <!-- Footer -->
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Check if the URL contains a fragment identifier
            if (window.location.hash) {
                var element = document.querySelector(window.location.hash);
                if (element) {
                    // Scroll to the element smoothly
                    element.scrollIntoView({ behavior: 'smooth' });
                }
            }
        });
    </script>
</body>
</html>