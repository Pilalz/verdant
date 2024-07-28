@extends('admin/layout/header')
@section('isinya')
    <!-- Page Wrapper -->
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>

                <!-- Topbar Search -->

                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                    <li class="nav-item dropdown no-arrow d-sm-none">
                        <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-search fa-fw"></i>
                        </a>
                        <!-- Dropdown - Messages -->
                        <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                            aria-labelledby="searchDropdown">
                            <form class="form-inline mr-auto w-100 navbar-search">
                                <div class="input-group">
                                    <input type="text" class="form-control bg-light border-0 small"
                                        placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="button">
                                            <i class="fas fa-search fa-sm"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </li>

                    <!-- Nav Item - Alerts -->
                    <li class="nav-item dropdown no-arrow mx-1">
                        <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-bell fa-fw"></i>
                            <!-- Counter - Alerts -->
                            <span class="badge badge-danger badge-counter">{{ $totalTransaksi }}</span>
                        </a>
                        <!-- Dropdown - Alerts -->
                        <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                            aria-labelledby="alertsDropdown">
                            <h6 class="dropdown-header">
                                Pesanan Masuk
                            </h6>
                            @forelse ($transaksi as $item)
                            <a class="dropdown-item d-flex align-items-center" href="{{ route('admin.pesanan.detail', $item->id) }}">
                                <div>
                                    <div class="small text-gray-500">{{ $item->id }}</div>
                                    <span class="font-weight-bold">{{ $item->nama_pelanggan }}</span>
                                </div>
                            </a>
                            @empty
                                <div class="alert alert-dark">
                                    Belum ada pesanan.
                                </div>
                            @endforelse
                        </div>
                    </li>

                    <!-- Nav Item - Messages -->
                    <div class="topbar-divider d-none d-sm-block"></div>

                    @php
                        $user = Auth::user();
                    @endphp

                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ $user->nama }}</span>
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small">({{ $user->role }})</span>
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                            aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                Profile
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('logout') }}" data-toggle="modal" data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Logout
                            </a>
                        </div>
                    </li>
                </ul>
            </nav>
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <h1 class="h3 mb-2" style="color: #423118; text-align: center;">Tambah Menu</h1>

                <!-- DataTales Example -->
                <div class="card shadow mb-4">

                    <div class="card-body">

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
                                }, 2000); // waktu dalam milidetik (3000ms = 3 detik)
                            });
                        </script>

                        <a href="{{ url()->previous() }}" class="btn btn-primary mb-3">Back</a>

                        <form action="{{ route('admin.menu.save') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="judul_menu" class="form-label">Judul Menu</label>
                                <input type="text" class="form-control" id="judul_menu" name="judul_menu" placeholder="Masukkan Judul">
                            </div>
                            <div class="mb-3">
                                <label for="deskripsi_menu" class="form-label">Deskripsi Menu</label>
                                <textarea class="form-control" id="deskripsi_menu" name="deskripsi_menu" rows="5"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="harga_menu" class="form-label">Harga Menu</label>
                                <input type="text" class="form-control" id="harga_menu" name="harga_menu" placeholder="Masukkan Harga">
                            </div>
                            <div class="mb-3">
                                <label for="gambar_menu" class="form-label">Gambar Menu</label>
                                <input type="file" class="form-control" id="gambar_menu" name="gambar_menu"
                                    placeholder="Masukkan Kategori">
                            </div>
                            <div class="mb-3">
                                <label for="kategori_menu" class="form-label">Kategori Menu</label>
                                <select class="form-control" id="kategori_menu" name="kategori_menu">
                                    <option value="">Pilih Kategori</option>
                                    @foreach ($subkategori as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama_kategori }} - {{ $item->nama_sub }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-success">SIMPAN</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy; Verdant 2024</span>
                </div>
            </div>
        </footer>
        <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="{{ route('logout') }}">Logout</a>
                </div>
            </div>
        </div>
    </div>
@endsection
